<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Models\Hobby;
use App\Models\Skill;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $hobbies = Hobby::all();
        $educations = Education::all();
        $skills = Skill::all();
        return view('dashboard.index', compact('hobbies', 'educations', 'skills'));
    }
}
