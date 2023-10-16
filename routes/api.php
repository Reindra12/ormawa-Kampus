<?php

use App\Http\Controllers\AbsenController;
use App\Http\Controllers\AbsensiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JWTController;
use App\Http\Controllers\MultipleUploadController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DetailJenisKegiatanController;
use App\Http\Controllers\DetailKegiatanController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HistoriPencarianController;
use App\Http\Controllers\JenisKegiatanController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\OrmawaController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group(['middleware' => 'api'], function($router) {
    Route::post('/register', [JWTController::class, 'register']);
    Route::post('/login', [JWTController::class, 'login']);
    Route::post('/logout', [JWTController::class, 'logout']);
    Route::post('/refresh', [JWTController::class, 'refresh']);
    Route::post('/profile', [JWTController::class, 'profile']);


});

//historypencarian
Route::resource('/historypencarian', HistoriPencarianController::class)->middleware('jwtmiddleware');
//absen
Route::resource('/absensi', AbsensiController::class);
Route::post('/sendnotif', [JenisKegiatanController::class,'sendNotif']);

//mahasiswa
Route::resource('/mahasiswa', MahasiswaController::class)->middleware('jwtmiddleware');
Route::post('/mahasiswa/{id}', [MahasiswaController::class,'update']);

//absen
Route::resource('/absen', AbsenController::class)->middleware('jwtmiddleware');

// kegiatan
Route::resource('/kegiatan', KegiatanController::class)->middleware('jwtmiddleware');
Route::resource('/jenis_kegiatan', JenisKegiatanController::class)->middleware('jwtmiddleware');
Route::resource('/ormawa', OrmawaController::class)->middleware('jwtmiddleware');
Route::resource('/detail_jenis_kegiatan', DetailJenisKegiatanController::class)->middleware('jwtmiddleware');
Route::get('/search/{nama}',[KegiatanController::class,'searchKegiatan']);
Route::get('/kegiatanByIdJenis/{id}', [KegiatanController::class, 'kegiatanByIdJenisKegiatan']);


//detail kegiatan
Route::resource('/detail_kegiatan', DetailKegiatanController::class)->middleware('jwtmiddleware');
Route::post('/absenKegiatan', [DetailKegiatanController::class,'absenKegiatan']);

// jurusan

Route::resource('/jurusan', JurusanController::class)->middleware('jwtmiddleware');

// event
Route::get('eventbyidcategory/{id}', [EventController::class, 'eventByIdCategory']);
Route::get('/events', [EventController::class, 'events']);



//category
Route::get('/showevent/{id}', [CategoryController::class, 'showEvent']);
Route::get('/getcategories', [CategoryController::class, 'getCategories']);
Route::post('/createcategory', [CategoryController::class, 'createCategory']);




Route::post('multiple-image-upload', [MultipleUploadController::class, 'uploadMultiple']);
Route::post('images', [MultipleUploadController::class, 'store']);

// Route::get('/getEvent/{id}', [CategoriesImageController::class, 'event']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
