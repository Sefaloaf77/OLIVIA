@extends('layouts/layoutMain')

@section('container')
    

      <!-- highlight -->
        @if ($artikel->count() > 0)
        <!-- header -->
            <div class="header">
                <div class="container">
                <div class="row align-items-start justify-content-between mt-5">
                    <div class="col-lg-6 col-md-6 col-12 mt-5">
                        <h2 class="display-4 mt-5">Hi <span style="color: #00b3bc;">SAGA Troops</span><br>Baca Artikel Yuk!</h2>
                        <p>Baca artikel dari SAGA, temukan cerita dan informasi terkait fun fact, tips, inovasi, aksi dari sampah dan lingkungan.</p>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12 mt-5 text-center">
                        <img src="/img/artikel1/reading.png" class="img-fluid" data-aos="fade-left" alt="reading">
                    </div>
                </div>
                </div>
            </div>
            <!-- akhir header -->

      <!-- quotes -->
          <div class="quotes">
              <h2 class="display-6 text-center">#LiterasiBersama<span style="color: #00b3bc;">SAGA</span></h2>
          </div>
      <!-- akhir quotes -->
        <div class="highlight shadow mx-auto"  data-aos="zoom-in-down">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-12 col-sm-12 text-center me-0">
                        <img src="/img/artikel1/artikel-{{ $artikel[0]->id }}.jpg" class="img-fluid"  alt="beritaPict">
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12">
                    <p class="tanggal">{{ $artikel[0]->created_at->toDateString() }}</p>
                    <h2>{{ $artikel[0]->title }}</h2>
                    <p>{!! Str::limit(strip_tags($artikel[0]->body), 200) !!}</p>
                    <a href="/artikel/{{ $artikel[0]->slug }}" style="text-decoration: none;color: #00b3bc;">Baca Selengkapnya...</a>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <!-- akhir highlight -->

      <!-- kenalin -->
        <div class="container">
            @if($artikel->count() > 0)
            <div class="kenalin text-center">
            <h1 class="mt-3">Ini loh! SAGA.</h1>
            @else
            <div class="text-center mt-5">
            <br>
            <h1 class="mt-5">Waduh...</h1>
            @endif
            <form action="/artikel">
                <div class="input-group">
                    @if (request('category'))
                        <input type="hidden" name="category" value="{{ request('category') }}">
                    @endif
                    @if (request('user'))
                        <input type="hidden" name="user" value="{{ request('user') }}">
                    @endif
                    <input
                    type="text"
                    class="form-control search-input float-left shadow-sm"
                    style="border-radius: 30px 0px 0px 30px; height: 43px; border-right: none;font-family: 'Nunito', sans-serif;"
                    placeholder="  Cari tahu disini..."
                    aria-label="Cari tahu disini"
                    aria-describedby="basic-addon1" name="search" value="{{ request('search') }}"
                    />
                    <button class="input-group-text shadow-sm" style="border-radius: 0px 30px 30px 0px; background-color: white; border-left: none; color: rgb(163, 162, 162)" id="basic-addon1"><i class="fas fa-search"></i></button>
                </div>
            </form>
            </div>
        </div>
        <!-- akhir kenalin -->

      <!-- kategori -->
      <div class="container kategori">
        <div class="row justify-content-center d-flex flex-wrap">
        @foreach ($listCategory as $kategori)
        <div class="col text-center">
            <a href="/artikel?category={{ $kategori->slug }}">
                <button class="btn btn2 mb-3" type="button" style="width: 80%;">{{ $kategori->name }}</button>
            </a>
        </div>
        @endforeach
        </div>
      </div>
      <!-- akhir kategori -->

    @if ($artikel->count() > 0)
       <!-- artikel lain -->
    <section class="artikel-lain">
      <div class="container">
        <div class="row d-flex justify-content-evenly">
            @foreach ($artikel->skip(1) as $art)
            <button class="col-lg-3 col-md-3 col-sm-12 col-11 mt-sm-4 mt-4 bg-white shadow ms-lg-2 ms-md-1 ms-sm-1 card">
                <a href="/artikel/{{ $art->slug }}" class="contentcard">
                    <img src="/img/artikel1/artikel-{{ $art->id }}.jpg" class="img-fluid" alt="">
                    <div class="d-flex justify-content-between align-items-center">
                    <p class="tanggal">{{ $art->created_at->toDateString() }}</p>
                    <span href="/artikel?kategori={{ $art->category->slug }}" style="border-radius: 4px; background-color: #B7F4F1; padding: 0 10px;height: max-content; width: max-content;">{{ $art->category->name }}</span>
                    </div>
                    <h3>{{ $art->title }}</h3>
                </a>
            </button>
            @endforeach
        </div>
      </div>
  </section>
  @else 
    <div class="container ops text-center">
            <img src="/img/oops/ops.png" class="img-fluid" alt="Oops">
            <h2 class="mt-5">OOPS!</h2>
            <h5>Artikel Yang Kamu Cari Nggak Ada Nih</h5>
    </div>
@endif

    <div class="d-flex justify-content-center">
    {{ $artikel->links() }}
    </div>
@endsection