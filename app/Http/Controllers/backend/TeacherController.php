<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\ClassModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class TeacherController extends Controller
{
    public function list()
    {
        $data['getRecord'] = User::getTeacher();
        $data['header_title'] = "لیست اساتید";
        return view('admin.teacher.list', $data);
    }

    public function add()
    {
        // $data['getClass'] = ClassModel::getClass();
        $data['header_title'] = "افزودن استاد جدید";
        return view('admin.teacher.add', $data);
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


        $teacher = new User;
        $teacher->name = trim($request->name);
        $teacher->last_name = trim($request->last_name);
        $teacher->admission_number = trim($request->admission_number);
        $teacher->roll_number = trim($request->roll_number);
        // $teacher->class_id = trim($request->class_id);
        $teacher->gender = trim($request->gender);
        if (!empty($request->date_of_birth)) {
            $teacher->date_of_birth = trim($request->date_of_birth);
        }
        if (!empty($request->file('profile_pic'))) {
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('Ymdhis') . Str::random(20);
            $fileName = strtolower($randomStr) . '.' . $ext;
            // $file->move(public_path('uploads'), $fileName);
            $file->move('upload/profile/', $fileName);
            $teacher->profile_pic = $fileName;
        }
        if (!empty($request->admission_date)) {
            $teacher->admission_date = trim($request->admission_date);
        }
        $teacher->caste = trim($request->caste);
        $teacher->religion = trim($request->religion);
        $teacher->mobile_number = trim($request->mobile_number);
        $teacher->blood_group = trim($request->blood_group);
        $teacher->height = trim($request->height);
        $teacher->weight = trim($request->weight);
        $teacher->status = trim($request->status);
        $teacher->email = trim($request->email);
        $teacher->password = Hash::make($request->password);
        $teacher->user_type = 2;
        $teacher->save();
        return redirect('admin/teacher/list')->with('success', 'اطلاعات با موفقیت ثبت شد');
    }

    public function edit($id)
    {
        $data['getRecord'] = User::getSingle($id);
        if (!empty($data['getRecord'])) {
            $data['getClass'] = ClassModel::getClass();
            $data['header_title'] = "ویرایش اطلاعات استاد";
            return view('admin.teacher.edit', $data);
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


        $teacher = User::getSingle($id);
        $teacher->name = trim($request->name);
        $teacher->last_name = trim($request->last_name);
        $teacher->admission_number = trim($request->admission_number);
        $teacher->roll_number = trim($request->roll_number);
        // $teacher->class_id = trim($request->class_id);
        $teacher->gender = trim($request->gender);
        if (!empty($request->date_of_birth)) {
            $teacher->date_of_birth = trim($request->date_of_birth);
        }
        if (!empty($request->file('profile_pic'))) {
            if (!empty($teacher->getProfile())) {
                unlink('upload/profile/' . $teacher->profile_pic);
            }
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('Ymdhis') . Str::random(20);
            $fileName = strtolower($randomStr) . '.' . $ext;
            $file->move('upload/profile/', $fileName);
            $teacher->profile_pic = $fileName;
        }
        if (!empty($request->admission_date)) {
            $teacher->admission_date = trim($request->admission_date);
        }
        $teacher->caste = trim($request->caste);
        $teacher->religion = trim($request->religion);
        $teacher->mobile_number = trim($request->mobile_number);
        $teacher->blood_group = trim($request->blood_group);
        $teacher->height = trim($request->height);
        $teacher->weight = trim($request->weight);
        $teacher->status = trim($request->status);
        $teacher->email = trim($request->email);
        if (!empty($request->password)) {
            $teacher->password = Hash::make($request->password);
        }
        $teacher->save();
        return redirect('admin/teacher/list')->with('success', 'اطلاعات با موفقیت  ویرایش شد');
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

        return redirect('admin/teacher/list')->with('success', 'اطلاعات با موفقیت حذف شد');
    }
}