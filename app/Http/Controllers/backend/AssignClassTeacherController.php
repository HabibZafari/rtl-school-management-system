<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\AssignClassTeacherModel;
use App\Models\ClassModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssignClassTeacherController extends Controller
{
    public function list()
    {
        $data['getRecord'] = AssignClassTeacherModel::getRecord();
        $data['header_title'] = "اختصاص کلاس به استاد";
        return view('admin.assign_class_teacher.list', $data);
    }

    public function add()
    {
        $data['getClass']= ClassModel::getClass();
        $data['getTeacher']= User::getTeacherClass();
        $data['header_title'] = "ایجاد اختصاص کلاس به استاد";
        return view('admin.assign_class_teacher.add', $data);
    }

    public function insert(Request $request)
    {
        if (!empty($request->teacher_id)) {
            foreach ($request->teacher_id as $teacher_id) {
                $getAlreadyFirst = AssignClassTeacherModel::getAlreadyFirst($request->class_id, $teacher_id);
                if (!empty($getAlreadyFirst)) {
                    $getAlreadyFirst->status = $request->status;
                    $getAlreadyFirst->save();
                } else {
                    $save = new AssignClassTeacherModel();
                    $save->class_id = $request->class_id;
                    $save->teacher_id = $teacher_id;
                    $save->status = $request->status;
                    $save->created_by = Auth::user()->id;
                    $save->save();
                }
            }
            return redirect('admin/assign_class_teacher/list')->with('success', 'اطلاعات با موفقیت ثبت شد');
        } else {
            return redirect()->back()->with('error', 'لطفا تمامی فیلدها را پر کنید');
        }
    }

    public function edit($id)
    {

        $getRecord = AssignClassTeacherModel::getSingle($id);
        if (!empty($getRecord)) {
            $data['getRecord'] = $getRecord;
            $data['getAssignTeacherID'] = AssignClassTeacherModel::getAssignTeacherID($getRecord->class_id);
            $data['getClass'] = ClassModel::getClass();
            $data['getTeacher'] = User::getTeacherClass();
            $data['header_title'] = 'ویرایش اختصاص کلاس به استاد';


            return view('admin.assign_class_teacher.edit', $data);
        } else {
            abort(404);
        }
    }

    public function update(Request $request, $id)
    {
        AssignClassTeacherModel::deleteTeacher($request->class_id);
        if (!empty($request->teacher_id)) {
            foreach ($request->teacher_id as $teacher_id) {
                $getAlreadyFirst = AssignClassTeacherModel::getAlreadyFirst($request->class_id, $teacher_id);
                if (!empty($getAlreadyFirst)) {
                    $getAlreadyFirst->status = $request->status;
                    $getAlreadyFirst->save();
                } else {
                    $save = new AssignClassTeacherModel();
                    $save->class_id = $request->class_id;
                    $save->teacher_id = $teacher_id;
                    $save->status = $request->status;
                    $save->created_by = Auth::user()->id;
                    $save->save();
                }
            }
        }
        return redirect('admin/assign_class_teacher/list')->with('success', 'اطلاعات با موفقیت ثبت شد');
    }
    public function edit_single($id)
    {

        $getRecord = AssignClassTeacherModel::getSingle($id);
        if (!empty($getRecord)) {
            $data['getRecord'] = $getRecord;
            $data['getClass'] = ClassModel::getClass();
            $data['getTeacher'] = User::getTeacherClass();
            $data['header_title'] = 'ویرایش رشته اختصاصی';
            return view('admin.assign_class_teacher.edit_single', $data);
        } else {
            abort(404);
        }
    }

    public function update_single($id,Request $request)
    {
        $getAlreadyFirst = AssignClassTeacherModel::getAlreadyFirst($request->class_id, $request->teacher_id);
        if (!empty($getAlreadyFirst)) {
            $getAlreadyFirst->status = $request->status;
            $getAlreadyFirst->save();
            return redirect('admin/assign_class_teacher/list')->with('success', 'اطلاعات با موفقیت ویرایش شد');
        } else {
            $save = AssignClassTeacherModel::getSingle($id);
            $save->class_id = $request->class_id;
            $save->teacher_id = $request->teacher_id;
            $save->status = $request->status;
            $save->save();
            return redirect('admin/assign_class_teacher/list')->with('success', 'اطلاعات با موفقیت ویرایش شد');
        }
    }

    public function delete($id)
    {
        $save = AssignClassTeacherModel::getSingle($id);
        $save->is_delete = 1;
        $save->save();
        return redirect()->back()->with('success', 'اطلاعات با موفقیت حذف شد');
    }
}
