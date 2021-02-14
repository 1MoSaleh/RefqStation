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

Route::get('/', function () {return view('main');})->name('main');
Route::get('mainSearch', 'FilterController@search')->name('search');
Route::post('/contactUs', 'ReportController@addcontactus')->name('contactus');
Route::get('/aboutUs', function () {return view('aboutus');})->name('aboutus');
Route::get('/terms', function () {return view('terms');})->name('terms');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//routes for admin controller
Route::get('/admin', 'AdminController@index')->name('admin.index');

Route::get('/admin/users', 'AdminController@users')->name('admin.users');
Route::get('/admin/user/', 'AdminController@user')->name('admin.user');
Route::post('/admin/users/block/{id}', 'AdminController@blockUser')->name('admin.blockUser');
Route::post('/admin/users/recover/{id}', 'AdminController@recoverUser')->name('admin.recoverUser');
Route::post('/admin/users/upgradeToSub/{id}', 'AdminController@upgradeToSubAdmin')->name('admin.upgradeToSub');
Route::post('/admin/users/downgradeToUser/{id}', 'AdminController@downgradeToUser')->name('admin.downgradeToUser');

Route::get('/admin/Adoption', 'AdminController@adoption')->name('admin.adoption');
Route::post('/admin/Adoption/block/{id}', 'AdminController@blockAdoption')->name('admin.blockAdoption');
Route::post('/admin/Adoption/recover/{id}', 'AdminController@recoverAdoption')->name('admin.recoverAdoption');

Route::get('/admin/lost', 'AdminController@lost')->name('admin.lost');
Route::post('/admin/lost/block/{id}', 'AdminController@blockLost')->name('admin.blockLost');
Route::post('/admin/lost/recover/{id}', 'AdminController@recoverLost')->name('admin.recoverLost');

Route::get('/admin/rescue', 'AdminController@rescue')->name('admin.rescue');
Route::post('/admin/rescue/block/{id}', 'AdminController@blockRescue')->name('admin.blockRescue');
Route::post('/admin/rescue/recover/{id}', 'AdminController@recoverRescue')->name('admin.recoverRescue');

Route::get('/admin/reports', 'AdminController@reports')->name('admin.reports');
Route::post('/admin/reports/close/{id}', 'AdminController@closeReport')->name('admin.closeReport');
Route::post('/admin/reports/recover/{id}', 'AdminController@recoverReport')->name('admin.recoverReport');

Route::get('/admin/controlByContact', 'AdminController@getByContact')->name('admin.getByContact');
Route::post('/admin/blockAllByContact/{type}/', 'AdminController@blockAll')->name('admin.blockAll');
Route::post('/admin/recoverAllByContact/{type}/', 'AdminController@recoverAll')->name('admin.recoverAll');

Route::get('/admin/controlAdmins', 'AdminController@admins')->name('admin.admins');
Route::post('/admin/users/upgradeToAdmin/{id}', 'AdminController@upgradeToAdmin')->name('admin.upgradeToAdmin');
Route::post('/admin/users/downgradeToSub/{id}', 'AdminController@downgradeToSubAdmin')->name('admin.downgradeToSub');



// routes for user controller
Route::get('profile', 'UserController@index')->name('user.profile');
Route::get('profile/edit/{id}', 'UserController@edit')->name('user.edit');
Route::post('profile/update/', 'UserController@update')->name('user.update');
Route::match(['put', 'patch'],'profile/updateLogin/', 'UserController@updateLoginInfo')->name('user.updateLoginInfo');
Route::get('user/{id}', 'UserController@show')->name('user.show');



// routes for Orders controller
Route::get('adoption' ,'AdoptionController@index')->name('adoption.index');
Route::get('filteredAdoption', 'FilterController@adoption_filter')->name('adoption.filters');
Route::get('adoption/create' ,'AdoptionController@create')->name('adoption.create');
Route::get('adoption/edit/{id}' ,'AdoptionController@edit')->name('adoption.edit');
Route::get('adoption/{id}' ,'AdoptionController@show')->name('adoption.show');
Route::post('adoption/store' , 'AdoptionController@store')->name('adoption.store');
Route::post('adoption/update' , 'AdoptionController@update')->name('adoption.update');
Route::delete('adoption/delete/{id}' ,'AdoptionController@delete')->name('adoption.delete');
Route::post('adoption/close/{id}' ,'AdoptionController@close')->name('adoption.close');
Route::post('adoption/recovery/{id}' ,'AdoptionController@recovery')->name('adoption.recovery');

// routes for rescue
Route::get('rescue' ,'RescueController@index')->name('rescue.index');
Route::get('filteredRescue', 'FilterController@rescue_filter')->name('rescue.filters');
Route::get('rescue/create' ,'RescueController@create')->name('rescue.create');
Route::get('rescue/edit/{id}' ,'RescueController@edit')->name('rescue.edit');
Route::get('rescue/{id}' ,'RescueController@show')->name('rescue.show');
Route::post('rescue/store' , 'RescueController@store')->name('rescue.store');
Route::post('rescue/update' , 'RescueController@update')->name('rescue.update');
Route::delete('rescue/delete/{id}' ,'RescueController@delete')->name('rescue.delete');
Route::post('rescue/close/{id}' ,'RescueController@close')->name('rescue.close');
Route::post('rescue/recovery/{id}' ,'RescueController@recovery')->name('rescue.recovery');

// routes for lost controller
Route::get('lost' , 'LostController@index')->name('lost.index');
Route::get('filteredLost', 'FilterController@lost_filter')->name('lost.filters');
Route::get('lost/create' , 'LostController@create')->name('lost.create');
Route::get('lost/edit/{id}' , 'LostController@edit')->name('lost.edit');
Route::get('lost/{id}' , 'LostController@show')->name('lost.show');
Route::post('lost/store' , 'LostController@store')->name('lost.store');
Route::post('lost/update' , 'LostController@update')->name('lost.update');
Route::delete('lost/delete/{id}' , 'LostController@delete')->name('lost.delete');
Route::post('lost/close/{id}' ,'LostController@close')->name('lost.close');
Route::post('lost/recovery/{id}' ,'LostController@recovery')->name('lost.recovery');

// routes for report controller
Route::get('/admin/reports/{id}', 'ReportController@show')->name('reports.show');
