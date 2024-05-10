@php
    $route= Route::current()->getName();
@endphp

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon">
            <img style="width: 50px" src="{{ asset('img/Logo_Paroki_Transparan.png') }}" alt="">
        </div>
        <div class="sidebar-brand-text mx-2">Paroki Asam Besar</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{$route=='dashboard' ? 'active' : ''}}">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class='bx bxs-dashboard'></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Menu
    </div>

    <!-- Nav Item -->
    <li class="nav-item {{$route=='user' ? 'active' : ''}}">
        <a class="nav-link" href="#">
            <i class='bx bx-user'></i>
            <span>Kelola Pengguna</span></a>
    </li>

    <li class="nav-item {{$route=='upload.image' ? 'active' : ''}}">
        <a class="nav-link" href="#">
            <i class='bx bxs-cloud-upload'></i>
            <span>Upload Image</span></a>
    </li>

    <li class="nav-item {{$route=='pengumuman' ? 'active' : ''}}">
        <a class="nav-link" href="#">
            <i class='bx bx-message-detail'></i>
            <span>Pengumuman</span></a>
    </li>

    <li class="nav-item {{$route=='renungan' ? 'active' : ''}}">
        <a class="nav-link" href="#">
            <i class='bx bxs-book-open'></i>
            <span>Renungan</span></a>
    </li>

    <li class="nav-item {{$route=='kegiatan' ? 'active' : ''}}">
        <a class="nav-link" href="#">
            <i class='bx bxs-calendar'></i>
            <span>Kegiatan</span></a>
    </li>

    <hr class="sidebar-divider d-none d-md-block">

    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>