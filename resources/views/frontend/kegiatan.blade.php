@extends('frontend.layout.main')

@section('keywords', 'Gereja St. Blasius, paroki asam besar, asambesar, asam besar, gereja st blasius, gereja st. blasius, gereja blasius, paroki blasius, paroki asam besar, paroki asambesar')
@section('description', 'Official Website Gereja St. Blasius Paroki Asam Besar - Renungan')

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
      background-color: rgba(0, 0, 0, 0.5); /* Adjust the opacity as needed */
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

    .event-section {
      background-color: #f0f0f0;
      padding: 40px 0;
    }

    .card-horizontal {
      display: flex;
      flex-direction: row;
      margin-bottom: 20px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
      transition: box-shadow 0.3s ease;
    }

    .card-horizontal:hover {
      box-shadow: 0 8px 16px rgba(0,0,0,0.2);
    }

    .card-horizontal .img-square-wrapper {
      flex: 1;
      overflow: hidden;
    }

    .card-horizontal .img-square-wrapper img {
      width: 100%;
      height: auto;
      object-fit: cover;
    }

    .card-horizontal .card-body {
      flex: 1;
      padding: 20px;
    }

    .card-horizontal .card-body .card-icon {
      font-size: 15px;
      margin-right: 10px;
    }

    .btn-custom {
        background-color: rgb(0, 0, 0);
        color: white;
        transition: background-color 0.3s, color 0.3s;
    }

    .btn-custom:hover {
        background-color: rgb(41, 40, 40); /* Warna latar hover */
        color: #fff; /* Warna teks hover */
    }

    @media (max-width: 768px) {
      .card-horizontal {
        flex-direction: column;
        align-items: stretch;
      }

      .card-horizontal .img-square-wrapper {
        height: 200px;
      }
    }
</style>
@endsection

@section('content')
<div class="hero-section" style="background-image: url('img/kegiatan.jpeg'); background-size: cover; background-position: center;">
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <h4 data-aos="fade-down" data-aos-duration="1000" data-aos-delay="400">Aktivitas Paroki</h4>
        <h1 class="mb-0" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="200">LIST KEGIATAN</h1>
    </div>
</div>

<div class="event-section">
    <div class="container-xl">
        @if ($kegiatan->isEmpty())
        <div class="alert alert-info text-center" role="alert" data-aos="zoom-in-up" data-aos-duration="1000">
            <i class="fas fa-info-circle fa-2x mb-3"></i>
            <h4 class="alert-heading">KEGIATAN TIDAK TERSEDIA</h4>
            <p>Saat ini tidak ada kegiatan yang tersedia. Silakan periksa kembali nanti untuk informasi terbaru.</p>
        </div>
        @else
        @foreach ($kegiatan->chunk(2) as $chunk)
        <div class="row g-4">
            @foreach ($chunk as $keg)
            <div class="col-md-6 col" data-aos="zoom-in-up" data-aos-duration="1000">
                <div class="card card-horizontal">
                    <div class="img-square-wrapper">
                        @if ($keg->img_header == 'Logo_Paroki.png')
                            <img src="{{ asset('img/' . $keg->img_header) }}" class="img-fluid" alt="Image" style="width: 100%; height: auto;">
                        @else
                            <img src="{{ asset('img/collection/' . $keg->img_header) }}" class="img-fluid" alt="Image">
                        @endif
                    </div>
                    <div class="card-body align-self-center">
                        <h1 class="card-title h3" style="font-weight: bold;">{{ strtoupper($keg->title) }}</h1>
                        <div class="d-flex align-items-center">
                            <span class="card-icon mr-2"><i class="fas fa-map-marker-alt"></i></span>
                            <p class="card-text">{{ $keg->location }}</p>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <span class="card-icon mr-2"><i class="fas fa-calendar-alt"></i></span>
                            <p class="card-text">{{ \Carbon\Carbon::parse($keg->date)->translatedFormat('l, j F Y') }}</p>
                        </div>
                        @if (!empty($keg->description) && $keg->description != '<p><br></p>')
                        <a href="{{ route('detailKegiatan', encrypt($keg->id)) }}" class="btn btn-custom col-12">Lihat Detail</a>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endforeach
        @endif
    </div>
</div>
@endsection

@section('script')
@endsection
