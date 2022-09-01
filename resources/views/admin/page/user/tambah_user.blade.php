@extends('admin/include/app_admin')
@section('title','dashboard')

@section('content')
<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-md-7">
                <div class="p-5">
                    <div class="text">
                        <h1 class="h4 text-gray-900 mb-4">Tambah Data User</h1>
                    </div>
                    <form class="user" action="/admin/insert_user" method="post" enctype="multipart/form-data">
                        @csrf
                        <small>user</small>
                        <div class="form-group mb-2">
                            <select name="level" id="" class="form-control">
                                <option value="pelanggan">pelanggan</option>
                                <option value="admin">admin</option>
                                <option value="petugas">petugas</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" name="name" id="exampleInputEmail"
                                placeholder="name" required>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" name="email" id="exampleInputEmail"
                                placeholder="email" required>
                        </div>
                        
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" name="password" minlength="8" id="exampleInputEmail"
                                placeholder="password" required>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" name="alamat" id="exampleInputEmail"
                                placeholder="alamat" required>
                        </div>

                        <small>daya</small>
                        <div class="form-group">
                            <select name="kode_tarif" id="" class="form-control">
                                <option value="1">< 900 VA</option>
                                <option value="2">1.300 VA - 4.400 VA</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <input type="number" class="form-control form-control-user" name="nometer" id="exampleInputEmail"
                                placeholder="nometer" required>
                        </div>

                        {{-- <div class="form-group">
                            <label for="filefoto">Gambar</label><br>
                            <input type="file"  name="gambar" id="exampleInputEmail"
                                placeholder="Image" id="filefoto" required>
                        </div> --}}

                        <button type="submit" class="btn btn-primary">Tambahkan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection