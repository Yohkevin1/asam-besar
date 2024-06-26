<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SPWPAB | Login</title>
    <link rel="icon" href="{{ asset('img/Logo_Paroki_Transparan.png')}}">
    <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
</head>

<body class="bg-gradient-light">
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Sistem Pengelolaan Website <br> Paroki Asam Besar</h1>
                                    </div>
                                    @if(Session::has('error'))
                                        <div class="alert alert-danger text-center" role="alert">
                                            {{ Session::get('error') }}
                                        </div>
                                    @endif
                                    <form action="{{ route('login') }}" method="POST" class="user">
                                        @csrf
                                        <div class="form-group">
                                            <input id="email" name="email" type="email" class="form-control form-control-user" placeholder="Masukkan Email" oninput="enableSubmitButton()">
                                        </div>
                                        <div class="form-group">
                                            <input id="password" name="password" type="password" class="form-control form-control-user" placeholder="Kata Sandi" oninput="enableSubmitButton()">
                                        </div>
                                        <button type="submit" id="submitBtn" class="btn btn-primary btn-user btn-block" disabled>Masuk</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('vendor/jquery/jquery.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>
    <script src="{{asset('js/sb-admin-2.js')}}"></script>
    <script>
        function enableSubmitButton() {
            var email = document.getElementById("email").value;
            var password = document.getElementById("password").value;
            var submitBtn = document.getElementById("submitBtn");
            
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            
            if (emailRegex.test(email) && password.length > 0) {
                submitBtn.disabled = false;
            } else {
                submitBtn.disabled = true;
            }
        }
    </script>
</body>

</html>