<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
    // Konfigurasi untuk manggil model
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class User_c extends Controller
{

        //construct 
    public function __construct()
    {
        $this->User = new User();
            // middleware login
        $this->middleware('auth');
    }

        //halaman utama table user
    public function index(){
        $data['user'] = $this->User->allData();
        $data['admin'] = $this->User->allDataAdmin();
        return view('admin/page/user/view_user',$data);
    }

        //tambah data
    public function tambah_user(){
        return view('admin/page/user/tambah_user');
    }
    public function insert(Request $request){
        $request->validate([
            'level' => 'required',
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'alamat' => 'required',
            'kode_tarif' => 'required',
            'nometer' => 'required',
        ]);

        $data =[
            'level' => request()->level,
            'name' => request()->name,
            'email' => request()->email,
            'password' => Hash::make(request()->password),
            'alamat' => request()->alamat,
            'kode_tarif' => request()->kode_tarif,
            'nometer' => request()->nometer,
        ];
        $this->User->addData($data);
        return redirect()->to('/admin/view_user')->with('succes','insert succesfully');
    }

        //edit data
    public function edit_user($id){
        $data['user'] = $this->User->getData($id);
        return view('admin/page/user/edit_user',$data);
    }
    public function update(Request $request,$id){
        $data['user'] = $this->User->getData($id);
        $request->validate([
            'level' => 'required',
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'alamat' => 'required',
            'kode_tarif' => 'required',
            'nometer' => 'required',
        ]);

        $data =[
            'level' => request()->level,
            'name' => request()->name,
            'email' => request()->email,
            'password' => Hash::make(request()->password),
            'alamat' => request()->alamat,
            'kode_tarif' => request()->kode_tarif,
            'nometer' => request()->nometer,
        ];
        $this->User->editData($data,$id);
        return redirect()->to('/admin/view_user')->with('success','update succesfully');
    }

        //delete
    public function delete($id){

        $this->User->deleteData($id);
        return redirect()->to('/admin/view_user')->with('delete','delete succesfully');
    }
}
