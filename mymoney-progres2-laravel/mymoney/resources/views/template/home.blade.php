<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{url('tampilan/css/bootstrap.css')}}">

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@100;200;300;400;500&family=Playfair+Display:wght@400;500&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="{{url('tampilan/css/style.css')}}">
    <title>{{ config('app.name', 'EAD') }} | @yield('title')</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light ">
        <div class="container">
            <a class="navbar-brand" href="{{url('/')}}">
                <img src="{{url('tampilan/img/logo.svg')}}" width="160" class="d-inline-block align-top" alt="" loading="lazy">

            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                <div class="navbar-nav">

                    <a class="nav-link mr-5" href="{{route('dashboard.topup')}}">Topup</a>
                    <a class="nav-link mr-5" href="{{route('dashboard.transfer')}}">Transfer</a>
                    <a class="nav-link mr-5" href="{{route('dashboard.riwayat')}}">Riwayat</a>
                    <a style="font-weight: 200;" class="px-4 mr-4 login btn btn-md btn-primary" href="{{url('login')}}">Login</a>
                    <a style="font-weight: 200;" class="px-4 btn register btn-md btn-outline-primary" href="{{url('register')}}">Register</a>


                </div>
            </div>
        </div>
    </nav>

    <!-- Halaman Utama -->
    <div class="container">
        @yield('content')
    </div>
    <footer>
        <div class="container">
            <hr class="w-100">
            <div class="footer mb-5 d-flex align-items-center justify-content-center">
                <img src="img/logo.svg" width="100px" class="img-fluid" alt="">
                <p class="d-flex">Copyright Mymoney 2020</p>
            </div>
        </div>
    </footer>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
</body>

</html>