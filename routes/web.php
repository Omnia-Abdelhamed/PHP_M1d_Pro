<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use Illuminate\Container\Attributes\Storage;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/login',function(){
    return view('auth.login');
})->name('login');
Route::get('/register',function(){
    return view('auth.register');
})->name('register');

Route::get('/',function(){
    return view('site.index');
})->name('site.index');
Route::get('/about',function(){
    return view('site.about');
})->name('site.about');

Route::prefix('admin')->group(function(){
    Route::get('/',HomeController::class)->name('home');
    // Route::resource('/students',StudentController::class);
    Route::get('/students',[StudentController::class,'index'])->name('students.index');
    Route::get('/students/create',[StudentController::class,'create'])->name('students.create');
    Route::get('students/archive',[StudentController::class,'archive'])->name('students.archive');
    Route::get('/students/{id}',[StudentController::class,'show'])->name('students.show');
    Route::get('/students/{id}/edit',[StudentController::class,'edit'])->name('students.edit');
    Route::post('/students',[StudentController::class,'store'])->name('students.store');
    Route::put('students/{id}',[StudentController::class,'update'])->name('students.update');
    Route::delete('students/{id}',[StudentController::class,'destroy'])->name('students.destroy');
    Route::delete('students/{id}/delete',[StudentController::class,'forceDelete'])->name('students.forceDelete');
    Route::post('students/{id}/restore',[StudentController::class,'restore'])->name('students.restore');
    Route::get('departments/{id}',[DepartmentController::class,'show'])->name('departments.show');
    Route::post('students/{id}/courses',[StudentController::class,'addCourses'])->name('students.addCourses');
});

