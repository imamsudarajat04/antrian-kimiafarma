<?php
use App\Dokter;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/halaman-antrian', "AntrianController@antrian")->name('halaman-antrian.antrian');
Route::get('/antrian-baru/{kode}', "AntrianController@antrianbaru")->name('antrian-baru.antrianbaru');

Route::get('/display',"DisplayController@index")->name('display.index');

Route::get('/register', "RegisterController@index")->name('register');
Route::post('/register/store', "RegisterController@store")->name('registerstore');

Route::get('/masuk', "LoginController@index")->name('masuk');
Route::post('/loginpost', "LoginController@postlogin")->name('loginpost');
Route::get('/keluar', "LoginController@keluar")->name('keluar');

Route::group(['middleware' => ['auth','ceklevel:admin,dokter,apotek,cs',]], function() {
    Route::get('/dashboard', "DashboardController@index")->name('dashboardadmin');

    //Read
    Route::get('/pasien', "PasienController@index")->name('pasien.index');
    Route::get('/obat', "ObatController@index")->name('obat.index');
    Route::get('/permohonan', "PermohonanController@index")->name('permohonan.index');
    Route::get('/dokter', "DokterController@index")->name('dokter.index');
    Route::get('/antrian', "AntrianController@index")->name('antrian.index');
    Route::get('/user', "UsersController@index")->name('user.index');

    //Create
    Route::get('/tambah-user', "UsersController@create")->name('user.create');
    Route::post('/tambah-user/store', "UsersController@store")->name('user.store');

    Route::get('/tambah-dokter', "DokterController@create")->name('dokter.create');
    Route::post('/tambah-dokter/store', "DokterController@store")->name('dokter.store');

    Route::get('/tambah-pasien', "PasienController@create")->name('pasien.create');
    Route::post('/tambah-pasien/store', "PasienController@store")->name('pasien.store');

    Route::get('/tambah-obat', "ObatController@create")->name('obat.create');
    Route::post('/tambah-obat/store', "ObatController@store")->name('obat.store');

    Route::get('/tambah-permohonan', "PermohonanController@create")->name('permohonan.create');
    Route::post('/tambah-permohonan/store', "PermohonanController@store")->name('permohonan.store');

    //Put / Patch
    Route::get('/edit-user/{id}', "UsersController@edit")->name('user.edit');
    Route::put('/edit-user/{id}', "UsersController@update")->name('user.update');

    Route::get('/edit-dokter/{id}', "DokterController@edit")->name('dokter.edit');
    Route::put('/edit-dokter/{id}', "DokterController@update")->name('dokter.update');

    Route::get('/edit-pasien/{id}', "PasienController@edit")->name('pasien.edit');
    Route::put('/edit-pasien/{id}', "PasienController@update")->name('pasien.update');

    Route::get('/edit-obat/{id}', "ObatController@edit")->name('obat.edit');
    Route::put('/edit-obat/{id}', "ObatController@update")->name('obat.update');

    Route::put('/panggil-antrian/{id}', "AntrianController@update")->name('antrian.update');

    Route::get('/edit-permohonan/{id}', "PermohonanController@edit")->name('permohonan.edit');
    Route::put('/edit-permohonan/{id}', "PermohonanController@update")->name('permohonan.update');

    //Delete / Destroy
    Route::delete('/delete-user/{id}', "UsersController@destroy")->name('user.destroy');
    
    Route::delete('/delete-dokter/{id}', "DokterController@destroy")->name('dokter.destroy');

    Route::delete('/delete-pasien/{id}', "PasienController@destroy")->name('pasien.destroy');

    Route::delete('/delete-obat/{id}', "ObatController@destroy")->name('obat.destroy');

    Route::delete('/delete-antrian/{id}', "AntrianController@destroy")->name('antrian.destroy');

    Route::delete('/delete-permohonan/{id}', "PermohonanController@destroy")->name('permohonan.destroy');

    //Show
    Route::get('/data-dokter/{id}', "DokterController@show")->name('dokter.show');

    Route::get('/data-pasien/{id}', "PasienController@show")->name('pasien.show');
});

// Route::group(['middleware' => ['auth','ceklevel:dokter,admin']], function() {
//     Route::get('/dashboard', "DashboardController@index")->name('dashboardadmin');
//     Route::get('/halaman-dua', "DashboardController@halamandua")->name('halamandua');
// });

// Route::group(['middleware' => ['auth','ceklevel:admin,apotek']], function() {
//     Route::get('/dashboard', "DashboardController@index")->name('dashboardadmin');
//     Route::get('/halaman-satu', "DashboardController@halamansatu")->name('halamansatu');
// });

