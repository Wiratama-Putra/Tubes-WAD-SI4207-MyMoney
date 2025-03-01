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
    <title>My Money</title>
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
                <ul class="navbar-nav">
                @auth
                  <li class="nav-item">
                      <a class="nav-link mr-5" href="{{route('dashboard.saldo.topup')}}">Topup</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link mr-5" href="{{route('dashboard.saldo.transfer')}}">Transfer</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link mr-5" href="{{route('dashboard.saldo.riwayat')}}">Riwayat</a>
                  </li>
                  <li class="nav-item">
                      <a style="font-weight: 200;" class="px-4 mr-4 login btn btn-md btn-primary" href="{{route('dashboard.index')}}">Dashboard</a>
                  </li>
                  @else
                  <li class="nav-item">
                      <a style="font-weight: 200;" class="px-4 mr-4 btn btn-md btn-primary" href="{{url('login')}}"> Login</a>
                  </li>
                  <li class="nav-item">
                      <a style="font-weight: 200;" class="px-4 btn btn-md btn-outline-primary" href="{{url('register')}}">Register</a>
                  </li>
                @endauth
              </ul>
            </div>
        </div>
    </nav>

    <!-- Halaman Utama -->
    <section>
        <div class="container">
            <div class="row mt-5">
                <div class="col-md-6 d-flex">
                    <div class="main-text align-self-center">
                        <div class="content">
                            <div class="box"></div>
                            <h1>Belanja kapanpun dan dimanapun
                            </h1>


                        </div>
                        <a style="font-weight: 200;position: relative;" class="px-4 mr-4 login mt-5 btn btn-md btn-primary" href="{{url('login')}}">Mulai Transaksi</a>
                        <p class="mt-5"> <b>|</b> Kalau ada yang praktis, kenapa harus ribet?</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="justify-content-center">
                        <img src="{{url('tampilan/img/main.svg')}}" alt="" class="img-fluid">
                    </div>
                </div>
            </div>

        </div>
    </section>
    <section style="margin-top: 30vh;margin-bottom: 30vh;">
        <div class="container">
            <div class="row">

                <div class="col-md-6">
                    <img src="{{url('tampilan/img/page2.svg')}}" class="img-fluid" alt="">
                </div>
                <div class="col-md-6">
                    <div class="main-text w-100 d-flex justify-content-center">
                        <div class="content">
                            <div class="box"></div>
                            <h1>Dua langkah menuju kemudahan berbelanja
                            </h1>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <div class="container">
            <hr class="w-100">
            <div class="footer mb-5 d-flex align-items-center justify-content-center">
                <img src="img/logo.svg" width="100px" class="img-fluid" alt="">
                <p class="d-flex">Copyright &copy; Mymoney 2020</p>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>
