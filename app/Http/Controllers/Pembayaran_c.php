<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
    //Konfigurasi untuk manggil model
use App\Models\Pembayaran;
use App\Models\Tagihan;

class Pembayaran_c extends Controller
{
    //construct 
    public function __construct()
    {
        $this->Pembayaran = new Pembayaran();
        $this->Tagihan = new Tagihan();
        $this->middleware('auth');
    }
    
        //halaman utama
    public function index(){
        $data['pembayaran'] = $this->Pembayaran->allData();
        return view('admin/page/pembayaran/view_pembayaran',$data);
    }

        //tambah data
    public function tambah_pembayaran(){
        return view('admin/page/pembayaran/tambah_pembayaran');
    }
    public function insert(Request $request){
        $request->validate([
            'tanggal' => 'required',
            'id' => 'required',
            'bulan_bayar' => 'required',
            'biaya_admin' => 'required',
        ]);

        $data =[
            'id' => request()->id,
            'tanggal' => request()->tanggal,
            'bulan_bayar' => request()->bulan_bayar,
            'biaya_admin' => request()->biaya_admin,
        ];
        $this->Pembayaran->addData($data);
        return redirect()->to('/admin/view_pembayaran')->with('succes','insert succesfully');
    }

        //edit data
    public function edit_pembayaran($id_pembayaran){
        $data['pembayaran'] = $this->Pembayaran->getData($id_pembayaran);
        return view('admin/page/pembayaran/edit_pembayaran',$data);
    }
    public function update(Request $request,$id_pembayaran){
        $data['pembayaran'] = $this->Pembayaran->getData($id_pembayaran);
        $request->validate([
            'id' => 'required',
            'tanggal' => 'required',
            'bulan_bayar' => 'required',
            'biaya_admin' => 'required',
        ]);

        $data =[
            'id' => request()->id,
            'tanggal' => request()->tanggal,
            'bulan_bayar' => request()->bulan_bayar,
            'biaya_admin' => request()->biaya_admin,
        ];
        $this->Pembayaran->editData($data,$id_pembayaran);
        return redirect()->to('/admin/view_pembayaran')->with('success','update succesfully');
    }

        //undo
    public function undo($id_pembayaran,$id_tagihan){
        $confirm = ['status' => 'belum_bayar'];
        $this->Tagihan->confirm_status($id_tagihan,$confirm);

        $this->Pembayaran->deleteData($id_pembayaran);
        return redirect()->to('/admin/view_pembayaran')->with('delete','delete succesfully');
    }
    
}
