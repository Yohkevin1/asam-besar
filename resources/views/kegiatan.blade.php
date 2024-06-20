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

    .hero-section {
      background-image: url('https://student-activity.binus.ac.id/kmk/wp-content/uploads/sites/29/2016/05/10369724_10152887786504638_2058547948367111469_n.jpg');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      text-align: center;
    }

    .hero-section h1, .hero-section h4 {
      color: white;
    }

    .hero-section h1 {
      font-size: 96px;
    }

    .event-section {
      background-color: #f0f0f0;
      padding: 40px 0;
    }

    .event-card {
      background-color: white;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      border: none;
      margin-bottom: 20px;
    }

    .event-card img {
      width: 100%;
      height: auto;
      object-fit: cover;
    }

    .event-card .card-body {
      padding: 15px;
    }

    .event-card .card-title {
      font-size: 1rem;
      font-weight: bold;
      margin-bottom: 0.5rem;
    }

    .event-card .card-text {
      margin-bottom: 0.5rem;
      font-size: 0.875rem;
    }

    .event-card .btn {
      font-weight: bold;
      text-transform: uppercase;
      font-size: 0.875rem;
    }

    .search-bar {
      margin-bottom: 20px;
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
  <div class="hero-section">
    <div>
      <h1 class="mb-0">Seminar Mengikuti Kerahiman Yesus Kristus</h1>
      <h4>Selasa, 20 Mei 2020</h4>
    </div>
  </div>
  <div class="event-section">
    <div class="container-xl">
      <div class="row row-cols-1 row-cols-md-2 g-4">
      <div class="col-md-12">
          <input type="text" class="form-control" placeholder="Search" aria-label="Search">
        </div>
        <div class="col mb-4">
          <div class="card event-card">
            <img src="https://student-activity.binus.ac.id/kmk/wp-content/uploads/sites/29/2016/05/10369724_10152887786504638_2058547948367111469_n.jpg" class="card-img-top" alt="Event Image">
            <div class="card-body">
              <h5 class="card-title">Seminar Mengikuti Kerahiman Yesus Kristus</h5>
              <p class="card-text">Hari ini, 19.00 WIB</p>
              <p class="card-text">Kapel Santo Basilius</p>
              <a href="#" class="btn btn-primary">Detail Kegiatan</a>
            </div>
          </div>
        </div>
        <div class="col mb-4">
          <div class="card event-card">
            <img src="https://student-activity.binus.ac.id/kmk/wp-content/uploads/sites/29/2016/05/10369724_10152887786504638_2058547948367111469_n.jpg" class="card-img-top" alt="Event Image">
            <div class="card-body">
              <h5 class="card-title">Seminar Mengikuti Kerahiman Yesus Kristus</h5>
              <p class="card-text">Selasa, 20 Mei 2020</p>
              <p class="card-text">Kapel Santo Basilius</p>
              <a href="#" class="btn btn-primary">Detail Kegiatan</a>
            </div>
          </div>
        </div>
        <div class="col mb-4">
          <div class="card event-card">
            <img src="https://student-activity.binus.ac.id/kmk/wp-content/uploads/sites/29/2016/05/10369724_10152887786504638_2058547948367111469_n.jpg" class="card-img-top" alt="Event Image">
            <div class="card-body">
              <h5 class="card-title">Seminar Mengikuti Kerahiman Yesus Kristus</h5>
              <p class="card-text">Selasa, 20 Mei 2020</p>
              <p class="card-text">Kapel Santo Basilius</p>
              <a href="#" class="btn btn-primary">Detail Kegiatan</a>
            </div>
          </div>
        </div>
        <div class="col mb-4">
          <div class="card event-card">
            <img src="https://student-activity.binus.ac.id/kmk/wp-content/uploads/sites/29/2016/05/10369724_10152887786504638_2058547948367111469_n.jpg" class="card-img-top" alt="Event Image">
            <div class="card-body">
              <h5 class="card-title">Seminar Mengikuti Kerahiman Yesus Kristus</h5>
              <p class="card-text">Selasa, 20 Mei 2020</p>
              <p class="card-text">Kapel Santo Basilius</p>
              <a href="#" class="btn btn-primary">Detail Kegiatan</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
          <li class="page-item disabled">
            <a class="page-link" href="#" tabindex="-1">Back</a>
          </li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item">
            <a class="page-link" href="#">Next</a>
          </li>
        </ul>
      </nav>

  </div>
  
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.2/js/bootstrap.min.js" integrity="sha384-VoPF5F1B6BqC8jR9Tp/6cStoUHrfDp4zQk8jF4
