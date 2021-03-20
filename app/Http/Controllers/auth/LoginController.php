<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            $request->session()->flash('message', "ข้อมูลไม่ครบถ้วน");
            $request->session()->flash('status', 'error');
            return back();
        }
        $id = $request->input('id');
        $password = $request->input('password');

        $cnt_user = Student::where(["id" => $id])->count();
        if (($cnt_user) == 1) {
            $user = Student::where(["id" => $id])->first();

            if (Hash::check($password, $user->password)) {
                // $user = $user->id;
                // dd(Auth::guard('student')->check());
                $request->session()->put('data', $request->input('id'));
                // dd($request->request->id);
                // dd(Auth::user());
                // return view('welcome', compact('id', 'user'));
                return view('welcome', compact('id', 'user'));
            } else {
                // $data["message"] = "รหัสผ่านไม่ถูกต้อง";
                // $request->session()->flash('message', $data["message"]);
                // $request->session()->flash('status', 'error');
                return back()->with('fail', 'รหัสผ่านไม่ถูกต้อง!');
            }
        } else {
            // $data["message"] = "ข้อมูลบัญชีไม่ถูกต้อง กรุณาตรวจสอบด้วยค่ะ";
            // $request->session()->flash('message', $data["message"]);
            // $request->session()->flash('status', 'error');
            return back()->with('fail', 'ข้อมูลบัญชีไม่ถูกต้อง!');
        }
    }
    public function Logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
