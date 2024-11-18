<?php

namespace App\Http\Controllers;

use App\Enum\UserRole;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $studentCount = User::where('role', UserRole::STUDENT)->count();
        $teacherCount = User::where('role', UserRole::TEACHER)->count();
        $courseCount = Course::count();

        $data['Students'] = $studentCount;
        $data['Teachers'] = $teacherCount;
        $data['Courses'] = $courseCount;

        return view('admin.dashboard', ['data' => $data]);
    }
}
