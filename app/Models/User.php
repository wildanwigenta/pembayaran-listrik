<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
    // konfigurasi database
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // -------==================================------- //

        // ambil semua data di database
    public function allData(){
        return DB::table('users')
        ->join('tarif','users.kode_tarif', '=','tarif.kode_tarif')
        ->where('level', 'pelanggan')
        ->get();
    }

    public function allDataAdmin(){
        return DB::table('users')
        ->join('tarif','users.kode_tarif', '=','tarif.kode_tarif')
        ->where('level','petugas')
        ->orWhere('level','admin')
        ->get();
    }
        // ambil data sesuai level pelanggan
    public function pelangganData(){
        return DB::table('users')
        ->join('tarif','users.kode_tarif', '=','tarif.kode_tarif') //join table tarif (user'kode_tarif')=(tarif'kode_tarif')
        ->where('level','pelanggan') //dimana level : pelanggan
        ->get(); // ambil semua array
    }
        // ambil data sesuai id
    public function getData($id){
        return DB::table('users')->where('id',$id)->first();
    }
        // insert data ke database
    public function addData($data){
        DB::table('users')->insert($data);
    }
        // edit data ke database
    public function editData($data,$id){
        DB::table('users')->where('id',$id)->update($data);
    }
        // hapus data 
    public function deleteData($id){
        return DB::table('users')->where('id',$id)->delete();
    }

}
