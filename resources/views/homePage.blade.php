<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Paroki Asam Besar</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <style>
    .navbar {
      background-color: transparent; 
      position: fixed; 
      width: 100%; 
      z-index: 1000;
    }

    .navbar-brand {
      margin-right: auto; /* Jarak kanan agar logo di sebelah kiri */
    }

    .navbar-brand img {
      width: 50px; /* Sesuaikan lebar logo */
      height: auto; /* Biarkan tinggi menyesuaikan agar proporsi tetap */
    }

    .navbar-nav {
      margin-left: auto; /* Menu-menu bergerak ke kanan */
    }

    .navbar-nav .nav-link {
      color: white; /* Warna teks menu */
      transition: color 0.3s; /* Efek transisi warna saat hover */
    }

    .navbar-nav .nav-link:hover {
      color: lightgray; /* Warna teks menu saat dihover */
    }

    .carousel {
      margin-top: 20px; /* Margin atas setara dengan tinggi navbar */
    }

    .carousel img {
      max-height: 900px; /* Atur tinggi maksimum gambar dalam carousel */
      transition: filter 0.5s ease; /* Efek transisi untuk filter */
    }

    .carousel img:hover {
      filter: blur(0); /* Hapus filter blur saat hover */
    }

    .carousel-caption {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      text-align: center;
      color: white;
    }

    .carousel-caption h5 {
      font-size: 4em; /* Atur ukuran font untuk judul */
    }

    .carousel-caption p {
      font-size: 1.5em; /* Atur ukuran font untuk teks */
    }

    .announcement-card {
    border: 1px solid #dee2e6; /* Tambahkan border pada card */
    border-radius: 8px; /* Rounding border untuk penampilan yang lebih baik */
    transition: all 0.3s ease; /* Efek transisi untuk hover */
    display: flex; /* Gunakan flexbox */
    flex-direction: column; /* Atur arah kolom */
    justify-content: center; /* Pusatkan konten vertikal */
    align-items: center; /* Pusatkan konten horizontal */
    text-align: center; /* Pusatkan teks horizontal */
  }

  .announcement-card img {
    max-width: 100%; /* Atur gambar agar tidak melebihi lebar card */
    border-radius: 8px 8px 0 0; /* Rounding hanya pada sudut atas */
  }

  .announcement-card:hover {
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Efek bayangan saat hover */
    transform: translateY(-5px); /* Angkat card sedikit saat hover */
  }

  .modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0,0,0,0.4);
  }

  .modal-content {
    background-color: #fefefe;
    margin: 15% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
  }

  .close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
  }

  .close:hover,
  .close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
  }

  .kegiatan-item {
  display: flex;
  flex-direction: column;
  margin-bottom: 20px;
}

.kegiatan-details {
  margin-bottom: 10px;
}

.kegiatan-details h2,
.kegiatan-details p {
  margin-left: 0;
}

.detail-btn {
  background-color: black;
  color: white; /* Mengatur warna teks agar kontras dengan latar belakang hitam */
  font-weight: bold;
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
  <div class="carousel">
    <div id="carouselExampleCaptions" class="carousel slide">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="https://i.pinimg.com/736x/75/2a/0a/752a0a82fbe9cc6461f5f16df1ed39fd.jpg" class="d-block w-100" alt="picture">
          <div class="carousel-caption d-none d-md-block">
            <img src="{{ asset('img/Logo_Paroki_Transparan.png') }}" alt="Logo" style="width: 200px;">
            <h5>Paroki Asam Besar</h5>
            <p>Tentang Kami</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid bg-dark text-light py-5">
  <div class="container">
    <h1 class="text-center mb-4">Jadwal Misa</h1>
    <div class="row justify-content-center">
    
      <div class="col-md-4 mb-4">
      <h4><img src="{{ asset('img/church.png') }}" alt="Jam" style="width: 70px; height: auto; margin-right: 20px;"> Operasional Sekretariat</h4>
        <ul class="list-unstyled text-center">
          <li><strong>Hari Jumat Pertama Setiap Bulan:</strong> 19:30 WIB</li>
        </ul>
      </div>

      <div class="col-md-4 mb-4">
      <h4><img src="{{ asset('img/church.png') }}" alt="Jam" style="width: 70px; height: auto; margin-right: 20px;">Misa Mingguan</h4>
        <ul class="list-unstyled text-center">
          <li><strong>Hari Minggu Setiap Pekan:</strong> 08:00 WIB</li>
        </ul>
      </div>

      <div class="col-md-4 mb-4">
      <h4><img src="{{ asset('img/church.png') }}" alt="Jam" style="width: 70px; height: auto; margin-right: 20px;">Misa Harian</h4>
        <ul class="list-unstyled text-center">
          <li><strong>Senin - Sabtu:</strong> 06:30 WIB</li>
        </ul>
      </div>
    </div>
  </div>
</div>
  <div class="container">
    <h1 class="text-center mb-4">Pengumuman Gereja</h1>
    <div class="row">
      <div class="col-md-3 mb-4">
        <div class="announcement-card">
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT5khQDY4RGT93qEcjbQ6ed2ItBKDv-NyWB48cu-U2K66QdQiD1zRx6XdQJJDov0jnnmLE&usqp=CAU" alt="Announcement Image" class="img-fluid">
          <div class="announcement-card-text">
            <h3>Pendaftaran Komuni Pertama</h3>
            <p>Syalom Berikut Ini Kami Sampaikan</p>
            <button class="detail-btn" data-target="#modalp1">Baca Pengumuman</button>
          </div>
        </div>
      </div>
      <div class="col-md-3 mb-4">
        <div class="announcement-card">
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT5khQDY4RGT93qEcjbQ6ed2ItBKDv-NyWB48cu-U2K66QdQiD1zRx6XdQJJDov0jnnmLE&usqp=CAU" alt="Announcement Image" class="img-fluid">
          <div class="announcement-card-text">
            <h3>Pendaftaran Komuni Pertama</h3>
            <p>Syalom Berikut Ini Kami Sampaikan</p>
            <button class="detail-btn" data-target="#modap2">Baca Pengumuman</button>
          </div>
        </div>
      </div>
      
      <div class="col-md-3 mb-4">
        <div class="announcement-card">
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT5khQDY4RGT93qEcjbQ6ed2ItBKDv-NyWB48cu-U2K66QdQiD1zRx6XdQJJDov0jnnmLE&usqp=CAU" alt="Announcement Image" class="img-fluid">
          <div class="announcement-card-text">
            <h3>Pendaftaran Komuni Pertama</h3>
            <p>Syalom Berikut Ini Kami Sampaikan</p>
            <button class="detail-btn" data-target="#modalp3">Baca Pengumuman</button>
          </div>
        </div>
      </div>
      <div class="col-md-3 mb-4">
        <div class="announcement-card">
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT5khQDY4RGT93qEcjbQ6ed2ItBKDv-NyWB48cu-U2K66QdQiD1zRx6XdQJJDov0jnnmLE&usqp=CAU" alt="Announcement Image" class="img-fluid">
          <div class="announcement-card-text">
            <h3>Pendaftaran Komuni Pertama</h3>
            <p>Syalom Berikut Ini Kami Sampaikan</p>
            <button class="detail-btn" data-target="#modalp4">Baca Pengumuman</button>
          </div>
        </div>
      </div>
    <div id="modalp1" class="modal">
    <div class="modal-content">
      <span class="close">&times;</span>
      <h2>Pengumuman</h2>
      <p>Syallom, berikut ini kami sampaikan jadwal penerimaan Sakremen Komuni Pertama 2020, Info lebih lanjut dapat dicek di laman XXXXXXXX. Terimakasih, Tuhan Memberkati.</p>
    </div>
  </div>

  <div id="modalp2" class="modal">
    <div class="modal-content">
      <span class="close">&times;</span>
      <h2>Pengumuman</h2>
      <p>Syallom, berikut ini kami sampaikan jadwal penerimaan Sakremen Komuni Pertama 2020, Info lebih lanjut dapat dicek di laman XXXXXXXX. Terimakasih, Tuhan Memberkati.</p>
    </div>
  </div>

  <div id="modalp3" class="modal">
    <div class="modal-content">
      <span class="close">&times;</span>
      <h2>Pengumuman</h2>
      <p>Syallom, berikut ini kami sampaikan jadwal penerimaan Sakremen Komuni Pertama 2020, Info lebih lanjut dapat dicek di laman XXXXXXXX. Terimakasih, Tuhan Memberkati.</p>
    </div>
  </div>

  <div id="modalp4" class="modal">
    <div class="modal-content">
      <span class="close">&times;</span>
      <h2>Pengumuman</h2>
      <p>Syallom, berikut ini kami sampaikan jadwal penerimaan Sakremen Komuni Pertama 2020, Info lebih lanjut dapat dicek di laman XXXXXXXX. Terimakasih, Tuhan Memberkati.</p>
    </div>
  </div>
</div>
  </div>
  <div class="container">
    <h1 class="text-center">Kegiatan Mendatang</h1>
    <section class="upcoming-events">
        <div class="kegiatan">
        <div class="kegiatan-item">
          <div class="kegiatan-details">
            <h2>Seminar Mengikuti Kerahiman Yesus Kristus</h2>
            <p>Lokasi:Kapel Santo Basilius</p>
            <button class="detail-btn" data-target="#modal1">Detail</button>
        </div>
          </div>
          <hr>
          <div class="kegiatan">
        <div class="kegiatan-item">
          <div class="kegiatan-details">
            <h2>Seminar Mengikuti Kerahiman Yesus Kristus</h2>
            <p>Lokasi:Kapel Santo Basilius</p>
            <button class="detail-btn" data-target="#modal2">Detail</button>
        </div>
          </div>
          <hr>
      </div>
    </section>
  </div>
  <div id="modal1" class="modal">
    <div class="modal-content">
      <span class="close">&times;</span>
      <h2>Detail Kegiatan 1</h2>
      <p>Informasi detail mengenai kegiatan 1.</p>
    </div>
  </div>

  <div id="modal2" class="modal">
    <div class="modal-content">
      <span class="close">&times;</span>
      <h2>Detail Kegiatan 2</h2>
      <p>Informasi detail mengenai kegiatan 2.</p>
    </div>
  </div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<script>
var modals = document.querySelectorAll('.modal');
var btns = document.querySelectorAll('.detail-btn');
var spans = document.querySelectorAll('.close');

btns.forEach(function(btn, index) {
  btn.addEventListener('click', function() {
    modals[index].style.display = "block";
  });
});

spans.forEach(function(span, index) {
  span.addEventListener('click', function() {
    modals[index].style.display = "none";
  });
});

</script>
</body>
</html>
