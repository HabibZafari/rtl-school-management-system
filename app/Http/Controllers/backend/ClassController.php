<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\ClassModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassController extends Controller
{
    public function classList()
    {
        $data['getRecord'] = ClassModel::getRecord();
        $data['header_title'] = 'لیست کلاس';
        return view('admin.class.list', $data);
    }

    public function classAdd()
    {
        $data['header_title'] = 'َافزودن کلاس';
        return view('admin.class.add', $data);
    }

    public function classInsert(Request $request)
    {
        $save = new ClassModel();
        $save->name = $request->name;
        $save->status = $request->status;
        $save->created_by = Auth::user()->id;
        $save->save();
        return redirect('/admin/class/list')->with('success', 'اطلاعات با موفقیت ثبت شد');
    }

    public function classEdit($id)
    {
        $data['getRecord'] = ClassModel::getSingle($id);
        if (!empty($data['getRecord'])) {
            $data['header_title'] = 'ویرایش کلاس';
            return view('admin.class.edit', $data);
        } else {
            abort(404);
        }
    }

    public function classUpdate(Request $request, $id)
    {
        $save = ClassModel::getSingle($id);
        $save->name = $request->name;
        $save->status = $request->status;
        $save->save();
        return redirect('/admin/class/list')->with('success', 'اطلاعات با موفقیت ویرایش شد');
    }

    public function classDelete($id)
    {
        $save = ClassModel::getSingle($id);
        $save->is_delete = 1;
        $save->save();
        return redirect()->back()->with('success', 'اطلاعات با موفقیت حذف شد');
    }
}
