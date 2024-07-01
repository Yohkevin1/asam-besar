@extends('frontend.layout.main')

@section('keywords', 'Gereja St. Blasius, paroki asam besar, asambesar, asam besar, gereja st blasius, gereja st. blasius, gereja blasius, paroki blasius, paroki asam besar, paroki asambesar')
@section('description', 'Official Website Gereja St. Blasius Paroki Asam Besar - Contact Us')

@section('css')
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
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

    .map {
        width: 100%;
        height: 400px;
    }
</style>
@endsection

@section('content')
<div class="hero-section" style="background-image: url('img/kontak.jpeg'); background-size: cover; background-position: center;">
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <h4 data-aos="fade-down" data-aos-duration="1000" data-aos-delay="400">Bantuan dan Layanan Paroki</h4>
        <h1 class="mb-0" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="200">HUBUNGI KAMI</h1>
    </div>
</div>

<div class="container py-5">
    <div class="row">
        <div class="col-md-6 mb-5" data-aos="zoom-in-up" data-aos-duration="1000">
            <h2 class="mb-2 h6" style="font-weight: bold;">PAROKI ASAM BESAR GEREJA ST. BLASIUS</h2>
            <hr class="mb-2">
            <h4 class="mb-4" style="color: rgb(87, 87, 87)">Asam Besar, Kec. Manis Mata, Kabupaten Ketapang, Kalimantan Barat 78864</h4>
            <ul class="list-unstyled mb-4">
                <li><img src="{{ asset('img/mail.png') }}" alt="Email" style="width: 20px; height: auto; margin-right: 10px;"><strong>Email:</strong> <a href="mailto:parokiasambesar@gmail.com">parokiasambesar@gmail.com</a></li>
                {{-- <li><img src="{{ asset('img/whatsapp.png') }}" alt="WhatsApp" style="width: 20px; height: auto; margin-right: 10px;"><strong>WhatsApp:</strong> <a href="https://wa.me/6287755116033" target="_blank">Hubungi via WhatsApp</a></li>
                <li><img src="{{ asset('img/phone.png') }}" alt="Phone" style="width: 20px; height: auto; margin-right: 10px;"><strong>Nomor Telepon:</strong> +6287755116033</li> --}}
            </ul>
            <hr class="mb-2">
            <h4 style="color: black">OPERASIONAL SEKRETARIAT</h4>
            <ul class="list-unstyled">
                <li>Senin - Jumat: <strong>09.00 WIB - 13.00 WIB</strong></li>
                <li>Sabtu - Minggu: <strong>Libur</strong></li>
            </ul>
        </div>
        <div class="col-md-6" data-aos="zoom-in-up" data-aos-duration="1000">
            <div id="mapid" class="map"></div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script>
    var map = L.map('mapid').setView([-2.401011349783975, 111.0156926508436], 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {}).addTo(map);

    // L.marker([-2.401011349783975, 111.0156926508436]).addTo(map)
    //     .bindPopup('<strong>Paroki Asam Besar</strong><br><a href="https://wa.me/6287755116033" target="_blank">Hubungi via WhatsApp</a><br><a href="mailto:xxxx@gmail.com">Kirim email</a>')
    //     .openPopup();

    L.marker([-2.401011349783975, 111.0156926508436]).addTo(map)
        .bindPopup('<strong>Paroki Asam Besar</strong><br><a href="mailto:parokiasambesar@gmail.com">Kirim email</a>')
        .openPopup();

</script>
@endsection

