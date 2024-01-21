<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function list()
    {
        $data['getRecord'] = User::getAdmin();
        $data['header_title'] = "لیست ادمین ها";
        return view('admin.admin.list', $data);
    }

    public function add()
    {

        $data['header_title'] = "افزودن ادمین جدید";
        return view('admin.admin.add', $data);
    }

    public function insert(Request $request)
    {
        $user = new User();
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        $user->password = Hash::make($request->password);
        $user->user_type = 1;
        $user->save();
        return redirect('/admin/admin/list')->with('success', 'Admin added successfully');
    }

    public function edit($id)
    {
        $data['getRecord'] = User::getSingle($id);
        if (!empty($data['getRecord'])) {
            $data['header_title'] = "ویرایش ادمین";
            return view('admin.admin.edit', $data);
        } else {
            abort(404);
        }
    }

    public function update(Request $request, $id)
    {
        $user = User::getSingle($id);
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        if (!empty($request->password)) {

            $user->password = Hash::make($request->password);
        }
        $user->save();
        return redirect('/admin/admin/list')->with('success', 'Admin updated successfully');
    }
}
