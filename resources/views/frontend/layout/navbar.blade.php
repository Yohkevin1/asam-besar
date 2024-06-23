<style>
    .navbar {
        background-color: transparent; 
        transition: background-color 0.6s;
    }

    .navbar.scrolled {
        background-color: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(25px); 
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .navbar-brand img {
        width: 50px;
        height: auto; 
    }

    .navbar-toggler {
        border: none;
    }

    .navbar-nav .nav-link {
        color: white;
        transition: color 0.6s;
    }

    .navbar-nav .nav-link-header {
        color: white;
        transition: color 0.6s;
    }

    .navbar-nav .nav-link:hover {
        color: lightblue;
    }

    .navbar.scrolled .nav-link {
        color: black; 
    }

    .navbar.scrolled .nav-link-header {
        color: black; 
    }

    .navbar.scrolled .nav-link:hover {
        color: blue;
    }

    .navbar-brand span {
        margin: 0;
        padding: 5px 0;
        color: white;
    }

    .navbar-brand h1 {
        margin: 0;
        padding: 0;
    }
</style>

<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}" style="display: flex; align-items: center; text-decoration: none;">
            <img src="{{ asset('img/Logo_Paroki_Transparan.png') }}" alt="Logo" style="width: 50px; height: auto;">
            <span class="nav-link-header" style="margin-left: 10px;">
                <h1 class="h5" style="font-weight: bold">PAROKI ASAM BESAR</h1>
                <h1 class="h6">Gereja Santo Blasius</h1>
            </span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item pl-3 dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                        Profil
                    </a>
                    <ul class="dropdown-menu">
                        @foreach ($profile as $profil)
                            <li><a class="dropdown-item" href="{{ route('profilePage', strtolower($profil->title)) }}">{{ $profil->title }}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item pl-3">
                    <a class="nav-link" href="{{ route('renunganpage') }}">Renungan</a>
                </li>
                <li class="nav-item pl-3 dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                        Layanan
                    </a>
                    <ul class="dropdown-menu">
                        @foreach ($layanan as $layanan)
                            <li><a class="dropdown-item" href="{{ url(strtolower($layanan->title)) }}">{{ $layanan->title }}</a></li>  
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item pl-3">
                    <a class="nav-link" href="{{ route('kegiatanpage') }}">Kegiatan</a>
                </li>
                <li class="nav-item pl-3">
                    <a class="nav-link" href="{{ route('contact') }}">Kontak</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<script>
    document.addEventListener("scroll", function () {
        var navbar = document.querySelector(".navbar");
        if (window.scrollY > 200) {
            navbar.classList.add("scrolled");
        } else {
            navbar.classList.remove("scrolled");
        }
    });
</script>
