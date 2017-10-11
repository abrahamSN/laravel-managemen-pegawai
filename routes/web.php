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

Route::group(['middleware' => 'auth'], function () {

    Route::get('/home', 'HomeController@index')->name('home');

    //ini adalah route buat user
    Route::get('/user', ['uses' => 'UserController@index', 'middleware' => ['permission:user-view']]);
    Route::get('/user/tambah', ['uses' => 'UserController@create', 'middleware' => ['permission:user-create']]);
    Route::post('/user/store', ['uses' => 'UserController@store', 'middleware' => ['permission:user-create']]);
    Route::get('/user/edit/{id}', ['uses' => 'UserController@edit', 'middleware' => ['permission:user-edit']]);
    Route::post('/user/update/{id}', ['uses' => 'UserController@update', 'middleware' => ['permission:user-edit']]);
    Route::get('/user/hapus/{id}', ['uses' => 'UserController@destroy', 'middleware' => ['permission:user-delete']]);
    Route::get('/user/makeuserrole/{user}/{role}', ['uses' => 'UserController@makeUserRole', 'middleware' => ['permission:user-edit']]);
    Route::get('/user/deleuserrole/{user}/{role}', ['uses' => 'UserController@deleUserRole', 'middleware' => ['permission:user-edit']]);

    //ini adalah route buat permission
    Route::get('/permission', ['uses' => 'PermissionController@index', 'middleware' => ['permission:permission-view']]);
    Route::get('/permission/tambah', ['uses' => 'PermissionController@create', 'middleware' => ['permission:permission-create']]);
    Route::post('/permission/store', ['uses' => 'PermissionController@store', 'middleware' => ['permission:permission-create']]);
    Route::get('/permission/edit/{id}', ['uses' => 'PermissionController@edit', 'middleware' => ['permission:permission-edit']]);
    Route::post('/permission/update/{id}', ['uses' => 'PermissionController@update', 'middleware' => ['permission:permission-edit']]);
    Route::get('/permission/hapus/{id}', ['uses' => 'PermissionController@destroy', 'middleware' => ['permission:permission-delete']]);
    Route::get('/permission/makepermirole/{perm}/{role}', ['uses' => 'PermissionController@makePermiRole', 'middleware' => ['permission:permission-edit']]);
    Route::get('/permission/delepermirole/{perm}/{role}', ['uses' => 'PermissionController@delePermiRole', 'middleware' => ['permission:permission-edit']]);

    //ini adalah route buat role
    Route::get('/role', ['uses' => 'RoleController@index', 'middleware' => ['permission:role-view']]);
    Route::get('/role/tambah', ['uses' => 'RoleController@create', 'middleware' => ['permission:role-create']]);
    Route::post('/role/store', ['uses' => 'RoleController@store', 'middleware' => ['permission:role-create']]);
    Route::get('/role/edit/{id}', ['uses' => 'RoleController@edit', 'middleware' => ['permission:role-edit']]);
    Route::post('/role/update/{id}', ['uses' => 'RoleController@update', 'middleware' => ['permission:role-edit']]);
    Route::get('/role/hapus/{id}', ['uses' => 'RoleController@destroy', 'middleware' => ['permission:role-delete']]);

    //ini adalah route buat tugas
    Route::get('/tugas', ['uses' => 'TugasController@index', 'middleware' => ['permission:tugas-view']]);
    Route::get('/tugas/tambah', ['uses' => 'TugasController@create', 'middleware' => ['permission:tugas-create']]);
    Route::post('/tugas/store', ['uses' => 'TugasController@store', 'middleware' => ['permission:tugas-create']]);
    Route::get('/tugas/edit/{id}', ['uses' => 'TugasController@edit', 'middleware' => ['permission:tugas-edit']]);
    Route::post('/tugas/update/{id}', ['uses' => 'TugasController@update', 'middleware' => ['permission:tugas-edit']]);
    Route::get('/tugas/hapus/{id}', ['uses' => 'TugasController@destroy', 'middleware' => ['permission:tugas-delete']]);

    //ini adalah route buat laporan
    Route::get('/laporan', ['uses' => 'LaporanController@index', 'middleware' => ['permission:laporan-view']]);
    Route::get('/laporan/tambah', ['uses' => 'LaporanController@create', 'middleware' => ['permission:laporan-create']]);
    Route::post('/laporan/store', ['uses' => 'LaporanController@store', 'middleware' => ['permission:laporan-create']]);
    Route::get('/laporan/edit/{id}', ['uses' => 'LaporanController@edit', 'middleware' => ['permission:laporan-edit']]);
    Route::post('/laporan/update/{id}', ['uses' => 'LaporanController@update', 'middleware' => ['permission:laporan-edit']]);
    Route::get('/laporan/hapus/{id}', ['uses' => 'LaporanController@destroy', 'middleware' => ['permission:laporan-delete']]);
    Route::get('/laporan/show/{id}', ['uses' => 'LaporanController@show', 'middleware' => ['permission:laporan-show']]);
    Route::get('/laporan/pending/{id}', ['uses' => 'LaporanController@pending', 'middleware' => ['permission:laporan-kerjakan']]);
    Route::get('/laporan/kerjakan/{id}', ['uses' => 'LaporanController@kerja', 'middleware' => ['permission:laporan-kerjakan']]);
    Route::post('/laporan/selesai/{id}', ['uses' => 'LaporanController@selesai', 'middleware' => ['permission:laporan-kerjakan']]);
    Route::get('/laporan/verif/{id}', ['uses' => 'LaporanController@verif', 'middleware' => ['permission:laporan-verif']]);
    Route::post('/laporan/pdf', ['uses' => 'LaporanController@pdf', 'middleware' => ['permission:laporan-view']]);

    // route untuk chat
    Route::get('/chat', 'ChatController@index');
    Route::get('/chat/inbox', 'ChatController@inbox');
    Route::get('/chat/sent', 'ChatController@sent');
    Route::get('/chat/compose', 'ChatController@create');
    Route::post('/chat/store', 'ChatController@store');
    Route::get('/chat/{id}', 'ChatController@show');
    Route::post('/chat/reply/{id}', 'ChatController@reply');

});