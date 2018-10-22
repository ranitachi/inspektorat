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

Route::get('/dashboard', function(){
    return view('backend.pages.dashboard.index');
})->middleware('auth');

Route::resource('data-opd','MasterDinasController')->middleware('auth');
Route::resource('kepala-opd','MasterKepalaDinasController')->middleware('auth');
Route::resource('data-temuan','MasterTemuanController')->middleware('auth');
Route::resource('data-penyebab','MasterSebabController')->middleware('auth');
Route::resource('data-rekomendasi','MasterRekomendasiController')->middleware('auth');
Route::resource('bidang-pengawasan','MasterBidangPengawasanController')->middleware('auth');
Route::resource('users','UsersController')->middleware('auth');

Auth::routes();
Route::get('logout',function(){
    Auth::logout();
    return redirect('login');
});
Route::get('/home', 'HomeController@index')->name('home');
