<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\StudentApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['middleware' => ['web']], function () {

    Route::get('/students/api/edit/{id}', [StudentApiController::class, 'showEditFormApi'])->name('API.editStudent.get');
    Route::post('/student/api/edit/{id}', [StudentApiController::class, 'editStudent'])->name('API.editStudent.post');
    Route::put('/students/api/put/{id}', [StudentApiController::class, 'editStudent']);
    Route::get('/students', [StudentApiController::class, 'showStudentList']);
    Route::get('/students/{id}', [StudentApiController::class, 'getStudentById']);
    Route::post('/students', [StudentApiController::class, 'createStudent']);

    Route::post('studentsupdate/{id}', [StudentApiController::class, 'update'])->name('update');
    Route::get('/students/api/delete/{id}', [StudentApiController::class, 'deleteStudent'])->name('API.deleteStudent');
});
