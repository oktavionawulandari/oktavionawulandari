<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\HobbyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::resource('/', HomeController::class);
Route::get('/send', [HomeController::class,'index'])->name('home');

// Register
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);

//  Login , Logout
Route::get('/user', [LoginController::class, 'login'])->name('login');
Route::post('action_login', [LoginController::class, 'action_login'])->name('action_login');

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
Route::get('action_logout', [LoginController::class, 'action_logout'])->name('action_logout')->middleware('auth');

//Education
Route::resource('/education', EducationController::class);
Route::get('/dataeducation/export_education', [EducationController::class, 'education_pdf'])->name('education.pdf');
Route::get('/dataeducation/export_excel', [EducationController::class, 'cetak_excel'])->name('education.excel');
Route::get('education/status/{id}', [EducationController::class, 'status'])->name('education.status');

//Hobby
Route::resource('/hobby', HobbyController::class);
Route::get('/datahobby/export_hobby', [HobbyController::class, 'hobby_pdf'])->name('hobby.pdf');
Route::get('/datahobby/export_excel', [HobbyController::class, 'cetak_excel'])->name('hobby.excel');
Route::get('/hobby/json', [HobbyController::class, 'json']);
    
//Contact
Route::resource('/contact', ContactController::class); 

//Skill
Route::resource('/skill', SkillController::class); 
Route::get('/dataskill/export_skill', [SkillController::class, 'skill_pdf'])->name('skill.pdf');
Route::get('/dataskill/export_excel', [SkillController::class, 'cetak_excel'])->name('skill.excel');

