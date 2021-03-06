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

        Route::post('/report/mosuques', 'RerportController@mosques')->name('report1');
        Route::post('/report/finishers', 'RerportController@finishers')->name('report2');
        Route::post('/report/teachers', 'RerportController@teachers')->name('report3');
        Route::post('/report/gender', 'RerportController@genders')->name('report4');
        
        Route::get('/report', 'RerportController@index')->name('report');
        Route::resource('admins', 'AdminsController');
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

Route::name('user.')->prefix('user')->namespace('User')->group(function () {
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


        
        Route::post('/report/mosuques', 'RerportController@mosques')->name('report1');
        Route::post('/report/finishers', 'RerportController@finishers')->name('report2');
        Route::post('/report/teachers', 'RerportController@teachers')->name('report3');
        Route::post('/report/gender', 'RerportController@genders')->name('report4');
        
        Route::get('/report', 'RerportController@index')->name('report');

        
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

 Route::get('/result', 'ResultController@showForm')->name('result');
 Route::post('/result', 'ResultController@calRes')->name('result');
 Route::get('/', function ()
 {
    return view('welcome');
 });
//  Route::get('/report', function ()
//  {
//     return view('reports.generator');
//  });

// Route::name('user.')->prefix('user')->group(function () {
//   //  Route::namespace('Auth')->middleware('guest:user')->group(function () {
//         Route::namespace('User')->group(function () {
//              Route::get('/report', 'RerportController@index')->name('report');

//         });
//     });
//});





//Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/killer', 'LoginController@showLoginForm')->name('mosque.login');