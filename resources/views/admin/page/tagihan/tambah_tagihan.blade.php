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
                        <h1 class="h4 text-gray-900 mb-4">Tambah Data Tagihan</h1>
                    </div>
                    <form class="user" action="/petugas/insert_tagihan" method="post" enctype="multipart/form-data">
                        @csrf

                        <small>user</small>
                        <div class="form-group">
                            <select name="id" id="" class="custom-select">
                                @foreach ( $user as $row )
                                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                                @endforeach
                            </select>  
                        </div>
                        
                        <small>bulan</small>
                        <div class="form-group">
                            <select name="bulan" id="" class="custom-select">
                                @php
                                    $m = date('m');
                                @endphp
                                    <option value="1" {{ $m == 1 ? 'selected' : '' }}>January</option>
                                    <option value="2" {{ $m == 2 ? 'selected' : '' }}>February</option>
                                    <option value="3" {{ $m == 3 ? 'selected' : '' }}>March</option>
                                    <option value="4" {{ $m == 4 ? 'selected' : '' }}>April</option>
                                    <option value="5" {{ $m == 5 ? 'selected' : '' }}>May</option>
                                    <option value="6" {{ $m == 6 ? 'selected' : '' }}>June</option>
                                    <option value="7" {{ $m == 7 ? 'selected' : '' }}>July</option>
                                    <option value="8" {{ $m == 8 ? 'selected' : '' }}>August</option>
                                    <option value="9" {{ $m == 9 ? 'selected' : '' }}>September</option>
                                    <option value="10" {{ $m == 10 ? 'selected' : '' }}>October</option>
                                    <option value="11" {{ $m == 11 ? 'selected' : '' }}>November</option>
                                    <option value="12" {{ $m == 12 ? 'selected' : '' }}>December</option>
                            </select>  
                        </div>
                        
                        <small>tahun</small>
                        <div class="form-group">
                            <select name="tahun" id="" class="custom-select">
                                @php
                                    $y = '20'.date('y');
                                @endphp
                                    <option value="2015" {{ $y == 2015 ? 'selected' : '' }}>2015</option>
                                    <option value="2016" {{ $y == 2016 ? 'selected' : '' }}>2016</option>
                                    <option value="2017" {{ $y == 2017 ? 'selected' : '' }}>2017</option>
                                    <option value="2018" {{ $y == 2018 ? 'selected' : '' }}>2018</option>
                                    <option value="2019" {{ $y == 2019 ? 'selected' : '' }}>2019</option>
                                    <option value="2020" {{ $y == 2020 ? 'selected' : '' }}>2020</option>
                                    <option value="2021" {{ $y == 2021 ? 'selected' : '' }}>2021</option>
                                    <option value="2022" {{ $y == 2022 ? 'selected' : '' }}>2022</option>
                                    <option value="2023" {{ $y == 2023 ? 'selected' : '' }}>2023</option>
                                    <option value="2024" {{ $y == 2024 ? 'selected' : '' }}>2024</option>
                                    <option value="2025" {{ $y == 2025 ? 'selected' : '' }}>2025</option>
                                    <option value="2026" {{ $y == 2026 ? 'selected' : '' }}>2026</option>
                                    <option value="2027" {{ $y == 2027 ? 'selected' : '' }}>2027</option>
                                    <option value="2028" {{ $y == 2028 ? 'selected' : '' }}>2028</option>
                                    <option value="2029" {{ $y == 2029 ? 'selected' : '' }}>2029</option>
                                    <option value="2030" {{ $y == 2030 ? 'selected' : '' }}>2030</option>
                                    <option value="2031" {{ $y == 2031 ? 'selected' : '' }}>2031</option>
                                    <option value="2032" {{ $y == 2032 ? 'selected' : '' }}>2032</option>
                                    <option value="2033" {{ $y == 2033 ? 'selected' : '' }}>2033</option>
                                    <option value="2034" {{ $y == 2034 ? 'selected' : '' }}>2034</option>
                                    <option value="2035" {{ $y == 2035 ? 'selected' : '' }}>2035</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <input type="number" class="form-control form-control-user" name="meter_awal" id="exampleInputEmail"
                                placeholder="meter awal" required>
                        </div>

                        <div class="form-group">
                            <input type="number" class="form-control form-control-user" name="meter_akhir" id="exampleInputEmail"
                                placeholder="meter akhir" required>
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