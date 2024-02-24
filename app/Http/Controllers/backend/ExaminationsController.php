<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\ExamModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExaminationsController extends Controller
{

    public function list()
    {
        $data['getRecord'] = ExamModel::getRecord();
        $data['header_title'] = "لیست امتحان ها";
        return view('admin.examinations.exam.list', $data);
    }

    public function add()
    {
        $data['header_title'] = "افزودن امتحان جدید";
        return view('admin.examinations.exam.add', $data);
    }

    public function insert(Request $request)
    {
        // dd($request->all());
        // request()->validate([
        //     'name' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        // ]);
        
        $exam = new ExamModel();
        $exam->name = trim($request->name);
        $exam->note = trim($request->note);
        // $exam->password = Hash::make($request->password);
        $exam->created_by = Auth::user()->id;
        $exam->save();
        return redirect('admin/examinations/exam/list')->with('success', 'امتحان با موفقیت اضافه شد');
    }

    public function edit($id)
    {
        $data['getRecord'] = ExamModel::getSingle($id);
        if (!empty($data['getRecord'])) {
            $data['header_title'] = "ویرایش امتحان";
            return view('admin.examinations.exam.edit', $data);
        } else {
            abort(404);
        }
    }

    public function update(Request $request, $id)
    {
       
        $user = ExamModel::getSingle($id);
        $user->name = trim($request->name);
        $user->note = trim($request->note);
        $user->save();
        return redirect('/admin/examinations/exam/list')
        ->with('success', 'Exam updated successfully');
    }

    public function delete($id)
    {
        $getRecord = ExamModel::getSingle($id);
        $getRecord->is_delete = 1;
        $getRecord->save();
        return redirect('/admin/examinations/exam/list')->with('success', 'Admin deleted successfully');
    }
}
