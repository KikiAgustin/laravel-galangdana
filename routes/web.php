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
Route::get('/', 'HomeController@index')->name('home');
Route::get('/program', 'HomeController@program')->name('program');
Route::get('/detail/{slug}', 'DetailController@index')->name('detail');

Route::get('/daftar-blog', 'UserBlogController@index')->name('daftar-blog');
Route::get('/detail-blog/{slug}', 'UserBlogDetailController@index')->name('detail-blog');
Route::post('/comment-blog/{slug}', 'UserBlogController@comment')->name('comment-blog');

Route::get('/yayasan-tujuan/{id}', 'YayasanController@index')->name('yayasan-tujuan');
Route::get('/yayasan-tentang/{id}', 'YayasanController@tentang')->name('yayasan-tentang');
Route::get('/struktur-organisasi', 'YayasanController@struktur')->name('struktur-organisasi');

Route::get('/profile', 'UserController@index')->name('profile');
Route::get('/edit-profile', 'UserController@edit')->name('edit-profile');
Route::post('/proseseditprof/{id}', 'UserController@update')->name('proseseditprof');

Route::get('/donasi/{slug}', 'DonasiController@index')->name('donasi');
Route::post('donasiproses/{slug}', 'DonasiController@process')->name('donasiproses');
Route::get('/donasi-login/{slug}', 'DonasiController@donasiLogin')->name('donasi-login')->middleware(['auth', 'verified']);
Route::post('proseslogin/{slug}', 'DonasiController@processlogin')->name('proseslogin')->middleware(['auth', 'verified']);
Route::get('/donasi-sukses', 'DonasiController@success')->name('donasi-sukses');

// Laporan
Route::get('/laporan-member', 'LaporanController@laporanmember')->name('laporan-member');
Route::get('/laporan-member-pdf', 'LaporanController@memberpdf')->name('laporan-member-pdf');
Route::get('/laporan-member-excel', 'LaporanController@memberexcel')->name('laporan-member-excel');
Route::get('/laporan-donasi', 'LaporanController@laporandonasi')->name('laporan-donasi');
Route::get('/laporan-donasi-gagal', 'LaporanController@laporandonasigagal')->name('laporan-donasi-gagal');
Route::get('/laporan-donasi-pdf', 'LaporanController@donasipdf')->name('laporan-donasi-pdf');
Route::get('/laporan-donasi-pdf-gagal', 'LaporanController@donasipdfgagal')->name('laporan-donasi-pdf-gagal');
Route::get('/laporan-donasi-excel', 'LaporanController@donasiexcel')->name('laporan-donasi-excel');
Route::get('/laporan-donasi-excel-gagal', 'LaporanController@donasiexcelgagal')->name('laporan-donasi-excel-gagal');

// Midtrans
Route::post('/midtrans/callback', 'MidtransController@notificationHandler');
Route::get('/midtrans/finish', 'MidtransController@finishRedirect');
Route::get('/midtrans/unfinish', 'MidtransController@unfinishRedirect');
Route::get('/midtrans/error', 'MidtransController@errorRedirect');

Route::prefix('admin')
    ->namespace('Admin')
    ->middleware(['auth', 'admin'])
    ->group(function () {
        Route::get('/', 'DashboardController@index')
            ->name('dashboard');

        Route::resource('program-donation', 'ProgramDonationController');
        Route::resource('gallery', 'GalleryController');
        Route::resource('transaction', 'TransactionController');
        Route::resource('category-donation', 'CategoryDonationController');
        Route::resource('pengurus-yayasan', 'PengurusController');
        Route::resource('profile-yayasan', 'ProfileController');
        Route::resource('blog', 'BlogController');
        Route::resource('distribution', 'PenyaluranController');
        Route::resource('report-transaction', 'ReportTransactionController');
        Route::resource('report', 'ReportController');
    });

Auth::routes(['verify' => true]);
