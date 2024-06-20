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

    .card-container {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      gap: 20px;
    }

    .card {
      background-color: white;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      margin: 10px;
      width: calc(25% - 20px);
      overflow: hidden;
      transition: transform 0.5s ease-in-out, box-shadow 0.5s ease-in-out;
    }

    .card img {
      width: 100%;
      height: auto;
    }

    .card:hover {
      transform: rotateY(360deg);
      box-shadow: 0 12px 24px rgba(0, 0, 0, 0.3);
    }

    .card:hover .date {
      background-color: darkorange;
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
      font-size: 1.2em;
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
      <h4>Iman Katolik</h4>
      <h1 class="mb-0">Renungan Harian</h1>
    </div>
  </div>
  <div class="event-section">
    <div class="container-xl">
      <div class="card-container">
        <div class="card">
          <img src="https://student-activity.binus.ac.id/kmk/wp-content/uploads/sites/29/2016/05/10369724_10152887786504638_2058547948367111469_n.jpg" alt="Image">
          <div class="date">
            <div class="date-content">
              <div class="date-day">03</div>
              <div class="date-month">MAR</div>
            </div>
          </div>
          <div class="header">Renungan Harian</div>
          <div class="content">
            <h3>Kamis, 12 Mei 2024</h3>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry...</p>
          </div>
        </div>
        <div class="card">
          <img src="https://student-activity.binus.ac.id/kmk/wp-content/uploads/sites/29/2016/05/10369724_10152887786504638_2058547948367111469_n.jpg" alt="Image">
          <div class="date">
            <div class="date-content">
              <div class="date-day">04</div>
              <div class="date-month">MAR</div>
            </div>
          </div>
          <div class="header">Renungan Harian</div>
          <div class="content">
            <h3>Jumat, 13 Mei 2024</h3>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry...</p>
          </div>
        </div>
        <div class="card">
          <img src="https://student-activity.binus.ac.id/kmk/wp-content/uploads/sites/29/2016/05/10369724_10152887786504638_2058547948367111469_n.jpg" alt="Image">
          <div class="date">
            <div class="date-content">
              <div class="date-day">05</div>
              <div class="date-month">MAR</div>
            </div>
          </div>
          <div class="header">Renungan Harian</div>
          <div class="content">
            <h3>Sabtu, 14 Mei 2024</h3>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry...</p>
          </div>
        </div>
        <div class="card">
          <img src="https://student-activity.binus.ac.id/kmk/wp-content/uploads/sites/29/2016/05/10369724_10152887786504638_2058547948367111469_n.jpg" alt="Image">
          <div class="date">
            <div class="date-content">
              <div class="date-day">06</div>
              <div class="date-month">MAR</div>
            </div>
          </div>
          <div class="header">Renungan Harian</div>
          <div class="content">
            <h3>Minggu, 15 Mei 2024</h3>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry...</p>
          </div>
        </div>
        <div class="card">
          <img src="https://student-activity.binus.ac.id/kmk/wp-content/uploads/sites/29/2016/05/10369724_10152887786504638_2058547948367111469_n.jpg" alt="Image">
          <div class="date">
            <div class="date-content">
              <div class="date-day">06</div>
              <div class="date-month">MAR</div>
            </div>
          </div>
          <div class="header">Renungan Harian</div>
          <div class="content">
            <h3>Minggu, 15 Mei 2024</h3>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry...</p>
          </div>
        </div>
        <div class="card">
          <img src="https://student-activity.binus.ac.id/kmk/wp-content/uploads/sites/29/2016/05/10369724_10152887786504638_2058547948367111469_n.jpg" alt="Image">
          <div class="date">
            <div class="date-content">
              <div class="date-day">06</div>
              <div class="date-month">MAR</div>
            </div>
          </div>
          <div class="header">Renungan Harian</div>
          <div class="content">
            <h3>Minggu, 15 Mei 2024</h3>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry...</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.2/js/bootstrap.min.js" integrity="sha384-VoPF5F1B6BqC8jR9Tp/6cStoUHrfDp4zQk8jF4F5bxF6vo8Zh5G7I9Hg5b56eOjT"></script>
</body>
</html>
