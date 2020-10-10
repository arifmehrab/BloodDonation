
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

Route::get('/home', 'HomeController@index')->name('home');
// pages Route Here
Route::get('/', 'Frontend\FrontendController@index');
// About Us
Route::get('/about-us', 'Frontend\FrontendController@aboutUs')->name('about.us');
// Blood Summary
Route::get('/blood-summary', 'Frontend\FrontendController@bloodSummary')->name('blood.summary');
// Donation page
Route::get('/donation', 'Frontend\FrontendController@donation')->name('blood.donation');

// Post Route Here =======================
Route::get('/posts', 'Frontend\FrontendController@posts')->name('blood.post');
Route::get('/post/{slug}', 'Frontend\FrontendController@postView')->name('blood.post.view');

// category wais post
Route::get('/category/{slug}', 'Frontend\FrontendController@categoryPost')->name('blood.category.post');
// Post Search 
Route::post('/post/search', 'Frontend\FrontendController@postSearch')->name('blood.post.search');

// Show District By Ajax For Register 
Route::get('/show/destrict', 'Frontend\FrontendController@showDestrict')->name('show.destrict');
// Show Upazila By Ajax For Register & Search
Route::get('/show/upazila', 'Frontend\FrontendController@showUpazila')->name('show.upazila');

// Show District By ajax For Search 
Route::get('/search/destrict/show', 'Frontend\SearchController@searchDestrictShow')->name('search.district.show');
// Blood Local Area Suggest By ajax 
Route::get('/area/search', 'Frontend\SearchController@areaSearch')->name('area.search');
// Search Resuit
Route::post('/search/resuit', 'Frontend\SearchController@searchResuit')->name('search.resuit');
// Subscriber 
Route::post('/subscriber/store', 'Frontend\FrontendController@subscriber')->name('subscriber.store');
// Request For Blood 
Route::post('/blood/request/store', 'Frontend\FrontendController@bloodRequestStore')->name('blood.request.store');

// Language.. 
Route::get('/english', 'Frontend\FrontendController@englishLanguage')->name('english.language');
Route::get('/bangla', 'Frontend\FrontendController@banglaLanguage')->name('bangla.language');

// =====================================================================
// Admin Route Here
// =====================================================================

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.', 'middleware' => ['auth', 'admin']], function () {

    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('/logout', 'DashboardController@logout')->name('dashboard.logout');

    // profile
    Route::get('/profile/edit', 'ProfileController@editProfile')->name('edit.profile');
    Route::put('/profile/update', 'ProfileController@updateProfile')->name('update.profile');

    // password change
    Route::get('/password/change', 'ProfileController@PasswordChange')->name('password.change');
    Route::post('/password/update', 'ProfileController@PasswordUpdate')->name('password.update');

    // Total Donar List
    Route::get('/blood/donar', 'BloodDonarController@bloodDonarList')->name('blood.donar');

    // Blood Request 
    Route::get('/pending/blood/request/', 'BloodDonarController@pendingBloodRequest')->name('pending.blood.request');
    Route::post('/approved/blood/{id}', 'BloodDonarController@approvedBlood')->name('approved.blood');
    Route::get('/complete/blood/request/', 'BloodDonarController@completeBloodRequest')->name('complete.blood.request');
    Route::delete('/delete/blood/request/{id}', 'BloodDonarController@completeBloodDelete')->name('complete.blood.delete');

    // Address Managment Route ==============
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

    // Upazial
    Route::get('/upazila', 'UpazilaController@index')->name('upazila'); 
    Route::post('/upazila/store', 'UpazilaController@store')->name('upazila.store');
    Route::get('/upazila/edit/{id}', 'UpazilaController@edit')->name('upazila.edit');
    Route::put('/upazila/update/{id}', 'UpazilaController@update')->name('upazila.update');
    Route::delete('/upazila/destory/{id}', 'UpazilaController@destory')->name('upazila.destory');

    // Post Route Here =======================
    Route::resource('category', 'CategoryController');
    Route::resource('post', 'PostController');
    Route::get('/post/pending/list','PostController@postPending')->name('post.pending.list');
	Route::put('/post/approve/{id}','PostController@postApprove')->name('post.approve');

    // Our Team Member Route Here =============
    Route::get('/team-member', 'TeamMemberController@index')->name('team.member'); 
    Route::post('/team-member/store', 'TeamMemberController@store')->name('team.member.store'); 
    Route::get('/team-member/edit/{id}', 'TeamMemberController@edit')->name('team.member.edit'); 
    Route::put('/team-member/update/{id}', 'TeamMemberController@update')->name('team.member.update'); 
    Route::delete('/team-member/destory/{id}', 'TeamMemberController@destory')->name('team.member.destory'); 

    // Blood Summery Route Here ===============
    Route::get('/blood-summary', 'BloodSummaryController@index')->name('blood.summary'); 
    Route::put('/blood-summary/update/{id}', 'BloodSummaryController@update')->name('blood.summary.update');

    // Setting Route Here ====================

    // Site Info Setting
    Route::get('/setting', 'SettingController@settings')->name('settings');
    Route::put('/setting/update/{id}', 'SettingController@settingUpdate')->name('setting.update');

     // seo setting
     Route::get('/seo', 'SettingController@seo')->name('seo');
     Route::put('/seo/update/{id}', 'SettingController@seoUpdate')->name('seo.update');

    // Home setting one 
    Route::get('/setting/one', 'HomeSettingController@homeSettingOne')->name('setting.one');
    Route::put('/setting/one/update/{id}', 'HomeSettingController@homeOneSettingUpdate')->name('setting.one.update');

    // Home Page Title Setting
    Route::get('/setting/title', 'HomeSettingController@homeSettingTitle')->name('setting.title');
    Route::put('/setting/title/update/{id}', 'HomeSettingController@homeSettingTitleUpdate')->name('setting.title.update');

    // Home Page Count Down Setting
    Route::get('/countdown/setting', 'HomeSettingController@countDownSetting')->name('count.down.setting');
    Route::post('/countdown/store', 'HomeSettingController@countDownStore')->name('count.down.store');
    Route::delete('/countdown/delete/{id}', 'HomeSettingController@countDownDelete')->name('count.down.delete');

    // Photo Gallery 
    Route::get('/photo/gallery', 'PhotoGalleryController@photoGallery')->name('photo.gallery');
    Route::post('/photo/gallery/store', 'PhotoGalleryController@photoGalleryStore')->name('photo.gallery.store');
    Route::delete('/photo/gallery/delete/{id}', 'PhotoGalleryController@photoGalleryDelete')->name('photo.gallery.delete');

    // Newsletter 
    Route::get('/subscriber', 'HomeSettingController@subscriber')->name('subscriber');
    Route::delete('/subscriber/delete/{id}', 'HomeSettingController@newsLetterDelete')->name('subscriber.delete');
   
});
// =====================================================================
// User Route Here
// =====================================================================
Route::group(['prefix' => 'user', 'namespace' => 'User', 'as' => 'user.', 'middleware' => ['auth', 'user']], function () {

    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('/logout', 'DashboardController@logout')->name('dashboard.logout'); 
    
    // User Profile Route ==============
    Route::get('/information/edit', 'ProfileController@editInfo')->name('edit.info');
    Route::put('/information/update', 'ProfileController@updateInfo')->name('update.info');

    // profile
    Route::get('/profile/edit', 'ProfileController@editProfile')->name('edit.profile');
    Route::put('/profile/update', 'ProfileController@updateProfile')->name('update.profile');

    // password change
    Route::get('/password/change', 'ProfileController@PasswordChange')->name('password.change');
    Route::post('/password/update', 'ProfileController@PasswordUpdate')->name('password.update');

    // Photo Gallery 
    Route::get('/photo/gallery', 'PhotoGalleryController@photoGallery')->name('photo.gallery');
    Route::get('/photo/upload', 'PhotoGalleryController@photoGalleryCreate')->name('photo.gallery.create');
    Route::post('/photo/gallery/store', 'PhotoGalleryController@photoGalleryStore')->name('photo.gallery.store');
    Route::delete('/photo/gallery/delete/{id}', 'PhotoGalleryController@photoGalleryDelete')->name('photo.gallery.delete');
    
    // Post Route Here =======================
    Route::resource('post', 'PostController');
});
