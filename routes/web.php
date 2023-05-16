<?php

use App\Models\Employee;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ReligionController;

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
    $jumlahpegawai = Employee::count();
    $jumlahpegawaicowo = Employee::where('jeniskelamin', 'laki-laki')->count();
    $jumlahpegawaicewe = Employee::where('jeniskelamin', 'perempuan')->count();
    return view('welcome', compact('jumlahpegawai', 'jumlahpegawaicowo', 'jumlahpegawaicewe'));
})->middleware('auth');

//menampilkan data
Route::get('/pegawai', [EmployeeController::class, 'index'])->name('pegawai');

Route::group(['middleware' => ['auth', 'hakakses:admin']], function () {
    Route::get('/datareligion', [ReligionController::class, 'index'])->name('datareligion')->middleware('auth');
    Route::get('/tambahagama', [ReligionController::class, 'create'])->name('tambahagama');

    Route::post('/insertdatareligion', [ReligionController::class, 'store'])->name('insertdatareligion');
});

//Route untuk menampilkan form tambah data
Route::get('/tambahpegawai', [EmployeeController::class, 'tambahpegawai'])->name('tambahpegawai');
Route::post('/insertdata', [EmployeeController::class, 'insertdata'])->name('insertdata');

//Routu untuk edit data
Route::get('/tampilkandata/{id}', [EmployeeController::class, 'tampilkandata'])->name('tampilkandata');
Route::post('/updatedata/{id}', [EmployeeController::class, 'updatedata'])->name('updatedata');

//Route untuk delete
Route::get('/delete/{id}', [EmployeeController::class, 'delete'])->name('delete');

//Export Pdf
Route::get('/exportpdf', [EmployeeController::class, 'exportpdf'])->name('exportpdf');

//Export Excel
Route::get('/exportexcel', [EmployeeController::class, 'exportexcel'])->name('exportexcel');

//Import Excel
Route::post('/importexcel', [EmployeeController::class, 'importexcel'])->name('importexcel');

//Login
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/loginuser', [LoginController::class, 'loginuser'])->name('loginuser');

//Register
Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/registeruser', [LoginController::class, 'registeruser'])->name('registeruser');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
