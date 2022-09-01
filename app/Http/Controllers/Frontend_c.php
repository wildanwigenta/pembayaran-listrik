<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;
use App\Models\Tagihan;

class Frontend_c extends Controller
{
    //construct untuk manggil model
    public function __construct()
    {
        
        $this->Tagihan = new Tagihan();
        $this->middleware('auth');
    }
    public function index(){
        $data['tagihan'] = $this->Tagihan->getDataUser();
        $data['tagihaninvoice'] = $this->Tagihan->getTagihanInvoice();
        return view('frontend/index',$data);
    }
    public function invoice($id,$id_tagihan){
        $data['invoice'] = $this->Tagihan->getDataInvoice($id,$id_tagihan);

        return view('frontend/invoice',$data);
    }

    public function riwayat($id){
        $data['riwayat'] = $this->Tagihan->getDataRiwayat($id);

        return view('frontend/riwayat',$data);

        
    }
    public function pembayaran($id_tagihan, Request $Request){
        
        $tagihan = $this->Tagihan->getDataRiwayatWa($id_tagihan);

        $bayar="";
        $bayar .= "Nama : ".Auth::user()->name."%0D%0A";
        $bayar .= "No.Rek : ".request()->rekening."%0D%0A";
        $bayar .= "Rekening : BRI %0D%0A";
        $bayar .= "Invoice : ".$tagihan->id_tagihan."%0D%0A";
        $bayar .= "Bulan : ".$tagihan->bulan."%0D%0A";
        $bayar .= "jumlah meter : ".$tagihan->jumlah_meter."KWH %0D%0A";
        $bayar .= "biaya admin : Rp.".number_format((5/100) * $tagihan->jumlah_meter * ($tagihan->kode_tarif == 1 ? 1352 : 1467) >= 30000 ? 30000 : ((5/100) * $tagihan->jumlah_meter * ($tagihan->kode_tarif == 1 ? 1352 : 1467) <= 5000 ? 5000 : (5/100) * $tagihan->jumlah_meter * ($tagihan->kode_tarif == 1 ? 1352 : 1467)))."%0D%0A";
        $bayar .= "Total Pembayaran : Rp.". number_format(((5/100) * $tagihan->jumlah_meter * ($tagihan->kode_tarif == 1 ? 1352 : 1467) >= 30000 ? 30000 : ((5/100) * $tagihan->jumlah_meter * ($tagihan->kode_tarif == 1 ? 1352 : 1467) <= 5000 ? 5000 : (5/100) * $tagihan->jumlah_meter * ($tagihan->kode_tarif == 1 ? 1352 : 1467))) + ($tagihan->jumlah_meter * ($tagihan->kode_tarif == 1 ? 1352 : 1467)))."%0D%0A";

        return redirect()->to("https://api.whatsapp.com/send?phone=+6281377243047&text=$bayar");
    }
}