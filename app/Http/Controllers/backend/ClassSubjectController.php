<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\ClassModel;
use App\Models\ClassSubjectModel;
use App\Models\SubjectModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassSubjectController extends Controller
{
    public function assignSubjectList()
    {
        $data['getRecord'] = ClassSubjectModel::getRecord();
        $data['header_title'] = 'لیست رشته اختصاصی';
        return view('admin.assign_subject.list', $data);
    }

    public function assignSubjectAdd()
    {
        $data['getClass'] = ClassModel::getClass();
        $data['getSubject'] = SubjectModel::getSubject();
        $data['header_title'] = 'افزودن رشته اختصاصی';
        return view('admin.assign_subject.add', $data);
    }

    public function assignSubjectInsert(Request $request)
    {
        if (!empty($request->subject_id)) {
            foreach ($request->subject_id as $subject_id) {
                $getAlreadyFirst = ClassSubjectModel::getAlreadyFirst($request->class_id, $subject_id);
                if (!empty($getAlreadyFirst)) {
                    $getAlreadyFirst->status = $request->status;
                    $getAlreadyFirst->save();
                } else {
                    $save = new ClassSubjectModel();
                    $save->class_id = $request->class_id;
                    $save->subject_id = $subject_id;
                    $save->status = $request->status;
                    $save->created_by = Auth::user()->id;
                    $save->save();
                }
            }
            return redirect('admin/assign_subject/list')->with('success', 'اطلاعات با موفقیت ثبت شد');
        } else {
            return redirect()->back()->with('error', 'لطفا تمامی فیلدها را پر کنید');
        }
    }

    public function assignSubjectEdit($id)
    {

        $getRecord = ClassSubjectModel::getSingle($id);
        if (!empty($getRecord)) {
            $data['getRecord'] = $getRecord;
            $data['getAssignSubjectID'] = ClassSubjectModel::getAssignSubjectID($getRecord->class_id);
            $data['getClass'] = ClassModel::getClass();
            $data['getSubject'] = SubjectModel::getSubject();
            $data['header_title'] = 'ویرایش رشته اختصاصی';


            return view('admin.assign_subject.edit', $data);
        } else {
            abort(404);
        }
    }

    public function assignSubjectUpdate(Request $request, $id)
    {
        ClassSubjectModel::deleteSubject($request->class_id);
        if (!empty($request->subject_id)) {
            foreach ($request->subject_id as $subject_id) {
                $getAlreadyFirst = ClassSubjectModel::getAlreadyFirst($request->class_id, $subject_id);
                if (!empty($getAlreadyFirst)) {
                    $getAlreadyFirst->status = $request->status;
                    $getAlreadyFirst->save();
                } else {
                    $save = new ClassSubjectModel();
                    $save->class_id = $request->class_id;
                    $save->subject_id = $subject_id;
                    $save->status = $request->status;
                    $save->created_by = Auth::user()->id;
                    $save->save();
                }
            }
        }
        return redirect('admin/assign_subject/list')->with('success', 'اطلاعات با موفقیت ثبت شد');
    }
    public function assignSubjectEditSingle($id)
    {

        $getRecord = ClassSubjectModel::getSingle($id);
        if (!empty($getRecord)) {
            $data['getRecord'] = $getRecord;
            $data['getClass'] = ClassModel::getClass();
            $data['getSubject'] = SubjectModel::getSubject();
            $data['header_title'] = 'ویرایش رشته اختصاصی';
            return view('admin.assign_subject.edit_single', $data);
        } else {
            abort(404);
        }
    }

    public function assignSubjectUpdateSingle(Request $request, $id)
    {
        $getAlreadyFirst = ClassSubjectModel::getAlreadyFirst($request->class_id, $request->subject_id);
        if (!empty($getAlreadyFirst)) {
            $getAlreadyFirst->status = $request->status;
            $getAlreadyFirst->save();
            return redirect('admin/assign_subject/list')->with('success', 'اطلاعات با موفقیت ویرایش شد');
        } else {
            $save = ClassSubjectModel::getSingle($id);
            $save->class_id = $request->class_id;
            $save->subject_id = $request->subject_id;
            $save->status = $request->status;
            $save->update();
            return redirect('admin/assign_subject/list')->with('success', 'اطلاعات با موفقیت ویرایش شد');
        }
    }

    public function assignSubjectDelete($id)
    {
        $save = ClassSubjectModel::getSingle($id);
        $save->is_delete = 1;
        $save->save();
        return redirect('admin/assign_subject/list')->with('success', 'اطلاعات با موفقیت حذف شد');
    }
}
