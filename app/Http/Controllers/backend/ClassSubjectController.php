<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\ClassSubjectModel;
use Illuminate\Http\Request;

class ClassSubjectController extends Controller
{
    public function assignSubjectList()
    {
        $data['getRecord'] = ClassSubjectModel::getRecord();
        $data['header_title'] = 'لیست رشته اختصاصی';
        return view('admin.assign_subject.list',$data);
    }

    public function assignSubjectAdd()
    {
        $data['header_title'] = 'افزودن رشته اختصاصی';
        return view('admin.assign_subject.add',$data);
    }
}
