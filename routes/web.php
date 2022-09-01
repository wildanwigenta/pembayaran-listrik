<?php
 //configurasi
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/', function () {
//     return view('welcome');
// });

    // ==== Frontend ====
    Route::get('/',[App\Http\Controllers\Frontend_c::class,'index']);
    Route::get('/invoice/{id}/{id_tagihan}',[App\Http\Controllers\Frontend_c::class,'invoice']);
    Route::get('/riwayat/{id}',[App\Http\Controllers\Frontend_c::class,'riwayat']);
    Route::post('/pembayaran/{id_tagihan}',[App\Http\Controllers\Frontend_c::class,'pembayaran']);


                        // ==== ROUTE ADMIN ====
Route::prefix('admin')->middleware(['auth','admin-level'])->group(function(){

    // ==== index admin ====
    Route::get('/',[App\Http\Controllers\Admin::class,'index']);
    Route::post('/',[App\Http\Controllers\Admin::class,'index']);

    // ==== User ====
    Route::get('/view_user',[App\Http\Controllers\User_c::class,'index']);
    Route::get('/tambah_user',[App\Http\Controllers\User_c::class,'tambah_user']);
    Route::post('/insert_user',[App\Http\Controllers\User_c::class,'insert']);    
    Route::get('/edit_user/{id}',[App\Http\Controllers\User_c::class,'edit_user']);
    Route::post('/update_user/{id}',[App\Http\Controllers\User_c::class,'update']);
    Route::get('/delete_user/{id}',[App\Http\Controllers\User_c::class,'delete']);

    // ==== Pembayaran ====
    Route::get('/view_pembayaran',[App\Http\Controllers\Pembayaran_c::class,'index']);
    Route::get('/tambah_pembayaran',[App\Http\Controllers\Pembayaran_c::class,'tambah_pembayaran']);
    Route::post('/insert_pembayaran',[App\Http\Controllers\Pembayaran_c::class,'insert']);
    Route::get('/edit_pembayaran/{id_pembayaran}',[App\Http\Controllers\Pembayaran_c::class,'edit_pembayaran']);
    Route::get('/undo/{id_pembayaran}/{id_tagihan}',[App\Http\Controllers\Pembayaran_c::class,'undo']);

    // ==== Tagihan ====
    Route::get('/view_tagihan',[App\Http\Controllers\Tagihan_c::class,'index']);
    Route::get('/tambah_tagihan',[App\Http\Controllers\Tagihan_c::class,'tambah_tagihan']);
    Route::post('/insert_tagihan',[App\Http\Controllers\Tagihan_c::class,'insert']);
    Route::get('/edit_tagihan/{id_tagihan}',[App\Http\Controllers\Tagihan_c::class,'edit_tagihan']);
    Route::post('/update_tagihan/{id_tagihan}/{id_penggunaan}',[App\Http\Controllers\Tagihan_c::class,'update']);
    Route::get('/confirm_status/{id}',[App\Http\Controllers\Tagihan_c::class,'confirm_status']);
    Route::get('/delete_tagihan/{id_tagihan}',[App\Http\Controllers\Tagihan_c::class,'delete']);
    
    
});


                        // ==== ROUTE PETUGAS ====
Route::prefix('petugas')->middleware(['auth','petugas-level'])->group(function(){
    
    // ==== index admin ====
    Route::get('/',[App\Http\Controllers\Admin::class,'index']);
    Route::post('/',[App\Http\Controllers\Admin::class,'index']);

    // ==== Tagihan ====
    Route::get('/view_tagihan',[App\Http\Controllers\Tagihan_c::class,'index']);
    Route::get('/tambah_tagihan',[App\Http\Controllers\Tagihan_c::class,'tambah_tagihan']);
    Route::post('/insert_tagihan',[App\Http\Controllers\Tagihan_c::class,'insert']);
    Route::get('/edit_tagihan/{id_tagihan}',[App\Http\Controllers\Tagihan_c::class,'edit_tagihan']);
    Route::post('/update_tagihan/{id_tagihan}/{id_penggunaan}',[App\Http\Controllers\Tagihan_c::class,'update']);
    Route::get('/confirm_status/{id}',[App\Http\Controllers\Tagihan_c::class,'confirm_status']);
    Route::get('/delete_tagihan/{id_tagihan}',[App\Http\Controllers\Tagihan_c::class,'delete']);
    

});

    //auth login
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

