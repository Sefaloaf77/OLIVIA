@extends('layouts/layoutMain')

@section('container')
    
<!-- konten isi -->
    <section class="konten">
      <div class="container">
          <div class="row">
              <div class="col">
                <div class="header justify-content-center">
                    <div class="kategori justify-content-center">
                        <p class="text-center kategori">{{ $artikel->category->name }}</p>
                    </div>
                    <h3 class="display-4  text-center" style="font-weight: 400;">{{ $artikel->title }}</h3>
                    <div class="gambar">
                        <img src="/img/artikel1/artikel-{{ $artikel->id }}.jpg" class="img-fluid" alt="gambar-artikel">
                    </div>
                </div>
                <div class="isi">
                    <p>Dibuat tanggal : </p>
                    <p class="tanggal">{{ $artikel->created_at->toDateString() }}</p>
                    <p style="text-align: justify; line-height: 30px;">
                        {!! $artikel->body !!}
                    </p>
                      <p>Terima Kasih sudah Membaca</p>
                      <p>Yuk, bagikan artikel dengan klik tombol di bawah ini</p>
                      <div class="bagikan d-flex">
                        <p>Bagikan: </p>
                <!-- Go to www.addthis.com/dashboard to customize your tools -->
                <div class="addthis_inline_share_toolbox"></div>
            
                </div>
              </div>
          </div>
      </div>
      <!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-6178192a458c5ae7"></script>

    </section>
      <!-- akhir konten isi -->

      <!-- artikel lain -->
      @if ($artikelLain->count() > 0)
        <!-- artikel lain -->
        <section class="artikel-lain">
          <div class="container">
            <div class="row d-flex justify-content-evenly">
                @foreach ($artikelLain as $art)
                <button class="col-lg-3 col-md-3 col-sm-12 col-11 mt-sm-4 mt-4 bg-white shadow ms-lg-2 ms-md-1 ms-sm-1 card">
                    <a href="/artikel/{{ $art->slug }}" class="content-card">
                        <img src="/img/artikel1/artikel-{{ $art->id }}.jpg" class="img-fluid" alt="">
                        <div class="d-flex justify-content-between align-items-center">
                        <p class="tanggal">{{ $art->created_at->diffForHumans() }}</p>
                        <span href="/artikel?kategori={{ $art->category->slug }}" style="border-radius: 4px; background-color: #B7F4F1; padding: 0 10px;height: max-content; width: max-content;">{{ $art->category->name }}</span>
                        </div>
                        <h3>{{ $art->title }}</h3>
                    </a>
                </button>
                @endforeach
            </div>
          </div>
        </section>
        <!-- akhir artikel lain -->
      @endif
    
@endsection