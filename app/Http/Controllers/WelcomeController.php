<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(Request $request)
    {
        $user_id = $request->get('user_id');
        $status = Student::where('id', $user_id)->first();
        return view('welcome');
        // dd($status);
    }
}
