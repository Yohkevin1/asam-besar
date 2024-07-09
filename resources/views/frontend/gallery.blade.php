@extends('frontend.layout.main')

@section('keywords', 'Gereja St. Blasius, paroki asam besar, asambesar, asam besar, gereja st blasius, gereja st. blasius, gereja blasius, paroki blasius, paroki asam besar, paroki asambesar')
@section('description', 'Official Website Gereja St. Blasius Paroki Asam Besar - Contact Us')

@section('css')
<style>
    .hero-section {
        position: relative;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }

    .hero-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 1;
    }

    .hero-content {
        position: relative;
        z-index: 2;
        color: white;
    }

    .hero-content h4,
    .hero-content h1 {
        margin: 0;
        padding: 0;
    }

    .hero-content h1 {
        font-size: 50px;
        font-weight: bold;
    }

    .gallery-item {
        display: flex;
        justify-content: center;
        align-items: center;
        overflow: hidden;
        height: 300px;
        position: relative;
    }

    .gallery-item img, .gallery-item .embed-responsive {
        width: 100%;
        height: 100%;
        transition: transform 0.5s ease;
    }

    .gallery-item:hover img, .gallery-item:hover .embed-responsive {
        transform: scale(1.1);
    }

    .embed-responsive-16by9::before {
        padding-top: 56.25%;
    }
</style>
@endsection

@section('content')
<div class="hero-section" style="background-image: url({{asset('img/gereja_St_Blasius.jpg')}}); background-size: cover; background-position: center;">
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <h4 data-aos="fade-down" data-aos-duration="1000" data-aos-delay="400">Kumpulan Foto & Video Paroki</h4>
        <h1 class="mb-0" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="200">GALERI PAROKI</h1>
    </div>
</div>

<div class="container py-5">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
        @foreach ($img as $item)    
        <div class="col mb-4">
            <div class="card gallery-item" data-aos="zoom-in-up" data-aos-duration="1000">
                @if (Str::endsWith($item->id, ['.png', '.jpg', '.jpeg', '.giv', '.svg']))
                    <img src="{{ asset('img/gallery/'. $item->id) }}" class="card-img-top" alt="Gallery Image">
                @else
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{ $item->id }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                @endif
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

@section('script')

@endsection

