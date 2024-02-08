<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\ClassSubjectModel;
use App\Models\SubjectModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubjectController extends Controller
{
    public function subjectList()
    {
        $data['getRecord'] = SubjectModel::getRecord();
        $data['header_title'] = 'لیست مضمون';
        return view('admin.subject.list', $data);
    }

    public function subjectAdd()
    {
        $data['header_title'] = 'َافزودن مضمون';
        return view('admin.subject.add', $data);
    }

    public function subjectInsert(Request $request)
    {
        $save = new SubjectModel();
        $save->name = $request->name;
        $save->type = $request->type;
        $save->status = $request->status;
        $save->created_by = Auth::user()->id;
        $save->save();
        return redirect('/admin/subject/list')->with('success', 'اطلاعات با موفقیت ثبت شد');
    }

    public function subjectEdit($id)
    {
        $data['getRecord'] = SubjectModel::getSingle($id);
        if (!empty($data['getRecord'])) {
            $data['header_title'] = 'ویرایش مضمون';
            return view('admin.subject.edit', $data);
        } else {
            abort(404);
        }
    }

    public function subjectUpdate(Request $request, $id)
    {
        $save = SubjectModel::getSingle($id);
        $save->name = $request->name;
        $save->type = $request->type;
        $save->status = $request->status;
        $save->save();
        return redirect('/admin/subject/list')->with('success', 'اطلاعات با موفقیت ویرایش شد');
    }

    public function subjectDelete($id)
    {
        $save = SubjectModel::getSingle($id);
        $save->is_delete = 1;
        $save->save();
        return redirect()->back()->with('success', 'اطلاعات با موفقیت حذف شد');
    }
    public function MySubject(){
        $data['getRecord'] = ClassSubjectModel::MySubject(Auth::user()->class_id);
        $data['header_title'] = "لیست مضامین";
        return view('student.my_subject', $data);
    }

    public function ParentStudentSubject($student_id){
        $user = User::getSingle($student_id);
        $data['getUser'] = $user;
        $data['getRecord'] = ClassSubjectModel::MySubject($user->class_id);
        $data['header_title'] = "لیست دانش آموزان";
        return view('parent.my_student_subject', $data);
    }
}
