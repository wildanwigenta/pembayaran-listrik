@extends('admin/include/app_admin')
@section('title','dashboard')

@section('content')
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Pembayaran</h1>


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">
                                {{-- <a href="/admin/tambah_pembayaran" class="btn btn-primary">tambah</a> --}}
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>

                                        <tr>
                                            <th>id pembayaran</th>
                                            <th>Nama</th>
                                            <th>Tanggal</th>
                                            <th>Jumlah Bayar</th>
                                            <th>Biaya Admin</th>
                                            <th>Total Biaya</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                            @foreach ($pembayaran as $row)                                    

                                        <tr>
                                            <td>{{ $row->id_pembayaran }}</td>
                                            <td>{{ $row->name }}</td>
                                            <td>{{ $row->tanggal }}</td>
                                            <td>Rp.{{ number_format($row->jumlah_bayar) }}</td>
                                            <td>Rp.{{ number_format($row->biaya_admin) }}</td>
                                            <td><b style="color:rgb(38, 0, 255);"> Rp.{{ number_format($row->biaya_admin + $row->jumlah_bayar) }}</b></td>
                                            <td>
                                                @php
                                                    $t = time() - $row->time_stop;
                                                @endphp
                                                @if ($t >= 86400)
                                                    cannot undo!
                                                @else
                                                <a href="undo/{{ $row->id_pembayaran }}/{{ $row->id_tagihan }}" class="btn btn-warning" onclick="return confirm('Apakah belum bayar?')" >undo</a>
                                                    
                                                @endif
                                                {{-- <a href="/admin/delete_pembayaran/{{ $row->id_pembayaran }}" class="btn btn-danger" onclick="return confirm('Apakah anda yakin')">Delete</a> --}}

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