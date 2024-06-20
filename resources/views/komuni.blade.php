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
    width: 100%;
    max-width: 100%;
    box-sizing: border-box;
    margin-left: auto;
    margin-right: auto;
    padding: 20px; /* Tambahkan padding di dalam container jika diperlukan */
  }

    body {
      background-image: url('https://kas.or.id/wp-content/uploads/2020/04/panduan-hari-raya-kamis-putih-2020-1.jpg');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      height: 100vh;
      margin: 0;
    }

    .container-separator {
      background-color: #f0f0f0;
      padding: 20px;
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
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Profil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="#">Renungan</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link active dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Layanan
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="#">Kegiatan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="#">Kontak</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="centered">
    <div>
      <h4 class="mb-0">Layanan Sakramen</h4>
      <h1>Komuni Pertama</h1>
    </div>
  </div>
  <div class="container-separator">
    <div class="container">
      <div class="bg-gray-200 p-6 rounded-lg mb-8">
        <h5 class="text-xl font-bold mb-4">Syarat Penerimaan Sakramen</h5>
        <ul class="list-disc pl-6">
          <li>Calon Penerima Komuni Pertama Wajib mengikuti pembekalan  sebanyak 20 (dua puluh) kali pertemuan</li>
          <li>Orangtua (suami dan isteri) wajib mengikuti pembekalan dan rekoleksi khusus orang tua Calon Penerima Komuni Pertama.</li>
        </ul>
        <h5 class="text-lg font-bold mt-4">Catatan</h5>
        <ul class="list-disc pl-6">
          <li>Formulir (yang sudah ditanda tangani ketua lingkungan) dan dilengkapi syarat administratif diserahkan kepada petugas Sekretariat Paroki pada setiap hari kerja Paroki atau paling lambat hari Jumat sebelum pembekalan awal diadakan</li>
          <li>Pembekalan dilakukan di 4 Lokasi yaitu Sekolah Abdi Siswa, Sekolah St. John, Sekolah Holy Angels dan Gereja MKK (untuk Calon Penerima Komuni Pertama di luar sekolah tersebut diatas).</li>
          <li>Jadwal Pembekalan di lokasi sekolah diatur oleh sekolah masing-masing.</li>
        </ul>
        <h5 class="text-lg font-bold mt-4">Syarat Administratif</h5>
        <ul class="list-disc pl-6">
          <li>Pasfoto ukuran 3x4 sebanyak 1 lembar (dibelakang foto diberi nama)</li>
          <li>Fotokopi Akte Lahir anak.</li>
          <li>Fotokopi Surat Baptis</li>
          <li>Kartu Keluarga Katolik asli (untuk langsung diperbarui)</li>
        </ul>
      </div>
    </div>
  </div>