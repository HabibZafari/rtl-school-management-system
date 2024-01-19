<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Mail\ForgotPasswordMail;
use App\Models\User;
use Illuminate\Http\Request;
use Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function login()
    {
        if (!empty(Auth::check())) {
            if (Auth::user()->user_type == 1) {
                return redirect('admin/dashboard');
            } else if (Auth::user()->user_type == 2) {
                return redirect('teacher/dashboard');
            } else if (Auth::user()->user_type == 3) {
                return redirect('student/dashboard');
            } else if (Auth::user()->user_type == 4) {
                return redirect('parent/dashboard');
            }
        } else {
            return view('auth.login');
        }
    }

    public function authlogin(Request $request)
    {
        $remember = !empty($request->remember) ? true : false;
    
        if (Auth::attempt($request->only('email', 'password'))) {
            if (Auth::user()->user_type == 1) {
                return redirect('admin/dashboard');
            } else if (Auth::user()->user_type == 2) {
                return redirect('teacher/dashboard');
            } else if (Auth::user()->user_type == 3) {
                return redirect('student/dashboard');
            } else if (Auth::user()->user_type == 4) {
                return redirect('parent/dashboard');
            }
        } else {
            return redirect()->back()->with('error', 'wrong email or password');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/'); // Redirect to the desired page after logout
    }

    public function forgotpassword()
    {
        return view('auth.forgot');
    }
    public function PostForgotPassword(Request $request){
        $user = User::getEamilSingle($request->email);
        if(!empty($user)){
            $user->remember_token = Str::random(30);
            $user->save();
            Mail::to($user->email)->send(new ForgotPasswordMail($user));
            return redirect()->back()->with('success', 'Password reset link sent to your email');
        }else{
            return redirect()->back()->with('error', 'Email not found in our database');
        }
    }

    public function reset($remember_token){
        $user = User::getTokenSingle($remember_token);
        if(!empty($user)){
            $data['user'] = $user;
            return view('auth.reset',$data);
        }else{
            return redirect('/');
        }
    }

    public function PostReset($token,Request $request){
        if($request->password == $request->cpassword){
            $user = User::getTokenSingle($token);
            // $user->password = bcrypt($request->password);
            $user->password = Hash::make($request->password);
            $user->remember_token = Str::random(30);
            // $user->remember_token = null;
            $user->save();
            return redirect(url('/'))->with('success', 'Password reset successfully');
        }else{
            return redirect()->back()->with('error', 'Password and confirm password not match');
        }
    }
}
