<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    {{-- <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button> --}}

    <a class="d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}" style="text-decoration: none">
        <div class="sidebar-brand-icon">
            <img style="width: 50px" src="{{ asset('img/Logo_Paroki_Transparan.png') }}" alt="">
        </div>
        <div class="ml-2">
            <h1 id="judul" class="h3 mb-0" style="color: black;">@yield('judul')</h1>
        </div>
    </a>

    <ul class="navbar-nav ml-auto">
        <div class="topbar-divider d-none d-sm-block"></div>
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{session('user.name')}}</span>
                <img class="img-profile rounded-circle" src="{{session('foto')??asset('img/undraw_profile.svg')}}">
            </a>
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#profileModal">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                </a>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#resetPassModal">
                    <i class='bx bxs-key bx-flip-horizontal mr-2 text-gray-400'></i>
                    Reset Password
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
            </div>
        </li>

    </ul>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" style="color: black">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Yakin ingin keluar?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih "Logout" di bawah ini jika Anda siap untuk mengakhiri sesi Anda.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="{{ route('logout') }}">Logout</a>
                </div>
            </div>
        </div>
    </div>

    {{-- Profile Modal --}}
    <div class="modal fade" id="profileModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable  modal-dialog-centered modal-lg">
            <div class="modal-content"style="max-width: 90%; margin: 0 auto;">
                <div class="modal-header bg-gradient-primary justify-content-center" style="background-color: ">
                    <h4 class="modal-title" style="color: white">Profile </h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-5">
                            <img src="{{session('foto')??asset('img/undraw_profile.svg')}}" alt="Foto Profil" class="img-fluid rounded-circle">
                        </div>
                        <div class="col-md-7" style="color: black">
                            <div style="margin-bottom: 10px">
                                <h5>Nama Lengkap</h5>
                                <input type="text" class="form-control" value="<?= session('user.name') ?>" readonly>
                            </div>
                            <div style="margin-bottom: 10px">
                                <h5>Email</h5>
                                <input type="email" class="form-control" value="<?= session('user.email') ?>" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Reset Pass Modal --}}
    <div class="modal fade" id="resetPassModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg">
            <div class="modal-content" style="max-width: 90%; margin: 0 auto;">
                <div class="modal-header bg-gradient-primary justify-content-center">
                    <h4 class="modal-title" style="color: white">Reset Password</h4>
                </div>
                <div class="modal-body text-dark">
                    <form action="{{ route('resetMyPassword', encrypt(session('user.id')))}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div style="margin-bottom: 10px">
                                    <label class="form-label" for="newPassword">Password Baru</label>
                                    <input type="password" class="form-control" name="newPassword" placeholder="Masukkan password baru" required>
                                </div>
                                <div style="margin-bottom: 10px">
                                    <label class="form-label" for="confirmPassword">Konfirmasi Password Baru</label>
                                    <input type="password" class="form-control" name="confirmPassword" placeholder="Masukkan ulang password baru" required>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Reset Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</nav>