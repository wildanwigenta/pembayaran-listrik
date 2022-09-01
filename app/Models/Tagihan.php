<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
    // konfigurasi database
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class Tagihan extends Model
{
    use HasFactory;
        // ambil data tagihan
    public function allData(){
        return DB::table('tagihan')
        ->orderBy('id_tagihan','desc')
        ->join('users','tagihan.id', '=','users.id')
        ->get();
    }
        // ambil data tagihan
    public function getDataUser(){
        return DB::table('tagihan')
        ->orderBy('id_tagihan','desc')
        ->join('users','tagihan.id', '=','users.id')
        ->where('status','belum_bayar')
        ->where('users.id', Auth::user()->id)   
        ->get();
    }
        // ambil data sesuai id tagihan
    public function getDataTagihan($id_tagihan){
        return DB::table('tagihan')
        ->join('users','tagihan.id', '=','users.id')
        ->join('penggunaan','tagihan.id_penggunaan','=','penggunaan.id_penggunaan')
        ->where('id_tagihan',$id_tagihan)
        ->first();
    }
        // ambil data sesuai id pembayaran
    public function getData($id_pembayaran){
        return DB::table('pembayaran')->where('id_pembayaran',$id_pembayaran)
        ->first();
    }
        // insert data ke database
    public function addData($data){
        DB::table('penggunaan')->insert($data);
    }
        // update data penggunaan
    public function updateData($data,$id_penggunaan){
        DB::table('penggunaan')
        ->where('id_penggunaan',$id_penggunaan)
        ->update($data);
    }
        // edit data tagihan
    public function editDataTagihan($data_tagihan,$id_tagihan){
        DB::table('tagihan')
        ->where('id_tagihan',$id_tagihan)
        ->update($data_tagihan);
    }
    // tambah data tagihan
    public function addDataTagihan($data_tagihan){
        DB::table('tagihan')->insert($data_tagihan);
    }
        // ambil data sesuai inputan penggunaan
    public function getPenggunaan($data){
        return DB::table('penggunaan')->where($data)->first();
    }
        // konfirmasi status
    public function confirm_status($id_tagihan,$confirm){
        return DB::table('tagihan')->where('id_tagihan',$id_tagihan)->update($confirm);
    }
        // select tagihan pembayaran
    public function select_tagihan_pembayaran($id_tagihan){
        return DB::table('tagihan')
        ->join('users','tagihan.id', '=','users.id')
        ->where('id_tagihan',$id_tagihan)
        ->first();
    }
        // pembayaran
    public function pembayaran($data){
        DB::table('pembayaran')->insert($data);

    }
        // edit data ke database
    public function editData($data,$id_pembayaran){
        DB::table('pembayaran')->where('id_pembayaran',$id_pembayaran)->update($data);
    }
        // ambil data sesuai user dan status tagihan di invoice
    public function getTagihanInvoice(){
        $id = Auth::user()->id;

        return DB::table('tagihan')
        ->join('penggunaan', 'penggunaan.id_penggunaan', '=', 'tagihan.id_penggunaan')
        ->join('users', 'users.id', '=', 'tagihan.id')
        ->where('status','belum_bayar')
        ->where('users.id', $id)
        ->orderBy('tagihan.bulan','asc')
        ->orderBy('tagihan.tahun','asc')
        ->get();
    }
        // ambil data tagihan di invoice
    public function getDataInvoice($id,$id_tagihan){
        return DB::table('tagihan')
        ->orderBy('id_tagihan','desc')
        ->join('penggunaan', 'penggunaan.id_penggunaan', '=', 'tagihan.id_penggunaan')
        ->join('users','tagihan.id', '=','users.id')
        ->where('status','belum_bayar')
        ->where('users.id', $id)
        ->where('tagihan.id_tagihan', $id_tagihan)
        ->first();
    }
        // ambil data tagihan di invoice riwayat
    public function getDataRiwayat($id){
        return DB::table('tagihan')
        ->join('penggunaan', 'penggunaan.id_penggunaan', '=', 'tagihan.id_penggunaan')
        ->join('users','tagihan.id', '=','users.id')
        ->where('status','sudah_bayar')
        ->where('users.id', $id)
        ->get();
    }
        // ambil data tagihan di invoice riwayat
    public function getDataRiwayatWa($id_tagihan){
        return DB::table('tagihan')
        ->join('penggunaan', 'penggunaan.id_penggunaan', '=', 'tagihan.id_penggunaan')
        ->join('users','tagihan.id', '=','users.id')
        ->where('tagihan.id_tagihan', $id_tagihan)
        ->first();
    }
        // hapus data 
    public function deleteData($id_tagihan){
        return DB::table('tagihan')->where('id_tagihan',$id_tagihan)->delete();
    }
        // hapus data penggunaan
    public function deleteDataPenggunaan($id_penggunaan){
        return DB::table('penggunaan')->where('id_penggunaan',$id_penggunaan)->delete();
    }
}
