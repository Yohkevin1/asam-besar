@extends('frontend.layout.main')
@section('keywords', 'Gereja St. Blasius, paroki asam besar, asambesar, asam besar, gereja st blasius, gereja st. blasius, gereja blasius, paroki blasius, paroki asam besar, paroki asambesar')
@section('description', 'Official Website Gereja St. Blasius Paroki Asam Besar')
@section('css')
<style>
    .announcement-card {
        border: 1px solid #dee2e6;
        border-radius: 8px;
        transition: all 0.3s ease;
        text-align: center;
        overflow: hidden;
    }

    .announcement-card img {
        width: 100%; 
        max-height: 400px;
        object-fit: cover;
        border-radius: 8px 8px 0 0;
    }

    .announcement-card:hover {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transform: translateY(-5px);
    }

    .modal-content {
        margin-top: 10%;
    }

    .kegiatan-item {
        margin-bottom: 20px;
    }

    .detail-btn {
        background-color: black;
        color: white;
        font-weight: bold;
    }
    
    .overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.2);
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
</style>
@endsection

@section('content')
<div class="container-fluid d-flex align-items-center justify-content-center text-center py-5" style="background-image: url('{{asset('img/gereja_St_Blasius.jpg')}}'); background-attachment: fixed; background-size: cover; background-position: center; height: 100vh; position: relative;">
    <div class="overlay"></div>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <img src="{{ asset('img/Logo_Paroki_Transparan.png') }}" alt="Logo" class="img-fluid" style="max-width: 100%; height: auto; width: 400px;" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="400">
            <h1 class="text-white mt-2 h2" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="200">PAROKI ASAM BESAR</h1>
        </div>
    </div>
</div>

<div class="container-fluid bg-dark text-light py-5">
    <div class="container" data-aos="zoom-in-up" data-aos-duration="1000">
        <h1 class="text-center mb-4">Jadwal Misa</h1>
        <div class="row justify-content-center">
            <div class="col-md-4 mb-4 text-center">
                <h4><img src="{{ asset('img/church.png') }}" alt="Jam" style="width: 70px; height: auto; margin-right: 20px;"> Jumat Pertama</h4>
                <ul class="list-unstyled">
                    <li>Hari Jumat Pertama Setiap Bulan: <strong>17:00 WIB</strong></li>
                </ul>
            </div>
            <div class="col-md-4 mb-4 text-center">
                <h4><img src="{{ asset('img/church.png') }}" alt="Jam" style="width: 70px; height: auto; margin-right: 20px;"> Misa Mingguan</h4>
                <ul class="list-unstyled">
                    <li>Hari Minggu Setiap Pekan: <strong>09:30 WIB</strong></li>
                </ul>
            </div>
            <div class="col-md-4 mb-4 text-center">
                <h4><img src="{{ asset('img/church.png') }}" alt="Jam" style="width: 70px; height: auto; margin-right: 20px;"> Misa Harian</h4>
                <ul class="list-unstyled">
                    <li>Senin - Sabtu: <strong>05:30 WIB</strong></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="container my-5">
    <h2 class="text-center mb-5 h1" data-aos="zoom-in-up" data-aos-duration="1000"><strong>PENGUMUMAN</strong> GEREJA</h2>
    @if($pengumuman->isEmpty())
        <div class="alert alert-info text-center" role="alert" data-aos="zoom-in-up" data-aos-duration="1000">
            <i class="fas fa-info-circle fa-2x mb-3"></i>
            <h4 class="alert-heading">PENGUMUMAN TIDAK TERSEDIA</h4>
            <p>Saat ini tidak ada pengumuman yang tersedia. Silakan periksa kembali nanti untuk informasi terbaru.</p>
        </div>
    @else
        <div class="row announcement-carousel">
            @foreach ($pengumuman as $pgm)
                <div class="col-lg-4 col-md-6 mb-4" data-aos="zoom-in-up" data-aos-duration="1000">
                    <div class="announcement-card text-left">
                        <img src="{{ $pgm->img_header == 'Logo_Paroki.png' ? asset('img/' . $pgm->img_header) : asset('img/collection/' . $pgm->img_header) }}" alt="Announcement Image" class="img-fluid">
                        <div class="p-3">
                            <h1 class="h4 mb-3" style="font-weight: bold">{{ $pgm->title }}</h1>
                            @if ($pgm->description != '<p><br></p>')
                                <p>{{ substr(strip_tags($pgm->description), 0, 100) }}...</p>
                            @endif
                            <button class="btn btn-custom w-100 mt-3" data-toggle="modal" data-target="#modalp{{ $pgm->id }}">Baca</button>
                        </div>
                    </div>
                </div>
            @endforeach
            <!-- Tambahan untuk mengisi baris jika kurang dari 4 card -->
            @if ($pengumuman->count() == 1)
            <div class="col-lg-4 col-md-6 mb-4 d-none d-md-block"></div>
            <div class="col-lg-4 col-md-6 mb-4 d-none d-md-block"></div>
            @endif
            @if ($pengumuman->count() == 2)
            <div class="col-lg-4 col-md-6 mb-4 d-none d-md-block"></div>
            @endif
        </div>
    @endif
</div>

@foreach ($pengumuman as $pgm)
    <div id="modalp{{ $pgm->id }}" class="modal fade" tabindex="-1" aria-labelledby="modalLabel{{ $pgm->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" style="font-weight: bold" id="modalLabel{{ $pgm->id }}">{{ strtoupper($pgm->title) }}</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">X</button>
                </div>
                <div class="modal-body">
                    {!! $pgm->description !!}
                    @if ($pgm->id_kegiatan && $pgm->kegiatan->status == 'Publish')
                        <a href="{{ route('detailKegiatan', encrypt($pgm->id_kegiatan)) }}" class="btn btn-custom w-100 mt-3">Detail Kegiatan</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endforeach

<div class="container my-5">
    <h2 class="text-center mb-5 h1" data-aos="zoom-in-up" data-aos-duration="1000"><strong>KEGIATAN</strong> MENDATANG</h2>
    @if($kegiatan->isEmpty())
        <div class="alert alert-info text-center" role="alert" data-aos="zoom-in-up" data-aos-duration="1000">
            <i class="fas fa-info-circle fa-2x mb-3"></i>
            <h4 class="alert-heading">KEGIATAN TIDAK TERSEDIA</h4>
            <p>Saat ini tidak ada kegiatan yang tersedia dalam waktu dekat ini. Silakan klik tombol dibawah untuk informasi melihat semua kegiatan</p>
        </div>
    @else
        <section class="upcoming-events">
            <div class="kegiatan">
                @foreach ($kegiatan as $kgtn)
                <div class="kegiatan-item mb-4" data-aos="zoom-in-up" data-aos-duration="1000">
                    <div class="row">
                        <div class="col-md-8">
                            <h1 class="h5" style="font-weight: bold">{{ strtoupper($kgtn->title) }}</h1>
                            <div class="d-flex align-items-center">
                                <span class="card-icon mr-2"><i class="fas fa-map-marker-alt"></i></span>
                                <p class="card-text">{{ $kgtn->location }}</p>
                            </div>
                        </div>
                        <div class="col-md-4 d-flex align-items-end justify-content-end flex-column">
                            <p class="mb-2">{{ \Carbon\Carbon::parse($kgtn->date)->translatedFormat('l, j F Y') }}</p>
                            @if (!empty($kgtn->description) && $kgtn->description != '<p><br></p>')
                                <a href="{{ route('detailKegiatan', encrypt($kgtn->id)) }}" class="btn btn-custom">Detail</a>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </section>
    @endif
    <div class="text-center">
        <a href="{{ route('kegiatanpage') }}" class="btn btn-block mt-4 p-3 btn-custom" data-aos="zoom-in-up" data-aos-duration="1000">Lihat Semua Kegiatan</a>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function(){
        $(".announcement-carousel").slick({
            dots: true,
            slidesToShow: 3, 
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2500,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                    }
                }
            ]
        });
    });
</script>
@endsection