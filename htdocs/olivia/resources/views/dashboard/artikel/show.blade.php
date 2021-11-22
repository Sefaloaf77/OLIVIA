@extends('dashboard/layouts/layoutMain')

@section('container')
<article>

    <div class="container my-3">
        <div class="row justify-content-center">
            <div class="col-md-8">
                 <a href="/dashboard/artikel" class="btn btn-primary my-3">
                    Back to Post
                </a>
                <h2><strong>{{ $artikel->title }}</strong></h2>
                <img src="/img/artikel1/artikel-{{ $artikel->id }}.jpg" class="img-fluid mb-4" alt="{{ $artikel->slug }}">
                {!! $artikel->body !!}
                {{-- 
                    tag di atas akan menghilangkan efek HTMLSpecialChars
                    dan dapat mengeksekusi tag HTML.

                    namun, gunakan secara hati - hati supaya tidak terjasi XSS
                    (cross site script)
                --}}
                
            <p class="mt-3" style="opacity:75%;">Tanggal dibuat {{ $artikel->created_at->toDateString() }}</p>
            </div>
        </div>
    </div>

    
</article>
@endsection