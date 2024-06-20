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

    .container-separator {
      background-color: #f0f0f0;
      padding: 20px;
    }

    body {
      background-image: url('https://student-activity.binus.ac.id/kmk/wp-content/uploads/sites/29/2016/05/10369724_10152887786504638_2058547948367111469_n.jpg');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      height: 100vh;
      margin: 0;
    }
    
    .modal {
      display: none;
      position: fixed;
      z-index: 1000;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgb(0,0,0);
      background-color: rgba(0,0,0,0.4);
    }
    
    .modal-content {
      background-color: #fefefe;
      margin: 15% auto;
      padding: 20px;
      border: 1px solid #888;
      width: 80%;
      max-width: 600px;
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

    .modal-image {
      width: 100%;
      height: auto;
      margin-bottom: 20px;
    }

    .announcement-section {
      margin-top: 200px; 
      padding-top: 200px;
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
      <h4 class="mb-0">Layanan Sakramen</h4>
      <h1>Pernikahan</h1>
    </div>
  </div>
  <div class="container mt-5 announcement-section">
    <header class="text-center mb-4">
      <h2>PENGUMUMAN PERNIKAHAN</h2>
    </header>
    <div class="row">
      <div class="col-md-4">
        <div class="card mb-4">
          <img src="https://student-activity.binus.ac.id/kmk/wp-content/uploads/sites/29/2016/05/10369724_10152887786504638_2058547948367111469_n.jpg" class="card-img-top">
          <div class="card-body text-center">
            <h6 class="card-title">30 April</h6>
            <h5 class="card-text">Nanon Korapat & Monica Gita</h5>
            <a href="#" class="btn btn-primary detail-btn" data-modal="modal1">Detail Pernikahan</a>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card mb-4">
          <img src="https://student-activity.binus.ac.id/kmk/wp-content/uploads/sites/29/2016/05/10369724_10152887786504638_2058547948367111469_n.jpg" class="card-img-top">
          <div class="card-body text-center">
            <h6 class="card-title">30 April</h6>
            <h5 class="card-text">Nanon Korapat & Monica Gita</h5>
            <a href="#" class="btn btn-primary detail-btn" data-modal="modal2">Detail Pernikahan</a>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card mb-4">
          <img src="https://student-activity.binus.ac.id/kmk/wp-content/uploads/sites/29/2016/05/10369724_10152887786504638_2058547948367111469_n.jpg" class="card-img-top">
          <div class="card-body text-center">
            <h6 class="card-title">30 April</h6>
            <h5 class="card-text">Nanon Korapat & Monica Gita</h5>
            <a href="#" class="btn btn-primary detail-btn" data-modal="modal3">Detail Pernikahan</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <footer class="container mt-5">
    <h2>Syarat Penerimaan Sakramen</h2>
    <ol>
      <li>Calon penerima Sakramen Krisma Minimal sudah dibaptis dan menerima Sakramen Komuni Pertama.</li>
      <li>Calon penerima Sakramen Krisma minimal usia 13 tahun.</li>
      <li>Calon penerima Sakramen Krisma yang sudah bekerja minimal membawa surat keterangan dari Lingkungan/Kelompok/Umat, & Surat Rekomendasi dari Pastor Paroki sebelumnya.</li>
      <li>Calon penerima Sakramen Krisma wajib menyerahkan surat keterangan telah menerima Sakramen Komuni Pertama.</li>
      <li>Calon penerima Sakramen Krisma wajib menyerahkan fotokopi akte kelahiran & surat Baptis yang telah dilegalisir.</li>
      <li>Calon penerima Sakramen Krisma wajib menyerahkan fotokopi surat keterangan sudah menerima Komuni Pertama yang telah dilegalisir.</li>
      <li>Calon penerima Sakramen Krisma wajib menyerahkan pas foto ukuran 3x4 sebanyak 3 lembar, serta ukuran 4x6 sebanyak 2 lembar.</li>
      <li>Calon penerima Sakramen Krisma wajib menyerahkan surat keterangan sehat dari Dokter/Vaksin.</li>
      <li>Calon penerima Sakramen Krisma wajib mengikuti pembekalan yang akan diadakan.</li>
      <li>Calon penerima Sakramen Krisma wajib mengikuti seluruh rangkaian kegiatan persiapan yang diadakan.</li>
    </ol>
    <p><strong>Catatan</strong></p>
    <ul>
      <li>Seluruh Formulir dan kelengkapan dokumen untuk Pendaftaran Penerimaan Sakramen Penguatan/Krisma 2024 dilakukan langsung melalui online...</li>
      <li>Pembekalan akan diadakan setiap hari Jum’at mulai tanggal 12 Juli 2024, pukul 18.00 - 20.30 WIB.</li>
      <li>Seksi Katekese/Panitia akan melakukan konfirmasi pendaftaran dengan mengundang calon peserta bergabung ke Whatsapp Group selambat-lambatnya 2 minggu sebelum pembekalan dimulai.</li>
    </ul>
    <p><strong>Syarat Administratif</strong></p>
    <ul>
      <li>Upload Pasfoto ukuran 3x4</li>
      <li>Upload Akte Lahir anak.</li>
      <li>Upload Surat Baptis.</li>
      <li>Upload Surat Komuni Pertama.</li>
      <li>Upload Kartu Keluarga Katolik.</li>
    </ul>
  </footer>

  <div id="modal1" class="modal">
    <div class="modal-content">
      <span class="close">&times;</span>
      <img src="{{ asset('img/Logo_Paroki_Transparan.png') }}" class="modal-image" alt="Pernikahan Image">
      <p>Berikut ini diumumkan, calon pengantin yang akan mengadakan Sakramen Pernikahan</p>
      <h2>Nanon Korapat & Monica Gita</h2>
      <p>Apabila Umat mengetahui adanya halangan rencana Sakramen Pernikahan/Pemberkatan Pernikahan tersebut, umat wajib memberitahukan kepada Pastor Paroki. Terima kasih.</p>
    </div>
  </div>
  <div id="modal2" class="modal">
    <div class="modal-content">
      <span class="close">&times;</span>
      <img src="{{ asset('img/Logo_Paroki_Transparan.png') }}" class="modal-image" alt="Pernikahan Image">
      <p>Berikut ini diumumkan, calon pengantin yang akan mengadakan Sakramen Pernikahan</p>
      <h2>Nanon Korapat & Monica Gita</h2>
      <p>Apabila Umat mengetahui adanya halangan rencana Sakramen Pernikahan/Pemberkatan Pernikahan tersebut, umat wajib memberitahukan kepada Pastor Paroki. Terima kasih.</p>
    </div>
  </div>
  <div id="modal3" class="modal">
    <div class="modal-content">
      <span class="close">&times;</span>
      <img src="{{ asset('img/Logo_Paroki_Transparan.png') }}" class="modal-image" alt="Pernikahan Image">
      <p>Berikut ini diumumkan, calon pengantin yang akan mengadakan Sakramen Pernikahan</p>
      <h2>Nanon Korapat & Monica Gita</h2>
      <p>Apabila Umat mengetahui adanya halangan rencana Sakramen Pernikahan/Pemberkatan Pernikahan tersebut, umat wajib memberitahukan kepada Pastor Paroki. Terima kasih.</p>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.2/js/bootstrap.min.js" integrity="sha384-VoPF5F1B6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"></script>
  <script>
    var modals = document.querySelectorAll('.modal');
    var btns = document.querySelectorAll('.detail-btn');
    var spans = document.querySelectorAll('.close');

    btns.forEach(function(btn) {
      btn.addEventListener('click', function(event) {
        event.preventDefault();
        var modalId = this.getAttribute('data-modal');
        var modal = document.getElementById(modalId);
        modal.style.display = "block";
      });
    });

    spans.forEach(function(span) {
      span.addEventListener('click', function() {
        this.closest('.modal').style.display = "none";
      });
    });

    window.onclick = function(event) {
      if (event.target.classList.contains('modal')) {
        event.target.style.display = "none";
      }
    }
  </script>
</body>
</html>
