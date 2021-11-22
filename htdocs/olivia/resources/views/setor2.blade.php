@extends('layouts/layoutMain')

@section('container')
    
    <!-- header -->
        <section class="header">
        <div class="container">
            <div class="row meet1 justify-content-center">
            <div class="col-lg-3 col-md-4 col-sm-12 text-lg-start text-center">
                <img src="/img/setor/ava3.png" class="img-fluid" alt="avatar">
            </div>
            <div class="col-lg-5 col-md-4 col-sm-12 text-center">
            <h3 class="mt-3">#GerakanSampahJugaBerharga</h3>
            <p>Walau terpisah jarak, bisa setor kapan aja. Ayo setorkan sampahmu sekarang!</p>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-12 ava2 text-lg-end text-center">
                <img src="/img/setor/ava2.png" class="img-fluid" alt="avatar">
            </div>
            </div>
        </div>
        </section>
        <!-- akhir header -->
    
        <!--notif-->
            @if (session()->has('kosong'))
            <div class="container mt-3">
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <p>{{ session('kosong') }}</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>   
            </div>  
            @endif
        <!--akhir notif-->

        <!-- kategori -->
        <section class="form">
            <form action="/layanan/setor-barang" method="POST">
            @csrf
            <section class="kategori">
                <div class="container">
                <h3 class="mb-4 text-center" style="color: #00b3bc;">Jenis Sampah</h3>
                    <div class="row justify-content-around text-center">
                        @foreach ($jenis_sampah as $jenis)
                            <div class="{{ $jenis->slug }} col">
                            <input type="radio" name="jenis_sampah_id" id="{{ $loop->iteration }}" class="hidebox" value="{{ $loop->iteration }}" />
                            <label for="{{ $loop->iteration }}" class="isi-radio">
                                <div class="display-box text-center">
                                <img src="/img/kolega/{{ $jenis->gambar }}" style="height: 60%; margin-bottom: 6px" class="img-fluid" alt="kardus" />
                                <p style="font-size: 12px">{{ $jenis->jenis_sampah }}</p>
                                </div>
                            </label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
            <!-- akhir kategori -->

        <!-- form -->
        
            <div class="container">
                <div class="row g-5">
                <div id="inputan"></div>
                <div class="col-md-6">
                    <div class="mb-3">
                    <h3 class="mb-4" style="color: #00b3bc;">Berat</h3>
                    <input type="berat" class="form-control form-control-lg" id="exampleFormControlInput1" name="berat" required/>
                    <div id="emailHelp" class="form-text">maksimal berat <= 5</div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                    <h3 class="mb-4" style="color: #00b3bc;">Alamat Tujuan</h3>
                    <select class="form-select" name="alamat">
                    @foreach ($kolega as $kol)
                        <option selected value="{{ $kol->alamat }}">{{ $kol->alamat }} - {{ $kol->jenis_sampah->jenis_sampah }}</option>
                    @endforeach
                    </select>
                    <div id="emailHelp" class="form-text">Silahkan isi alamat sesuai jenis sampah anda</div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                    <h3 class="mb-4" style="color: #00b3bc;">Alamat Kamu</h3>
                    <textarea required class="form-control" id="exampleFormControlTextarea1" rows="3" name="alamat_pengiriman"></textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                    <h3 class="mb-4" style="color: #00b3bc;">Deskripsi Alamat (Opsional)</h3>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="deskripsi_alamat"></textarea>
                    </div>
                </div>
                </div>
                <div class="col-12 text-end">
                     <button type="Submit" class="btn text-white" style="margin-top: 15px;">Submit</button>
                </div>
                </div>
        </form>
        </section>
        <!-- akhir form -->
@endsection
