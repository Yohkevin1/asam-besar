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

    .card {
      padding: 0;
      background-color: white;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      overflow: hidden;
      transition: box-shadow 0.3s ease;
    }

    .card img {
      width: 100%;
      height: auto;
    }

    .card button {
      display: block;
      width: 100%;
      border: none;
      background: none;
      color: inherit;
      text-align: left;
      padding: 0;
      cursor: pointer;
    }

    .card:hover {
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
    }

    .date {
      background-color: orange;
      color: white;
      text-align: center;
      padding: 10px;
      transition: background-color 0.3s ease-in-out;
      width: 100%
    }

    .date-content {
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .date-day {
      font-size: 2em;
      font-weight: bold;
    }

    .date-month {
      margin-left: 5px;
      font-size: 1.3em;
      font-weight: bold;
    }

    .header {
      background-color: #333;
      color: white;
      text-align: center;
      padding: 10px;
      font-size: 1.2em;
      width: 100%
    }

    .content {
      text-align: left;
      padding: 15px;
      width: 100%
    }

    .content p {
      color: #666;
      font-size: 0.9em;
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

@if (isset($pernikahan))
  <div class="container my-5">
    <h1 class="text-center mb-5" data-aos="zoom-in-up" data-aos-duration="1000"><strong>PENGUMUMAN</strong> PERNIKAHAN</h1>
    @if($pernikahan->isEmpty())
        <div class="alert alert-info text-center" role="alert" data-aos="zoom-in-up" data-aos-duration="1000">
          <i class="fas fa-info-circle fa-2x mb-3"></i>
          <h4 class="alert-heading">PENGUMUMAN PERNIKAHAN TIDAK TERSEDIA</h4>
          <p>Saat ini tidak ada pengumuman pernikahan yang tersedia. Silakan periksa kembali nanti.</p>
      </div>
    @else
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($pernikahan as $nikah)
            <div class="col mb-4" data-aos="zoom-in-up" data-aos-duration="2000">
              <button type="button" class="card" data-toggle="modal" data-target="#modalDetail{{ $nikah->id }}">
                <img src="{{ asset('img/pernikahan/'.$nikah->foto) }}" alt="Image">
                <div class="date">
                    <div class="date-content">
                        <div class="date-day">{{ date('d', strtotime($nikah->date)) }}</div>
                        <div class="date-month">{{date('M', strtotime($nikah->date)) }}</div>
                    </div>
                </div>
                <div class="header">{{ strtoupper($nikah->title) }}</div>
                <div class="content">
                    <p>{{ substr(strip_tags($nikah->description), 0, 100) }}...</p>
                </div>
              </button>
            </div>
            @endforeach
        </div>
    @endif
  </div>
@endif

@if (isset($pernikahan) && !$pernikahan->isEmpty())
  <div class="modal fade" id="modalDetail{{ $nikah->id }}" tabindex="-1" role="dialog" aria-labelledby="modalDetailLabel{{ $nikah->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalDetailLabel{{ $nikah->id }}">{{ strtoupper($nikah->title) }}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <img src="{{ asset('img/pernikahan/'.$nikah->foto) }}" class="img-fluid mb-3" alt="Image">
          {!! $nikah->description !!}
        </div>
      </div>
    </div>
  </div>
@endif

<div class="container my-5">
    <div class="mb-5" data-aos="zoom-in-up" data-aos-duration="1000">
        {!! $data->description !!}
    </div>
</div>

@endsection

@section('script')
@endsection
