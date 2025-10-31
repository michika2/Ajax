<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SchoolGradeController;
use App\Http\Controllers\AdminAuthController;

Route::get('/menu', function() {
    return view('menu');
});
Route::get('/admin/login',[AdminAuthController::class,'showLoginForm'])->name('admin.login');
Route::post('/admin/login',[AdminAuthController::class,'login'])->name('admin.login.check');
Route::get('/admin/register', [AdminAuthController::class, 'showRegisterForm'])->name('admin.register');
Route::post('/admin/register', [AdminAuthController::class, 'register'])->name('admin.register.store');
Route::post('/admin/logout',[AdminAuthController::class,'logout'])->name('admin.logout');
Route::get('/students', [StudentController::class, 'index'])->name('students.index');
Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
Route::post('/students', [StudentController::class, 'store'])->name('students.store');
Route::get('/students/{id}/edit', [StudentController::class, 'edit'])->name('students.edit');
Route::put('/students/{id}', [StudentController::class, 'update'])->name('students.update');
Route::delete('/students/{id}', [StudentController::class, 'destroy'])->name('students.destroy');
Route::get('/students/{id}',[StudentController::class,'show'])->name('students.show');
Route::resource('school-grades', SchoolGradeController::class);

Route::get('/', function() {
    return 'Hello Laravel!';
});