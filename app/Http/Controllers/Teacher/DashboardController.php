<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index(){

        $courses = auth()->user()->courses()->get();

        return view('teacher.dashboard', ['courses' => $courses]);
    }
}
