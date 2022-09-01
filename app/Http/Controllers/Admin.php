<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pembayaran;

class Admin extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->Pembayaran = new Pembayaran;

    }
    public function index(){
        $tahun = request()->tahun;
        $bulan = request()->bulan;
        $data['bulan'] = request()->bulan;
        $data['tahun'] = request()->tahun;
        $data['bulanan'] = $this->Pembayaran->bulan($bulan,$tahun);
        $data['tahunan'] = $this->Pembayaran->tahun($tahun);
        $data['adminbulanan'] = $this->Pembayaran->adminbulan($bulan,$tahun);
        $data['admintahunan'] = $this->Pembayaran->admintahun($tahun);
        return view('admin/index',$data);
    }
}
