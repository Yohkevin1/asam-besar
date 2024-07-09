@extends('backend.layout.main')
@section('title', 'SPWPAB | Dashboard')
@section('keywords', 'Sistem Pengelolaan Website Paroki Asam Besar, Paroki, Asam Besar, Paroki Asam Besar, Sistem Pengelolaan, Website, SPWPAB')
@section('description', 'Sistem Pengelolaan Website Paroki Asam Besar')
@section('judul', 'Paroki Asam Besar')

@section('content')
<div class="row">
    <div class="col-lg-12 text-center">
        <h2 class="h3 mb-4">Selamat Datang di <br> Sistem Pengelolaan Website Paroki Asam Besar</h2>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Menu Admin</h6>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    
                </ul>
                <div class="row">
                    <div class="col-md-6">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <a href="{{ route('imgCollection') }}" class="btn btn-primary btn-block">
                                    <i class="fas fa-upload"></i> Upload Gambar Header
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('pengguna') }}" class="btn btn-primary btn-block">
                                    <i class="fas fa-users"></i> Kelola Pengguna
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('pengumuman') }}" class="btn btn-primary btn-block">
                                    <i class="fas fa-bullhorn"></i> Kelola Pengumuman
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('renungan') }}" class="btn btn-primary btn-block">
                                    <i class="fas fa-book"></i> Kelola Renungan
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <a href="{{ route('profile') }}" class="btn btn-primary btn-block">
                                    <i class="fa-solid fa-church"></i> Kelola Profile Paroki
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('kegiatan') }}" class="btn btn-primary btn-block">
                                    <i class="fas fa-calendar-alt"></i> Kelola Kegiatan
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('layanan') }}" class="btn btn-primary btn-block">
                                    <i class="fas fa-pray"></i> Kelola Layanan
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('pernikahan') }}" class="btn btn-primary btn-block">
                                    <i class="fas fa-ring"></i> Kelola Pernikahan
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-12">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <a href="{{ route('gallery') }}" class="btn btn-primary btn-block">
                                    <i class="fa-solid fa-photo-film"></i> Kelola Galeri
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
