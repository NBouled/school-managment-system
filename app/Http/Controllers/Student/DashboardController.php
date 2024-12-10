<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    // ingelogde user zijn enrolled courses kunnen tonen in the dashboard pagina.
    // maak link van de naam course en die brengt ons naar de course page
    public function index(){

        $courses = auth()->user()->courses()->get();

        return view('student.dashboard', ['courses' => $courses]);
    }
}
