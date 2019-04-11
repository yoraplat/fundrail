<?php

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

Route::get('/', 'HomeController@getIndex')->name('get-index');
Route::get('mail-preview', function () {
    return view('emails.welcome');
});
Route::get('/mail', 'MailController@getMailPage')->name('mail-page');

// Email versturen
Route::get('/send-mail', 'MailController@sendEmailWelcome')->name('welcome-mail');


Auth::routes();


// Get Projects
Route::get('/projects', 'ProjectsController@getProjects')->name('projects');
Route::get('/project/{id}', 'ProjectsController@getProjectById')->name('projectById');

// Get User Dashboard
Route::get('/dashboard', 'DashboardController@getDashboard')->name('user-dashboard');
Route::get('/new-project', 'DashboardController@newProject')->name('new-project');
Route::get('/edit-project/{projectId}', 'DashboardController@editProject')->name('edit-project');
Route::post('/create-project', 'DashboardController@createProject')->name('post-new-project');
Route::post('/save-project/{id}', 'DashboardController@saveProject')->name('save-project');
Route::get('/delete-project/{projectId}', 'DashboardController@deleteProject')->name('delete-project');

// Logout
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
