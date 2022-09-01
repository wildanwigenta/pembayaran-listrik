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
                        <h1 class="h4 text-gray-900 mb-4">Edit Data User</h1>
                    </div>
                    <form class="user" action="/admin/update_user/{{ $user->id }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" name="id" id="exampleInputEmail"
                                placeholder="" value="{{ $user->id }}" hidden>
                        </div>

                        <div class="form-group mb-2">
                            <select name="level" id="" class="form-control">
                                <option value="pelanggan" @if( $user->level  == "pelanggan") selected @endif>pelanggan</option>
                                <option value="admin" @if( $user->level  == "admin") selected @endif>admin</option>
                                <option value="petugas" @if( $user->level  == "petugas") selected @endif>petugas</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" name="name" id="exampleInputEmail"
                                placeholder="name" value="{{ $user->name }}" required>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" name="email" id="exampleInputEmail"
                                placeholder="email" value="{{ $user->email }}" required>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" name="password" id="exampleInputEmail"
                                placeholder="password" required>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control form-control-user" name="alamat" id="exampleInputEmail"
                                placeholder="alamat" value="{{ $user->alamat }}" required>
                        </div>

                        <div class="form-group">
                            <input type="number" class="form-control form-control-user" name="kode_tarif" id="exampleInputEmail"
                                placeholder="kode tarif" value="{{ $user->kode_tarif }}" required>
                        </div>

                        <div class="form-group">
                            <input type="number" class="form-control form-control-user" name="nometer" id="exampleInputEmail"
                                placeholder="nometer" value="{{ $user->nometer }}" required>
                        </div>

                        {{-- <div class="form-group">
                            <label for="filefoto">Gambar</label><br>
                            <input type="file"  name="gambar" id="exampleInputEmail"
                                placeholder="Image" id="filefoto" required>
                        </div> --}}

                        <button type="submit" class="btn btn-primary">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection