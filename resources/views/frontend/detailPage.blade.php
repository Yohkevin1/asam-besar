@extends('frontend.layout.main')

@section('keywords', 'Gereja St. Blasius, paroki asam besar, asambesar, asam besar, gereja st blasius, gereja st. blasius, gereja blasius, paroki blasius, paroki asam besar, paroki asambesar, {{ $data->title }}')
@section('description', 'Official Website Gereja St. Blasius Paroki Asam Besar - {{ $data->title }}')

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

    .hero-content h4, .hero-content h1 {
      margin: 0;
      padding: 0;
    }

    .hero-content h1 {
      font-size: 50px;
      font-weight: bold;
    }

    .mb-5 img {
      max-width: 100%;
      height: auto;
      display: block;
      margin: 0 auto;
    }
</style>
@endsection

@section('content')
<div class="hero-section" style="background-image: url('{{ $data->img_header == 'Logo_Paroki.png' ? asset('img/' . $data->img_header) : asset('img/collection/' . $data->img_header) }}'); background-size: cover; background-position: center;">
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <h4 data-aos="fade-down" data-aos-duration="1000" data-aos-delay="400">{{ \Carbon\Carbon::parse($data->date)->translatedFormat('l, j F Y') }}</h4>
        <h1 class="mb-0" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="200">{{ strtoupper($data->title) }}</h1>
    </div>
</div>

<div class="container my-5">
    <div class="mb-5" data-aos="zoom-in-up" data-aos-duration="1000">
        {!! $data->description !!}
    </div>
</div>

@endsection

@section('script')
@endsection
