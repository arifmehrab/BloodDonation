
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
// Show District By Ajax For Register =======
Route::get('/show/destrict', 'Frontend\FrontendController@showDestrict')->name('show.destrict');
// Show District By ajax For Search ======
Route::get('/search/destrict/show', 'Frontend\SearchController@searchDestrictShow')->name('search.district.show');
// Search Resuit ============
Route::get('/search/resuit', 'Frontend\SearchController@searchResuit')->name('search.resuit');
// =====================================================================
// Admin Route Here
// =====================================================================
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('/logout', 'DashboardController@logout')->name('dashboard.logout');
    // Address Managment Route ============
    // Divition
    Route::get('/divition', 'DivitionController@index')->name('divition');
    Route::post('/divition/store', 'DivitionController@store')->name('divition.store');
    Route::delete('/divition/destory/{id}', 'DivitionController@destory')->name('divition.destory');
    // District
    Route::get('/district', 'DistricController@index')->name('district'); 
    Route::post('/district/store', 'DistricController@store')->name('district.store');
    Route::get('/district/edit/{id}', 'DistricController@edit')->name('district.edit');
    Route::put('/district/update/{id}', 'DistricController@update')->name('district.update');
    Route::delete('/district/destory/{id}', 'DistricController@destory')->name('district.destory');
    // Association 
    Route::get('/association', 'AssociationController@index')->name('association'); 
    Route::post('/association/store', 'AssociationController@store')->name('association.store');
    Route::get('/association/edit/{id}', 'AssociationController@edit')->name('association.edit');
    Route::put('/association/update/{id}', 'AssociationController@update')->name('association.update');
    Route::delete('/association/destory/{id}', 'AssociationController@destory')->name('association.destory'); 
});
// =====================================================================
// User Route Here
// =====================================================================
Route::group(['prefix' => 'user', 'namespace' => 'User', 'as' => 'user.', 'middleware' => ['auth', 'user']], function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('/logout', 'DashboardController@logout')->name('dashboard.logout'); 
});
