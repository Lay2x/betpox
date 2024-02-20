<?php

use App\Http\Controllers\FaqController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\HomeWebController;
use App\Http\Controllers\KategoriPinboxController;
use App\Http\Controllers\KeunggulanController;
use App\Http\Controllers\KotaController;
use App\Http\Controllers\LaporController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\ProvinsiController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TestimoniController;
use App\Http\Controllers\VideoController;
use App\Models\KategoriPinbox;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeWebController::class, 'index']);
Route::get('/lihat/{qr}', [HomeWebController::class, 'lihat'])->name('lihat');
Route::post('laporpenuh', [HomeWebController::class, 'laporpenuh'])->name('laporpenuh');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard.index');
    })->name('dashboard.index');
    Route::resource('faq', FaqController::class);
    Route::resource('setting', SettingController::class);
    Route::post('image-upload', [SettingController::class, 'storeImage'])->name('image.upload');
    Route::resource('testimoni', TestimoniController::class);
    Route:: resource('video', VideoController::class);
    Route::resource('galeri', GaleriController::class);
    Route::resource('keunggulan', KeunggulanController::class);
    Route::resource('lokasi', LokasiController::class);
    Route::resource('kategori_pinbox', KategoriPinboxController::class);
    Route::resource('provinsi', ProvinsiController::class);
    Route::resource('kota', KotaController::class);
    Route::post('api/fetch-cities', [LokasiController::class, 'fetchCity']);
    Route::resource('lapor', LaporController::class);
    Route::get('/notif', [HomeWebController::class, 'notif']);
});
