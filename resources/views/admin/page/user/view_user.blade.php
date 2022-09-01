@extends('admin/include/app_admin')
@section('title','dashboard')

@section('content')
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Admin</h1>


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">
                                <a href="/admin/tambah_user" class="btn btn-primary">tambah</a>
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>

                                        <tr>
                                            <th>Level</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Alamat</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                            @foreach ($admin as $row)                                    

                                        <tr>
                                            <td>{{ $row->level }}</td>
                                            <td>{{ $row->name }}</td>
                                            <td>{{ $row->email }}</td>
                                            <td>{{ $row->alamat }}</td>
                                            <td>
                                                <a href="/admin/edit_user/{{ $row->id }}" class= "btn btn-warning">Edit</a>
                                                <a href="/admin/delete_user/{{ $row->id }}" class="btn btn-danger" onclick="return confirm('Apakah anda yakin')">Delete</a>
                                            </td>
                                        </tr>           
                                            @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">User</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                                    <thead>

                                        <tr>
                                            <th>Level</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Alamat</th>
                                            <th>Kode Tarif</th>
                                            <th>Nomor Meter</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                            @foreach ($user as $row)                                    

                                        <tr>
                                            <td>{{ $row->level }}</td>
                                            <td>{{ $row->name }}</td>
                                            <td>{{ $row->email }}</td>
                                            <td>{{ $row->alamat }}</td>
                                            <td>{{ $row->kode_tarif }}</td>
                                            <td>{{ $row->nometer }}</td>
                                            <td>
                                                <a href="/admin/edit_user/{{ $row->id }}" class= "btn btn-warning">Edit</a>
                                                <a href="/admin/delete_user/{{ $row->id }}" class="btn btn-danger" onclick="return confirm('Apakah anda yakin')">Delete</a>
                                            </td>
                                        </tr>           
                                            @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
@endsection