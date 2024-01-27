<?php

namespace App\Http\Controllers\bakcend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

        $data['header_title'] = "افزودن شاگرد جدید";
        return view('admin.student.add', $data);
    }

    public function insert(Request $request)
    {
        request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);
        
        $user = new User();
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        $user->password = Hash::make($request->password);
        $user->user_type = 1;
        $user->save();
        return redirect('/admin/student/list')->with('success', 'شاگرد با موفقیت اضافه شد');
    }
}
