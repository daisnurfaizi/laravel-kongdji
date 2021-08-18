@extends('templates.template')
@extends('templates.partials.sidebar')
@section('content')

<!-- Small boxes (Stat box) -->
<div class="row">
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-info">
      <div class="inner">
        <h3>{{ $countproduk }}</h3>

        <p>Produk</p>
      </div>
      <div class="icon">
        <i class="ion ion-bag"></i>
      </div>
      <a href="{{ route('dataproduk') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->

  <!-- ./col -->
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-warning">
      <div class="inner">
        <h3>{{ $countuser }}</h3>

        <p>User Registrations</p>
      </div>
      <div class="icon">
        <i class="ion ion-person-add"></i>
      </div>
      <a href="{{ route('showUser') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-danger">
      <div class="inner">
        <h3>{{ $countfranchise }}</h3>

        <p>Franchise</p>
      </div>
      <div class="icon">
        <i class="ion ion-pie-graph"></i>
      </div>
      <a href="{{ route('listfranchise') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
</div>
<!-- /.row -->
<!-- Main row -->
<div class="alert alert-primary" role="alert">
  <h4 class="alert-heading">Menu Content Pages</h4>
  <p>Di dalam menu tersebut terdapat fitur</p>
  <hr>
  <p class="mb-0">1. Untuk merubah isi dari halaman landing page</p>
  <p class="mb-0">Merubah Isi seperti no telepon,alamat yang nantinya akan tampil di halaman landing page</p>
  <hr>
</div>
<div class="alert alert-danger" role="alert">
  <h4 class="alert-heading">Rules untuk upluad data produk!</h4>
  <hr>
  <p class="mb-0">1. Pastikan gambar anda tidak melebihi ukuran dari 3mb ini di tabasi agar halaman website anda tidak lemot di akses dari client dengn koneksi rendah</p>
  <hr>
  <p class="mb-0">2. Pastikan format gambar yang anda upload untuk produk mengunakan .JPG,.JPEG,.PNG apa bila tidak maka data gambar tidak akan di upload</p>
  <hr>
  <p class="mb-0">3. Isi field toko online dengan link produk anda yang ada di toko online karana link itu yang akan di gunakan untuk redirect langsung ke halaman toko online</p>
</div>
<div class="container-fluid">
  <div class="alert alert-success" role="alert">
    <h4 class="alert-heading">Franchise</h4>
    <p>Pada table terdapat data franchise yang merupakan halaman dashboard Data Franchise dimana anda dapat melakukan edit dan delete data. Pada Franchise yang telah anda input</p>
    <hr>
    <p class="mb-0">1. Tombol update berfungsi untuk melakukan update data Franchise anda</p>
    <hr>
    <p class="mb-0">2. Tombol delete berfungsi untuk menghapus Franchise anda</p>
  </div>
  <!-- /.row (main row) -->

  @endsection