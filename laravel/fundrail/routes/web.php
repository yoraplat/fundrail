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
Route::get('/project/{projectId}', 'ProjectsController@getProjectById')->name('projectById');

// Get User Dashboard
Route::get('/dashboard', 'DashboardController@getDashboard')->name('user-dashboard');
Route::get('/new-project', 'DashboardController@newProject')->name('new-project');
Route::get('/edit-project/{projectId}', 'DashboardController@editProject')->name('edit-project');
Route::post('/create-project', 'DashboardController@createProject')->name('post-new-project');
Route::post('/save-project/{id}', 'DashboardController@saveProject')->name('save-project');
Route::get('/delete-project/{projectId}', 'DashboardController@deleteProject')->name('delete-project');

// Get all user packages
Route::get('/packages', 'PackageController@getPackages')->name('get-packages');
Route::get('/new-package', 'PackageController@newPackage')->name('new-package');
Route::get('/edit-package/{id}', 'PackageController@editPackage')->name('edit-package');
Route::post('/create-package', 'PackageController@createPackage')->name('post-new-package');
Route::post('/save-package/{id}', 'PackageController@savePackage')->name('save-package');
Route::get('/delete-package/{id}', 'PackageController@deletePackage')->name('delete-package');

// Logout
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

// Funds
Route::get('/funds', 'FundsController@getFunds')->name('get-funds');
Route::post('/add-funds', 'FundsController@addFunds')->name('add-funds');

// Project Funds
Route::post('/add-project-funds', 'FundsController@addProjectFunds')->name('add-project-funds');

// Delete Images
Route::get('/delete-image/{id}', 'ProjectsController@deleteImage')->name('delete-images');

