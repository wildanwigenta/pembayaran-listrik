<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
    // Konfigurasi 
use App\Models\Tagihan;
use App\Models\User;

class Tagihan_c extends Controller
{
    //construct 
    public function __construct()
    {
        $this->Tagihan = new Tagihan();
        $this->User = new User();
        $this->middleware('auth');
    }
    //halaman utama
    public function index(){

        $data['tagihan'] = $this->Tagihan->allData();
        return view('admin/page/tagihan/view_tagihan',$data);
    }
    
        //tambah data
    public function tambah_tagihan(){
        $data['user'] = $this->User->pelangganData();
        return view('admin/page/tagihan/tambah_tagihan',$data);
    }
    public function insert(Request $request){
        $request->validate([
            'id' => 'required',
            'bulan' => 'required',
            'tahun' => 'required',
            'meter_awal' => 'required',
            'meter_akhir' => 'required',
        ]);
            //penggunaan
        $data =[
            'id' => request()->id,
            'bulan' => request()->bulan,
            'tahun' => request()->tahun,
            'meter_awal' => request()->meter_awal,
            'meter_akhir' => request()->meter_akhir,
        ];
        $this->Tagihan->addData($data);

            //mengambil data penggunaan
        $penggunaan = $this->Tagihan->getPenggunaan($data);
            //tagihan
        $data_tagihan = [
            'id' => request()->id,
            'id_penggunaan' => $penggunaan->id_penggunaan,
            'bulan' => request()->bulan,
            'tahun' => request()->tahun,
            'jumlah_meter' => request()->meter_akhir - request()->meter_awal,
            'status' => 'belum_bayar',
        ];
        $this->Tagihan->addDataTagihan($data_tagihan);
        return redirect()->to('/petugas/view_tagihan')->with('succes','insert succesfully');
    }

        //konfirmasi status pembayaran
    public function confirm_status($id_tagihan){
        $confirm = ['status' => 'sudah_bayar'];
        $this->Tagihan->confirm_status($id_tagihan,$confirm);
        $tagihan = $this->Tagihan->select_tagihan_pembayaran($id_tagihan);
        $data =[
            'id' => $tagihan->id,
            'id_tagihan' => $tagihan->id_tagihan,
            'tanggal' => date('y-m-d'),
            'jumlah_bayar' => $tagihan->jumlah_meter * ($tagihan->kode_tarif == 1 ? 1352 : 1467),
            'biaya_admin' => (5/100) * $tagihan->jumlah_meter * ($tagihan->kode_tarif == 1 ? 1352 : 1467) >= 30000 ? 30000 : ((5/100) * $tagihan->jumlah_meter * ($tagihan->kode_tarif == 1 ? 1352 : 1467) <= 5000 ? 5000 : (5/100) * $tagihan->jumlah_meter * ($tagihan->kode_tarif == 1 ? 1352 : 1467)), 
            'time_stop' => time(),
        ];
        $this->Tagihan->pembayaran($data);
        return redirect()->to('/admin/view_pembayaran')->with('succes','insert succesfully');
        }

        //edit data
    public function edit_tagihan($id_tagihan){
        $data['tagihan'] = $this->Tagihan->getDataTagihan($id_tagihan);
        $data['user'] = $this->User->allData();
        return view('admin/page/tagihan/edit_tagihan',$data);
    }
    public function update(Request $request,$id_tagihan,$id_penggunaan){
        $request->validate([
            'bulan' => 'required',
            'tahun' => 'required',
            'meter_awal' => 'required',
            'meter_akhir' => 'required',
        ]);

        $data =[
            'bulan' => request()->bulan,
            'tahun' => request()->tahun,
            'meter_awal' => request()->meter_awal,
            'meter_akhir' => request()->meter_akhir,
        ];
        $this->Tagihan->updateData($data,$id_penggunaan);
        $data_tagihan =[
            'bulan' => request()->bulan,
            'tahun' => request()->tahun,
            'jumlah_meter' => request()->meter_akhir - request()->meter_awal,
        ];
        $this->Tagihan->editDataTagihan($data_tagihan,$id_tagihan,$id_penggunaan);
        return redirect()->to('/admin/view_tagihan')->with('success','update succesfully');
    }

        //delete
    public function delete($id_tagihan){

        $data = $this->Tagihan->getDataTagihan($id_tagihan);

        $this->Tagihan->deleteData($id_tagihan);
        $this->Tagihan->deleteDataPenggunaan($data->id_penggunaan);
        return redirect()->to('/admin/view_tagihan')->with('delete','delete succesfully');  
    }
}
