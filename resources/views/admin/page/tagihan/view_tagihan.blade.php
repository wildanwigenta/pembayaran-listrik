@extends('admin/include/app_admin')
@section('title','dashboard')

@section('content')
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tagihan</h1>


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            @if (Auth::user()->level=='petugas')
                                <h6 class="m-0 font-weight-bold text-primary">
                                    <a href="/petugas/tambah_tagihan" class="btn btn-primary">tambah</a>
                                </h6>
                            @endif
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        
                                        <tr>
                                            <th>id tagihan</th>
                                            <th>Nama Pengguna</th>
                                            <th>Bulan</th>
                                            <th>Tahun</th>
                                            <th>Jumlah Meter</th>
                                            <th>Total Biaya</th>
                                            @if (Auth::user()->level=='admin')                                              
                                                <th>Status</th>
                                            @endif
                                            @if (Auth::user()->level=='admin')
                                                <th>Action</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                            @foreach ($tagihan as $row)                                    

                                        <tr>
                                            <td>{{ $row->id_tagihan }}</td>
                                            <td>{{ $row->name }}</td>
                                            <td>{{ $row->bulan }}</td>
                                            <td>{{ $row->tahun }}</td>
                                            <td>{{ $row->jumlah_meter }} KWH</td>
                                            <td style="color:blue">Rp.{{ number_format($row->jumlah_meter * ($row->kode_tarif == 1 ? 1352 : 1467))}}</td>
                                            @if (Auth::user()->level=='admin')
                                                <td><a href="/admin/confirm_status/{{ $row->id_tagihan }}" class="btn btn-{{ $row->status == 'belum_bayar' ? 'success' : 'secondary disabled'}} " onclick="return confirm('Apakah sudah bayar?')" >{{ $row->status }}</a></td>
                                            @endif
                                            @if (Auth::user()->level=='admin')
                                                <td>
                                                    @if ($row->status == 'belum_bayar')
                                                        <a href="/admin/edit_tagihan/{{ $row->id_tagihan }}" class= "btn btn-warning">Edit</a>
                                                        <a href="/admin/delete_tagihan/{{ $row->id_tagihan }}" class="btn btn-danger" onclick="return confirm('Apakah anda yakin')">Delete</a>
                                                    @else
                                                        -- Lunas --
                                                    @endif
                                                </td>
                                            @endif
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