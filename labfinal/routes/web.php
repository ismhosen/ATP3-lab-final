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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => ['auth']], function () {

    Route::prefix('admin')->group(function(){
        Route::get('/', 'adminController@index')->name('admin.index');
        Route::get('/newUsers', 'adminController@newUsers')->name('admin.newUsers');
        Route::post('/addUsers', 'adminController@addUsers')->name('admin.addUsers');
        Route::get('/statusActive/{id}', 'adminController@statusActive')->name('admin.statusActive');
        Route::get('/statusBlock/{id}', 'adminController@statusBlock')->name('admin.statusBlock');
        // Route::get('/users', 'adminController@users')->name('admin.users');
        // Route::get('/users/add/{id}', 'adminController@usersAdd')->name('admin.usersAdd');
        // Route::get('/users/block/{id}', 'adminController@usersBlock')->name('admin.usersBlock');
        // Route::get('/shoots', 'adminController@shoots')->name('admin.shoots');
        // Route::get('/orders', 'adminController@orders')->name('admin.orders');
        // Route::get('/settings', 'adminController@settings')->name('admin.settings');
        // Route::get('/history', 'adminController@history')->name('admin.history');
        // Route::get('/search_users/{str}', 'adminController@ajaxSearchUsers');
        // Route::get('/shoot/delete/{id}', 'adminController@shootDelete')->name('admin.shootDelete');
        // Route::get('/ajax_users_status/{str}', 'adminController@ajaxUsersStatus');
        // Route::get('/ajax_users_type/{str}', 'adminController@ajaxUsersType');
        // Route::get('/ajax_free_shoots/{str}', 'adminController@ajaxFreeShoots');

    });
    Route::prefix('users')->group(function(){
        Route::get('/', 'userController@index')->name('user.index');
    });
    Route::prefix('scout')->group(function(){
        Route::get('/', 'scoutController@index')->name('scout.index');
    });
    Route::get('/profile/{id}', 'commonController@profile')->name('profile');
    

});

Route::get('/signup','registerController@index');
