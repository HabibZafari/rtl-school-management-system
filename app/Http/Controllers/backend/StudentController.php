<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\ClassModel;
use App\Models\ClassSubjectModel;
use App\Models\SubjectModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class StudentController extends Controller
{
    public function list()
    {
        $data['getRecord'] = User::getStudent();
        $data['header_title'] = "لیست شاگردان";
        return view('admin.student.list', $data);
    }

    public function add()
    {
        $data['getClass'] = ClassModel::getClass();
        $data['header_title'] = "افزودن شاگرد جدید";
        return view('admin.student.add', $data);
    }

    public function insert(Request $request)
    {
        $request->validate([
            'admission_number' => 'max:50',
            'roll_number' => 'max:50',
            'religion' => 'max:50',
            'mobile_number' => 'max:15|min:10',
            'blood_group' => 'max:10',
            'height' => 'max:10',
            'weight' => 'max:10',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);


        $student = new User;
        $student->name = trim($request->name);
        $student->last_name = trim($request->last_name);
        $student->admission_number = trim($request->admission_number);
        $student->roll_number = trim($request->roll_number);
        $student->class_id = trim($request->class_id);
        $student->gender = trim($request->gender);
        if (!empty($request->date_of_birth)) {
            $student->date_of_birth = trim($request->date_of_birth);
        }
        if (!empty($request->file('profile_pic'))) {
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('Ymdhis') . Str::random(20);
            $fileName = strtolower($randomStr) . '.' . $ext;
            // $file->move(public_path('uploads'), $fileName);
            $file->move('upload/profile/', $fileName);
            $student->profile_pic = $fileName;
        }
        if (!empty($request->admission_date)) {
            $student->admission_date = trim($request->admission_date);
        }
        $student->caste = trim($request->caste);
        $student->religion = trim($request->religion);
        $student->mobile_number = trim($request->mobile_number);
        $student->blood_group = trim($request->blood_group);
        $student->height = trim($request->height);
        $student->weight = trim($request->weight);
        $student->status = trim($request->status);
        $student->email = trim($request->email);
        $student->password = Hash::make($request->password);
        $student->user_type = 3;
        $student->save();
        return redirect('admin/student/list')->with('success', 'اطلاعات با موفقیت ثبت شد');
    }

    public function edit($id)
    {
        $data['getRecord'] = User::getSingle($id);
        if (!empty($data['getRecord'])) {
            $data['getClass'] = ClassModel::getClass();
            $data['header_title'] = "ویرایش اطلاعات شاگرد";
            return view('admin.student.edit', $data);
        } else {
            abort(404);
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'admission_number' => 'max:50',
            'roll_number' => 'max:50',
            'religion' => 'max:50',
            'mobile_number' => 'max:15|min:10',
            'blood_group' => 'max:10',
            'height' => 'max:10',
            'weight' => 'max:10',
            'email' => 'required|email|unique:users,email,' . $id,
        ]);


        $student = User::getSingle($id);
        $student->name = trim($request->name);
        $student->last_name = trim($request->last_name);
        $student->admission_number = trim($request->admission_number);
        $student->roll_number = trim($request->roll_number);
        $student->class_id = trim($request->class_id);
        $student->gender = trim($request->gender);
        if (!empty($request->date_of_birth)) {
            $student->date_of_birth = trim($request->date_of_birth);
        }
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
        if (!empty($request->admission_date)) {
            $student->admission_date = trim($request->admission_date);
        }
        $student->caste = trim($request->caste);
        $student->religion = trim($request->religion);
        $student->mobile_number = trim($request->mobile_number);
        $student->blood_group = trim($request->blood_group);
        $student->height = trim($request->height);
        $student->weight = trim($request->weight);
        $student->status = trim($request->status);
        $student->email = trim($request->email);
        if (!empty($request->password)) {
            $student->password = Hash::make($request->password);
        }
        $student->save();
        return redirect('admin/student/list')->with('success', 'اطلاعات با موفقیت  ویرایش شد');
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

}
