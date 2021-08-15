<!-- <!doctype html> -->
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <!-- <LInk rel="stylesheet" href="{{asset('assets/kongdjie/')}}css/bootstrap.css"> -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"> -->
  <LInk rel="stylesheet" href="{{asset('assets/kongdjie/css/style2.css')}}">
  <link rel="icon" type="image/png" href="{{asset('assets/kongdjie/img/logo.png')}}">
  <!-- ini dari bulut -->
  <style>
    #more {
      display: none;
    }
  </style>
  <script scr="{{asset('assets/kongdjie/js/jquery-3.6.0.min.js')}}">
  </script>

  <title>Kong Djie Coffe!</title>
</head>

<body>
  <!-- navbar -->
  <div class="logatas">
    <img src="{{asset('assets/kongdjie/img/logo.png')}}">
    <p>CV. KONDJIE HAMPARAN RASA</p>
  </div>
  <nav class="navbar navbar-expand-lg navbar-light sticky-top" style="z-index: 2;">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav mx-auto">
          <a class="nav-link" href="{{ route('customer') }}">home</a>
          <a class="nav-link" href="{{ route('customer') }}/#profile">profile</a>
          <a class="nav-link" href="#product">product</a>
          <a class="nav-link" href="{{ route('customer') }}/#All">franchise</a>
          <a class="nav-link" href="{{ route('customer') }}/#about1">about</a>
          <a class="nav-link" href="{{ route('customer') }}/#location">location</a>
          <a class="nav-link" href="{{ route('customer') }}/#contact">Contact</a>
        </div>
      </div>
    </div>
  </nav>
  <!-- akhir navbar -->


  <!-- Jumbotron Header  -->
  <section class="home" id="home">
    <div class="jumbotron jumbotron-fluid">
      <div class="container text-center">
        <div class="row">
          <div class="col-sm-12">
            <img src="{{asset('assets/kongdjie/img/LogoKongDjieHome.png')}}" alt="Logo-KongDjie">
          </div>
        </div>

        <div class="row justify-content-between info1">
          <div class="col-md-4 ">
            <p> <strong> Ingin Bermitra <br> Klik : </strong> </p>
            <a href="#All" class="btn btn-home "> Join Us </a>
          </div>
          <div class="col-md-4">
            <p> <strong> <br> </strong> </p>
            <a href="" class="btn btn-home ">About</a>
          </div>
        </div>
        <div class="container mt-3">
          <div class="row row-cols-3 row-cols-lg-3 g-2 g-lg-3">
            <div class="col">
              <a href="#"><img src="{{asset('assets/kongdjie/img/0111-instagram.png')}}" alt="instagram-Logo" class="instagram"></a>
            </div>
            <div class="col">
              <h4> Kongdjie Office </h4>
            </div>
            <div class="col">
              <a href="#"><img src="{{asset('assets/kongdjie/img/031-facebook.png')}}" alt="Facebook-Logo" class="facebook"></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Akhir Header -->

  <!-- Profile  -->

  <!-- Akhir Profile -->

  <!-- Product -->
  @yield('content')


  <!-- Akhir Product -->

  <!-- Franchise -->
  
  <!-- Akhir Franchise -->

  <!-- ABOUT -->
  
  
  <!-- Akhir Produk -->

  <!-- Location -->
  
  <!-- Akhit Location -->

  <!-- Contact  -->
  <section class="contact" id="contact">
    <div class="container">
      <div class="row">
        <div class="col-md-5">
          <div class="contact1">
            <img src="{{asset('assets/kongdjie/img/pin-512.png')}}" alt="Maps-Logo" class="float-left">
            <p>{{ $profile[0]->address }}</p>
          </div>
          <div class="contact1">
            <img src="{{asset('assets/kongdjie/img/email.png')}}" alt="Email-Logo" class="float-left" id="email">
            <p>{{ $profile[0]->email }}</p>
          </div>
          <div class="contact1">
            <img src="{{asset('assets/kongdjie/img/PHONE.png')}}" alt="Phone-Logo" class="float-left">
            <p>({{ $profile[0]->telephone }})</p>
          </div>
          <div class="contact1">
            <img src="{{asset('assets/kongdjie/img/003-whatsapp.png')}}" alt="WhatsApp" class="float-left">
            <p>({{ $profile[0]->whatsapp }})</p>
          </div>
        </div>

        <div class="col-md-2">
          <div class="contactmid">
            {{-- <a href="#home">HOME</a>
            <a href="#profile">PROFILE</a>
            <a href="#product">PRODUK</a>
            <a href="#franchise">FRANCHISE</a>
            <a href="#about1">ABOUT</a>
            <a href="#location">LOCATION</a>
            <a href="#contact">CONTACT</a> --}}
          </div>
        </div>

        <div class="col-md-5 text-center">
          <div class="sertifikat">
            <p>SERTIFIKAT</p>
            <div class="box">
              <img src="{{asset('assets/kongdjie/img/100PERSERN.png')}}" alt="100%-Indonesia" id="100indo">
              <img src="{{asset('assets/kongdjie/img/mui.png')}}" alt="MUI" id="mui">
              <img src="{{asset('assets/kongdjie/img/VPOM.png')}}" alt="BPOM" id="bpom">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer1">
      <h4> &copy; Copyright2021 <br> Make With &hearts; by KongDjieCoffee </h4>
    </div>
  </section>
  <!--Akhir Contact  -->




  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <!-- <script src="{{asset('assets/kongdjie/')}}https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script> -->
  <!-- <script> -->
  <script scr="{{asset('kongdjie/js/KongDjie1.js')}}">
  </script>


  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
</body>

</html>