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
Route::get('/send-funded-email', 'MailController@sendFundEmail')->name('send-funded-email');


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
Route::post('/search-project', 'ProjectsController@search')->name('search-project');
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

// Analytics
Route::get('/analytics', 'AnalyticsController@getIndex')->name('analytics-index');

// Download PDF
Route::get('/downloadPDF/{id}','AnalyticsController@downloadPDF')->name('download-pdf');

// Show PDF
Route::get('/showPDF/{id}', 'AnalyticsController@showPDF')->name('show-pdf');

// Backoffice
Route::get('/admin/projects', 'Backoffice\AdminController@getProjects')->name('admin-projects');
    // Posts
    Route::get('/admin/posts', 'Backoffice\AdminController@getPosts')->name('admin-posts');
    Route::get('/admin/edit-post/{id}', 'Backoffice\AdminController@editPost')->name('admin-edit-post');
    Route::get('/admin/new-post', 'Backoffice\AdminController@newPost')->name('admin-new-post');
    Route::post('/admin/store-post', 'Backoffice\AdminController@storePost')->name('admin-store-post');
    Route::post('/admin/save-post/{id}', 'Backoffice\AdminController@savePost')->name('admin-save-post');
    Route::get('/admin/delete-post/{id}', 'Backoffice\AdminController@deletePost')->name('admin-delete-post');

Route::get('/admin/users', 'Backoffice\AdminController@getUsers')->name('admin-users');
Route::get('/search', 'Backoffice\AdminController@searchProjects')->name('admin-search');
Route::get('/delete-user/{id}', 'Backoffice\AdminController@deleteUser')->name('admin-delete-user');
Route::get('/delete-category/{id}', 'Backoffice\AdminController@deleteCategory')->name('admin-delete-category');
Route::get('/admin/categories', 'Backoffice\AdminController@getCategories')->name('admin-categories');
Route::post('/add-category', 'Backoffice\AdminController@storeCategory')->name('admin-add-category');



// Comments
Route::post('/post-comment', 'CommentsController@storeComment')->name('store-comment');

// Profile
Route::get('/profile', 'ProfileController@getProfile')->name('get-profile');
Route::post('/edit-profile', 'ProfileController@editProfile')->name('edit-profile');

