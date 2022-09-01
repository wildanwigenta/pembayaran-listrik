<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
    // konfigurasi database
use Illuminate\Support\Facades\DB;

class Pembayaran extends Model
{
    use HasFactory;

    public function allData(){
        return DB::table('pembayaran')
        ->join('users','pembayaran.id', '=','users.id')
        ->get();
    }
        // ambil data sesuai id
    public function getData($id_pembayaran){
        return DB::table('pembayaran')->where('id_pembayaran',$id_pembayaran)->first();
    }
        // insert data ke database
    public function addData($data){
        DB::table('pembayaran')->insert($data);
    }
        // edit data ke database
    public function editData($data,$id_pembayaran){
        DB::table('pembayaran')->where('id_pembayaan',$id_pembayaran)->update($data);
    }
        // hapus data 
    public function deleteData($id_pembayaran){
        return DB::table('pembayaran')->where('id_pembayaran',$id_pembayaran)->delete();
    }

    //--------------------------------------------------------------------------------------//

        // bulanan
    public function bulan($bulan,$tahun){
        $m = date('m');
        $y = "20".date('y');
        return DB::table('pembayaran')
        ->join('users','pembayaran.id', '=','users.id')
        ->join('tagihan','pembayaran.id_tagihan', '=','tagihan.id_tagihan')
        ->where('tagihan.bulan',$bulan != null ? $bulan : $m)
        ->where('tagihan.tahun',$tahun != null ? $tahun : $y)
        ->sum('pembayaran.jumlah_bayar');
    }
        // tahunan
    public function tahun($tahun){
        $y = "20".date('y');
        return DB::table('pembayaran')
        ->join('users','pembayaran.id', '=','users.id')
        ->join('tagihan','pembayaran.id_tagihan', '=','tagihan.id_tagihan')
        ->where('tagihan.tahun',$tahun != null ? $tahun : $y)
        ->sum('pembayaran.jumlah_bayar');
    }
    
        // admin bulanan
    public function adminbulan($bulan,$tahun){
        $m = date('m');
        $y = "20".date('y');
        return DB::table('pembayaran')
        ->join('users','pembayaran.id', '=','users.id')
        ->join('tagihan','pembayaran.id_tagihan', '=','tagihan.id_tagihan')
        ->where('tagihan.bulan',$bulan != null ? $bulan : $m)
        ->where('tagihan.tahun',$tahun != null ? $tahun : $y)
        ->sum('pembayaran.biaya_admin');
    }

        // admin tahunan
    public function admintahun($tahun){
        $m = date('m');
        $y = "20".date('y');
        return DB::table('pembayaran')
        ->join('users','pembayaran.id', '=','users.id')
        ->join('tagihan','pembayaran.id_tagihan', '=','tagihan.id_tagihan')
        ->where('tagihan.tahun',$tahun != null ? $tahun : $y)
        ->sum('pembayaran.biaya_admin');
    }
}

