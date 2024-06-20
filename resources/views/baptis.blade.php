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
      background-image: url('https://philosophys.technology/wp-content/uploads/2023/09/4.-Memahami-Beberapa-Syarat-Utama-Baptis-dalam-Agama-Kristen.webp');
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
      <h1>Baptis</h1>
    </div>
  </div>
  <div class="container-separator">
    <div class="container">
    <h2 class="text-3xl font-bold text-center mb-8 bg-black text-white p-4">Baptis BaTuTa</h2>
      <div class="bg-gray-200 p-6 rounded-lg mb-8">
        <h5 class="text-xl font-bold mb-4">Syarat Penerimaan Sakramen</h5>
        <ul class="list-disc pl-6">
          <li>Wali Baptis bukan saudara kandung dari Orang Tua Calon Baptis.</li>
          <li>Orangtua (suami dan isteri) dan wali baptis wajib mengikuti pembekalan/rekoleksi sebelum pembaptisan.</li>
          <li>Jadwal pembekalan/rekoleksi bisa disesuaikan dengan ketersediaan waktu orang tua dan wali baptis.</li>
        </ul>
        <h5 class="text-lg font-bold mt-4">Catatan</h5>
        <ul class="list-disc pl-6">
          <li>Pendaftaran dan penyerahan dokumen syarat administratif dapat dilakukan langsung melalui sekretariat</li>
          <li>Surat Baptis dapat diambil di Sekretariat Paroki 2 (dua) minggu setelah baptis.</li>
        </ul>
        <h5 class="text-lg font-bold mt-4">Syarat Administratif</h5>
        <ul class="list-disc pl-6">
          <li>Akte Lahir anak.</li>
          <li>Surat Pernikahan Gereja dari orang tua calon baptis.</li>
          <li>Surat Krisma Wali Baptis atau Surat Pernikahan Gereja dari Wali Baptis.</li>
          <li>Kartu Keluarga Katolik terbaru.</li>
        </ul>
      </div>
    </div>
  </div>
  <div class="container mt-5">
  <h2 class="text-3xl font-bold text-center mb-8 bg-black text-white p-4">Baptis Dewasa</h2>
    <div class="bg-gray-200 p-6 rounded-lg">
      <h4 class="text-xl font-bold mb-4">Syarat Penerimaan Sakramen</h4>
      <ul class="list-disc pl-6">
        <li>Calon Baptis yang berusaha sesuai dengan ketentuan.</li>
        <li>Calon Baptis mengikuti kurang lebih 40 (empat puluh) kali pertemuan yang diatur oleh seksi terkait.</li>
        <li>Calon Baptis mengikuti wawancara akhir dan rekoleksi sebelum penerimaan Sakramen Baptis.</li>
        <li>Setelah Baptis dilakukan, Calon Baptis wajib melanjutkan kegiatan 2 kali Mistagogi.</li>
      </ul>
      <h5 class="text-lg font-bold mt-4">Catatan</h5>
      <ul class="list-disc pl-6">
        <li>Pendaftaran dan penyerahan dokumen syarat administratif dapat dilakukan langsung melalui Sekretariat
          pada bagian Calon Penerima Sakramen Intern (Paroki MKK) atau bagian Calon Penerima Sakramen Extern
          (Paroki Luar MKK), dibawah ini, paling lambat hari pertama pembekalan diadakan.
        </li>
        <li>40 (empat puluh) kali Pertemuan akan dibagi menjadi 3 masa yaitu: Masa Praketekument, Masa
          Katekumenat dan Masa Persiapan Akhir.
        </li>
      </ul>
      <h5 class="text-lg font-bold mt-4">Syarat Administratif</h5>
      <ul class="list-disc pl-6">
        <li>Paspoto ukuran 3x4.</li>
        <li>Kartu Tanda Pengenal (KTP).</li>
        <li>Akta Lahir.</li>
        <li>Surat Nikah Sipil dan Gereja (Bagi yang pasangannya Katolik).</li>
        <li>Kartu Keluarga Katolik/Sipil (Terbaru).</li>
        </ul>
    </div>
  </div></body>
</html>
