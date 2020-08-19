
<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your applicatio;;n. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// =====================================================================
// Frontend Route Here
// =====================================================================
// Auth
Auth::routes();
// Font page
Route::get('/', 'Frontend\FrontendController@index');

Route::get('/home', 'HomeController@index')->name('home');

// =====================================================================
// Admin Route Here
// =====================================================================
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');   
});
// =====================================================================
// User Route Here
// =====================================================================
Route::group(['prefix' => 'user', 'namespace' => 'User', 'as' => 'user.', 'middleware' => ['auth', 'user']], function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
});
