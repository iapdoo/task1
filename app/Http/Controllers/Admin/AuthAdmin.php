<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use PHPUnit\Exception;

class AuthAdmin extends Controller
{
    public function login()
    {
        return view('Admin.Auth.login');
    }


    public function dologin(LoginRequest $request)
    {
        try {
            $remember_me = $request->has('remember_me') ? true : false;

            if (auth()->guard('admin')->attempt(['email' => $request->input('email'), 'password' => $request->input('password'),'status' => 1], $remember_me)) {
                // notify()->success('تم الدخول بنجاح  ');
                return redirect()->route('admin.dashboard');
            }
        }catch (Exception $exception){
            return redirect()->back()->with(['error' => 'هناك خطا بالبيانات']);
        }

        // notify()->error('خطا في البيانات  برجاء المجاولة مجدا ');

        return redirect()->back()->with(['error' => 'هناك خطا بالبيانات']);
    }

//    public function logout()
//    {
//        auth()->guard('admin')->logout();
//        return redirect(route('admin.login'));
//    }
    public function logout(Request $request)
    {
        try {
            auth()->guard('admin')->logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return redirect()->route('admin.login');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', __('message.something_wrong'));
        }
    }

}
