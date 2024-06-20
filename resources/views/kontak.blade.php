<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Paroki Asam Besar</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-Ah4GmHG8jb82+biP3+eQp13VZG5YM0T7hPj71Rr66l3qzXoYfw+PQxmOmUXG28SfF8dQ9phX9hE4w+fn0rjzqQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <style>
    /* Custom Styles */
    .navbar {
      background-color: transparent;
      position: fixed;
      width: 100%;
      z-index: 1000;
    }

    .navbar-brand {
      margin-right: auto;
    }

    .navbar-brand img {
      width: 50px;
      height: auto;
    }

    .navbar-nav {
      margin-left: auto;
    }

    .navbar-nav .nav-link {
      color: white;
      transition: color 0.3s;
    }

    .navbar-nav .nav-link:hover {
      color: lightgray;
    }

    .centered {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      flex-direction: column;
    }

    h1, h4 {
      color: white;
    }

    h1 {
      font-size: 96px;
    }

    body {
      background-image: url('https://img.freepik.com/free-vector/colorful-equalizer-wave-background_23-2148421847.jpg');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      height: 100vh;
      margin: 0;
    }

    .contact-section {
      padding: 50px 0;
      background-color: #fff;
      margin-top: 130px;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .contact-section .info h4 {
      font-size: 20px;
      font-weight: 700;
      color: #333;
    }

    .contact-section .info p {
      margin: 0;
    }

    .map {
      width: 100%;
      height: 400px;
      background-color: #f7f7f7;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 24px;
      color: #999;
      border: 1px solid #ddd;
    }

    .contact-info {
      display: flex;
      justify-content: space-between;
      margin-bottom: 20px;
    }

    .contact-info .info {
      flex: 1;
      margin: 0 10px;
    }

    hr {
      border: 1px solid #333;
      margin: 20px 0;
    }

    .contact-section .info h5 {
      margin-bottom: 60px;
    }
  </style>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img src="{{ asset('img/Logo_Paroki_Transparan.png') }}" alt="Logo">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-6 mb-lg-0">
        <li class="nav-item dropdown">
            <a class="nav-link active dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Profil
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{ url('simbol') }}">Simbol</a></li>
              <li><a class="dropdown-item" href="#">Visi & Misi</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Dewan Pengurus Harian</a></li>
            </ul>
          <li class="nav-item">
            <a class="nav-link active" href="{{ url('renunganPage') }}">Renungan</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link active dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Layanan
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{ url('baptis') }}">Baptis</a></li>
              <li><a class="dropdown-item" href="{{ url('tobat') }}">Tobat</a></li>
              <li><a class="dropdown-item" href="{{ url('komuni') }}">Komuni Pertama</a></li>
              <li><a class="dropdown-item" href="{{ url('krisma') }}">Krisma</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="{{ url('pernikahan') }}">Pernikahan</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="{{ url('kegiatanP') }}">Kegiatan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="{{ url('kontak')}}">Kontak</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="centered">
    <div>
      <h4>BANTUAN DAN LAYANAN PAROKI</h4>
      <h1>Hubungi Kami</h1>
    </div>
  </div>
  <div class="container-fluid contact-section">
    <div class="info">
      <h4>Paroki Asam Besar</h4>
      <hr>
      <h5>Jln. Xxxxxx No. X, RT. XX / RW. XX, Kelurahan xx, Kecamatan xxx, XXX, XXX POS</h5>
    </div>
    <div class="contact-info">
      <div class="info">
        <h4><img src="{{ asset('img/phone.png') }}" alt="Telepon" style="width: 20px; height: auto; margin-right: 10px;"> Telepon</h4>
        <p>+62 xx xxx-xxx-xxx</p>
      </div>
      <div class="info">
        <h4><img src="{{ asset('img/mail.png') }}" alt="Email" style="width: 20px; height: auto; margin-right: 10px;"> Email</h4>
        <p>xxxx@gmail.com</p>
      </div>
      <div class="info">
        <h4><img src="{{ asset('img/whatsapp.png') }}" alt="WhatsApp" style="width: 20px; height: auto; margin-right: 10px;"> WhatsApp</h4>
        <p>+62 xx xxx-xxx-xxx</p>
      </div>
    </div>
    <div class="info">
      <h4><img src="{{ asset('img/availability.png') }}" alt="Jam" style="width: 20px; height: auto; margin-right: 10px;"> Operasional Sekretariat</h4>
      <p>Hari Xxxx: Libur</p>
      <p>Hari Xxxx - xxxx: 0x.xx WIB - 1x.xx WIB</p>
      <p>Istirahat: 12.00 WIB - 13.00 WIB</p>
    </div>
    <div id="mapid" class="map"></div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
  <script>
  
    var map = L.map('mapid').setView([-2.401011349783975, 111.0156926508436], 13); 

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    }).addTo(map);

    
    L.marker([-2.401011349783975, 111.0156926508436]).addTo(map)
      .bindPopup('Paroki Asam Besar')
      .openPopup();
  </script>
</body>
</html>