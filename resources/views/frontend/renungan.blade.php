@extends('frontend.layout.main')

@section('keywords', 'Gereja St. Blasius, paroki asam besar, asambesar, asam besar, gereja st blasius, gereja st. blasius, gereja blasius, paroki blasius, paroki asam besar, paroki asambesar')
@section('description', 'Official Website Gereja St. Blasius Paroki Asam Besar - Renungan')

@section('css')
<style>
    .hero-section {
      position: relative;
      background-image: url('img/renungan.jpeg');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      text-align: center;
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

    .card {
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

    .card a {
      display: block;
      color: inherit;
      text-decoration: none;
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
    }

    .content {
      padding: 15px;
    }

    .content h3 {
      margin: 0 0 10px 0;
      color: #333;
    }

    .content p {
      color: #666;
      font-size: 0.9em;
    }
</style>
@endsection

@section('content')
<div class="hero-section">
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <h4 data-aos="fade-down" data-aos-duration="1000" data-aos-delay="400">Iman Katolik</h4>
        <h1 class="mb-0" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="200">RENUNGAN HARIAN</h1>
    </div>
</div>
<div class="event-section">
    <div class="container-xl">
        @if($renungan->isEmpty())
            <div class="alert alert-info text-center" role="alert" data-aos="zoom-in-up" data-aos-duration="1000">
              <i class="fas fa-info-circle fa-2x mb-3"></i>
              <h4 class="alert-heading">RENUNGAN TIDAK TERSEDIA</h4>
              <p>Saat ini tidak ada renungan yang tersedia. Silakan periksa kembali nanti.</p>
          </div>
        @else
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @foreach ($renungan as $ren)
                <div class="col mb-4" data-aos="zoom-in-up" data-aos-duration="2000">
                    <a href="{{ route('detailRenungan', encrypt($ren->id)) }}" class="card" style="text-decoration: none">
                        @if ($ren->img_header == 'Logo_Paroki.png')
                        <img src="{{ asset('img/'.$ren->img_header) }}" alt="Image">
                        @else
                        <img src="{{ asset('img/collection/'.$ren->img_header) }}" alt="Image">
                        @endif
                        <div class="date">
                            <div class="date-content">
                                <div class="date-day">{{ date('d', strtotime($ren->date)) }}</div>
                                <div class="date-month">{{date('M', strtotime($ren->date)) }}</div>
                            </div>
                        </div>
                        <div class="header">Renungan Harian</div>
                        <div class="content">
                            <h3>{{ $ren->title }}</h3>
                            <p>{{ substr(strip_tags($ren->description), 0, 100) }}...</p>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
@endsection

@section('script')
@endsection
