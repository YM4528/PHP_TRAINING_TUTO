<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Student\StudentController;
use App\Http\Controllers\Student\StudentApiController;
use App\Http\Controllers\Student\StudentResourceController;


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

Route::get('/', [StudentController::class, 'showStudentList'])->name('studentList');

Route::get('/students/add', [StudentController::class, 'showStudentForm'])->name('addStudent.get');

Route::post('/students/add', [StudentController::class, 'submitStudentForm'])->name('addStudent.post');

Route::get('/student/edit/{id}', [StudentController::class, 'showStudentEditForm'])->name('edit.student.get');

Route::post('/student/edit/{id}', [StudentController::class, 'submitStudentEditForm'])->name('edit.student.post');

Route::get('/student/delete/{id}', [StudentController::class, 'deleteStudent'])->name('delete.student');

Route::get('/student/export', [StudentController::class, 'export'])->name('student.export');

Route::get('/student/import/', [StudentController::class, 'showImportForm'])->name('student.import.get');
Route::post('/student/import/', [StudentController::class, 'import'])->name('student.import.post');

Route::get('/student/search', [StudentController::class, 'showSearchForm'])->name('search.get');

Route::post('/student/search', [StudentController::class, 'submitSearchForm'])->name('search.post');

//Route::group(['prefix'=>'/api-view/'],function (){
Route::get('/students', [StudentApiController::class, 'index'])->name('API.studentList');

Route::get('students/api/add', [StudentApiController::class, 'showStudentFormApi'])->name('API.addStudent.get');
Route::post('/students/api/add', [StudentApiController::class, 'createStudent'])->name('API.addStudent.post');

Route::get('/students/api/edit/{id}', [StudentApiController::class, 'showEditFormApi'])->name('API.editStudent.get');
Route::post('/student/api/edit/{id}', [StudentApiController::class, 'editStudent'])->name('API.editStudent.post');

Route::get('/students/api/delete/{id}', [StudentApiController::class, 'deleteStudent'])->name('API.deleteStudent');
//});

Route::get('/shows', function () {
  return view('API.studentList');
});


Route::get('/mail/send', [StudentController::class, 'showMailForm'])->name('mail.get');

Route::post('/mail/send', [StudentController::class, 'submitMailForm'])->name('mail.post');
