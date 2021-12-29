<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Task;



Route::group(['middleware' => ['web']], function () {
    /**
     * Show Task Dashboard
     */
    Route::get('/', function () {
        return view('tasks', [
            'tasks' => Task::orderBy('created_at', 'asc')->get()
        ]);
    });

    /**
     * Add New Task
     */
    Route::post('/task', function (Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }

        $task = new Task;
        $task->name = $request->name;
        $task->save();

        return redirect('/');
    });

    /**
     * Delete Task
     */
    Route::delete('/task/{id}', function ($id) {
        Task::findOrFail($id)->delete();

        return redirect('/');
    });
});

//Route::get('test-layer/post/list', 'PostController@showTestPostList');
//Route::get('tasklist', 'TaskController@showTaskList');
//
//Route::get('/post/list', 'PostController@showPostList')->name('postlist');

Route::get('/', function () {
    return redirect()->route('postlist');
});
//Route::group(['middleware' => ['auth']], function () {
//Route::get('/post/download', 'PostController@downloadPostCSV')->name('downloadPostCSV');
Route::get('/post/create', 'PostController@showPostCreateView')->name('create.post');
Route::post('/post/create', 'PostController@submitPostCreateView')->name('create.post');
Route::get('/post/create/confirm', 'PostController@showPostCreateConfirmView')->name('post.create.confirm');
Route::post('/post/create/confirm', 'PostController@submitPostCreateConfirmView')->name('post.create.confirm');
//Route::delete('/post/delete/{postId}', 'PostController@deletePostById');
//Route::get('/post/edit/{postId}', 'PostController@showPostEdit')->name('post.edit');
//Route::post('/post/edit/{postId}', 'PostController@submitPostEditView')->name('post.edit');
//Route::get('/post/edit/{postId}/confirm', 'PostController@showPostEditConfirmView')->name('post.edit.confirm');
//Route::post('/post/edit/{postId}/confirm', 'PostController@submitPostEditConfirmView')->name('submitPostEditConfirmView');
//Route::get('/post/upload', 'PostController@showPostUploadView')->name('post.upload');
//Route::post('/post/upload', 'PostController@submitPostUploadView')->name('post.upload');
//});

