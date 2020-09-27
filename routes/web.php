<?php

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

// Admin routes
Route::name('admin.')->prefix('admin')->namespace('Admin')->group(function () {
    Route::namespace('Auth')->middleware('guest:admin')->group(function () {
        // Login
        Route::get('/', 'LoginController@showLoginForm')->name('login');
        Route::post('/', 'LoginController@login');

        // Forget and reset Password
        Route::get('forgot-password', 'ForgotPasswordController@showLinkRequestForm')->name('forgot_password');
        Route::post('forgot-password', 'ForgotPasswordController@sendResetLinkEmail');
        Route::get('password/reset/{token}/{email?}', 'ResetPasswordController@showResetForm')->name('reset_password_link');
        Route::post('password/reset', 'ResetPasswordController@reset')->name('reset_password');
    });

    // Logged in admin user required
    Route::group(['middleware' => 'auth:admin'], function () {
        // Dashboard
        Route::get('/dashboard', 'AdminController@dashboard')->name('dashboard');

        Route::resource('mosques', 'MosqueController');

         Route::resource('users', 'UserController');

        // Route::resource('students', 'StudentController');

        Route::resource('teachers', 'TeacherController');

        // Route::resource('courses', 'CourseController');

      // Route::resource('nationalities', 'NationalityController');

        // Route::resource('genders', 'GenderController');

        // Route::resource('statuses', 'StatusController');

        // Route::resource('exams', 'ExamController');

        // Route::resource('levels', 'LevelController');

        // Profile
        Route::get('/profile', 'AdminController@profile')->name('profile');
        Route::post('/profile', 'AdminController@profileUpdate');
        Route::post('/password', 'AdminController@passwordUpdate')->name('password_update');

        // Logout
        Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
    });
});

Route::name('user.')->prefix('mosque')->namespace('Admin')->group(function () {
    Route::namespace('Auth')->middleware('guest:web')->group(function () {
        // Login
        Route::get('/', 'LoginController@showLoginForm')->name('login');
        Route::post('/', 'LoginController@login');

        // Forget and reset Password
        Route::get('forgot-password', 'ForgotPasswordController@showLinkRequestForm')->name('forgot_password');
        Route::post('forgot-password', 'ForgotPasswordController@sendResetLinkEmail');
        Route::get('password/reset/{token}/{email?}', 'ResetPasswordController@showResetForm')->name('reset_password_link');
        Route::post('password/reset', 'ResetPasswordController@reset')->name('reset_password');
    });

    // Logged in admin user required
    Route::group(['middleware' => 'auth:web'], function () {
        // Dashboard
        Route::get('/dashboard', 'AdminController@dashboard')->name('dashboard');

        // Route::resource('mosques', 'MosqueController');

        Route::resource('rooms', 'RoomController');

        Route::resource('students', 'StudentController');

        Route::resource('teachers', 'TeacherController');

        Route::resource('courses', 'CourseController');

        Route::resource('nationalities', 'NationalityController');

      //  Route::resource('genders', 'GenderController');

        //Route::resource('statuses', 'StatusController');

        Route::resource('exams', 'ExamController');

       // Route::resource('levels', 'LevelController');

        // Profile
        Route::get('/profile', 'AdminController@profile')->name('profile');
        Route::post('/profile', 'AdminController@profileUpdate');
        Route::post('/password', 'AdminController@passwordUpdate')->name('password_update');

        // Logout
        Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
    });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
     Route::get('/killer', 'LoginController@showLoginForm')->name('mosque.login');