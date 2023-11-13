<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Education;
use App\Models\Hobby;
use App\Models\Skill;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $hobbies = Hobby::all();
        $contacts = Contact::all();
        $educations = Education::all();
        $skils = Skill::all();
        return view('home' , compact('hobbies', 'contacts', 'educations', 'skils'));
    }
}
