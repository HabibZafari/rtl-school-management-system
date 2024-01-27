<?php

use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\backend\AuthController;
use App\Http\Controllers\backend\ClassController;
use App\Http\Controllers\backend\ClassSubjectController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\SubjectController;
use App\Http\Controllers\backend\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [AuthController::class, 'login']);
Route::post('login', [AuthController::class, 'authlogin']);
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');
Route::get('forgot-password', [AuthController::class, 'forgotpassword']);
Route::post('forgot-password', [AuthController::class, 'PostForgotPassword']);
Route::get('reset/{token}', [AuthController::class, 'reset']);
Route::post('reset/{token}', [AuthController::class, 'PostReset']);


Route::group(['middleware' => 'admin'], function () {
    Route::get('admin/dashboard', [DashboardController::class, 'dashboard']);
    Route::get('admin/admin/list', [AdminController::class, 'list']);
    Route::get('admin/admin/add', [AdminController::class, 'add']);
    Route::post('admin/admin/add', [AdminController::class, 'insert']);
    Route::get('admin/admin/edit/{id}', [AdminController::class, 'edit']);
    Route::post('admin/admin/edit/{id}', [AdminController::class, 'update']);
    Route::get('admin/admin/delete/{id}', [AdminController::class, 'delete']);

    //class urls

    Route::get('admin/class/list', [ClassController::class, 'classList']);
    Route::get('admin/class/add', [ClassController::class, 'classAdd']);
    Route::post('admin/class/add', [ClassController::class, 'classInsert']);
    Route::get('admin/class/edit/{id}', [ClassController::class, 'classEdit']);
    Route::post('admin/class/edit/{id}', [ClassController::class, 'classUpdate']);
    Route::get('admin/class/delete/{id}', [ClassController::class, 'classDelete']);

    //subject urls

    Route::get('admin/subject/list', [SubjectController::class, 'subjectList']);
    Route::get('admin/subject/add', [SubjectController::class, 'subjectAdd']);
    Route::post('admin/subject/add', [SubjectController::class, 'subjectInsert']);
    Route::get('admin/subject/edit/{id}', [SubjectController::class, 'subjectEdit']);
    Route::post('admin/subject/edit/{id}', [SubjectController::class, 'subjectUpdate']);
    Route::get('admin/subject/delete/{id}', [SubjectController::class, 'subjectDelete']);

    // assign_subject

    Route::get('admin/assign_subject/list', [ClassSubjectController::class, 'assignSubjectList']);
    Route::get('admin/assign_subject/add', [ClassSubjectController::class, 'assignSubjectAdd']);
    Route::post('admin/assign_subject/add', [ClassSubjectController::class, 'assignSubjectInsert']);
    Route::get('admin/assign_subject/edit/{id}', [ClassSubjectController::class, 'assignSubjectEdit']);
    Route::post('admin/assign_subject/edit/{id}', [ClassSubjectController::class, 'assignSubjectUpdate']);
    Route::get('admin/assign_subject/edit_single/{id}', [ClassSubjectController::class, 'assignSubjectEditSingle']);
    Route::post('admin/assign_subject/edit_single/{id}', [ClassSubjectController::class, 'assignSubjectUpdateSingle']);
    Route::get('admin/assign_subject/delete/{id}', [ClassSubjectController::class, 'assignSubjectDelete']);

    // Change password

    Route::get('admin/change_password', [UserController::class, 'change_password']);
    Route::post('admin/change_password', [UserController::class, 'update_change_password']);
    
});
Route::group(['middleware' => 'parent'], function () {
    Route::get('parent/dashboard', [DashboardController::class, 'dashboard']);
    Route::get('parent/change_password', [UserController::class, 'change_password']);
    Route::post('parent/change_password', [UserController::class, 'update_change_password']);
});

Route::group(['middleware' => 'teacher'], function () {
    Route::get('teacher/dashboard', [DashboardController::class, 'dashboard']);
    Route::get('teacher/change_password', [UserController::class, 'change_password']);
    Route::post('teacher/change_password', [UserController::class, 'update_change_password']);
});
Route::group(['middleware' => 'student'], function () {
    Route::get('student/dashboard', [DashboardController::class, 'dashboard']);
    Route::get('student/change_password', [UserController::class, 'change_password']);
    Route::post('student/change_password', [UserController::class, 'update_change_password']);
});
