<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function change_password()
    {
        $data['title'] = 'تغییر رمز عبور';
        return view('profile.change_password', $data);
    }

    public function MyAccount(){
        $data['getRecord'] = User::getSingle(Auth::user()->id);
        $data['title'] = 'ویرایش حساب کاربری';
        return view('teacher.my_account', $data);
    }

    public function UpdateMyAccount(Request $request){
        $id = Auth::user()->id;
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
        $teacher->caste = trim($request->caste);
        $teacher->religion = trim($request->religion);
        $teacher->mobile_number = trim($request->mobile_number);
        $teacher->blood_group = trim($request->blood_group);
        $teacher->height = trim($request->height);
        $teacher->weight = trim($request->weight);
        $teacher->email = trim($request->email);
        $teacher->save();
        return redirect()->back()->with('success', 'اطلاعات با موفقیت  ویرایش شد');
    }

    public function update_change_password(Request $request)
    {
        $user = User::getSingle(Auth::user()->id);
        if(Hash::check($request->old_password, $user->password)){
            $user->password = Hash::make($request->new_password);
            $user->save();
            return redirect()->back()->with('success', 'رمز عبور با موفقیت تغییر کرد');
        }else{
            return redirect()->back()->with('error', 'رمز عبور فعلی اشتباه است');
        }
    }
}
