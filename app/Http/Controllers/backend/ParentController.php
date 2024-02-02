<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use Illuminate\Http\Request;

class ParentController extends Controller
{

    public function list()
    {
        $data['getRecord'] = User::getParent();
        $data['header_title'] = "لیست والدین";
        return view('admin.parent.list', $data);
    }

    public function add()
    {
        // $data['getClass'] = ClassModel::getClass();
        $data['header_title'] = "افزودن والد جدید";
        return view('admin.parent.add', $data);
    }

    public function insert(Request $request)
    {
        $request->validate([
            'address' => 'max:255',
            'occupation' => 'max:255',
            'mobile_number' => 'max:15|min:10',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);


        $student = new User;
        $student->name = trim($request->name);
        $student->last_name = trim($request->last_name);
        $student->gender = trim($request->gender);
        if (!empty($request->file('profile_pic'))) {
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('Ymdhis') . Str::random(20);
            $fileName = strtolower($randomStr) . '.' . $ext;
            // $file->move(public_path('uploads'), $fileName);
            $file->move('upload/profile/', $fileName);
            $student->profile_pic = $fileName;
        }
        $student->address = trim($request->address);
        $student->occupation = trim($request->occupation);
        $student->mobile_number = trim($request->mobile_number);
        $student->status = trim($request->status);
        $student->email = trim($request->email);
        $student->password = Hash::make($request->password);
        $student->user_type = 4;
        $student->save();
        return redirect('admin/parent/list')->with('success', 'اطلاعات با موفقیت ثبت شد');
    }

    public function edit($id)
    {
        $data['getRecord'] = User::getSingle($id);
        if (!empty($data['getRecord'])) {
            $data['header_title'] = "ویرایش اطلاعات والد";
            return view('admin.parent.edit', $data);
        } else {
            abort(404);
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'address' => 'max:255',
            'occupation' => 'max:255',
            'mobile_number' => 'max:15|min:10',
            'password' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
        ]);


        $student = User::getSingle($id);
        $student->name = trim($request->name);
        $student->last_name = trim($request->last_name);
        $student->occupation = trim($request->occupation);
        $student->address = trim($request->address);
        $student->gender = trim($request->gender);
        if (!empty($request->file('profile_pic'))) {
            if (!empty($student->getProfile())) {
                unlink('upload/profile/' . $student->profile_pic);
            }
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('Ymdhis') . Str::random(20);
            $fileName = strtolower($randomStr) . '.' . $ext;
            $file->move('upload/profile/', $fileName);
            $student->profile_pic = $fileName;
        }
        $student->mobile_number = trim($request->mobile_number);
        $student->status = trim($request->status);
        $student->email = trim($request->email);
        if (!empty($request->password)) {
            $student->password = Hash::make($request->password);
        }
        $student->save();
        return redirect('admin/parent/list')->with('success', 'اطلاعات با موفقیت  ویرایش شد');
    }

    public function delete($id)
    {
        $getRecord = User::getSingle($id);
        if (!empty($getRecord->getProfile())) {
            unlink('upload/profile/' . $getRecord->profile_pic);
        }
        if (!empty($getRecord)) {
            $getRecord->is_delete = 1;
            $getRecord->save();
        }

        return redirect('admin/student/list')->with('success', 'اطلاعات با موفقیت حذف شد');
    }

    public function myStudent($id){
        $data['getParent'] = User::getSingle($id);
        $data['parent_id'] = $id;
        $data['getSearchStudent'] = User::getSearchStudent();
        $data['getRecord'] = User::getMyStudent($id);
        $data['header_title'] = "لیست شاگردان والدین";
        return view('admin.parent.my_student', $data);
    }

    public function AssignStudentParent($student_id, $parent_id){
        $student = User::getSingle($student_id);
        $student->parent_id = $parent_id;
        $student->save();
        return redirect()->back()->with('success', 'اطلاعات شاگرد برای والد ثبت شد');
    }

    public function AssignStudentParentDelete($student_id){
        $student = User::getSingle($student_id);
        $student->parent_id = null;
        $student->save();
        return redirect('admin/parent/list')->with('success', 'اطلاعات شاگرد برای والد حذف شد');
    }

}
