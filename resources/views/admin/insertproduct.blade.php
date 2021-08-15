@extends('templates.template')
@extends('templates.partials.sidebar')
@section('content')
<div class="card card-danger">
    <div class="card-header">
      <h3 class="card-title">Input Produk</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('Produk.store') }}" method="post"  enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                @if (Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            @endif
                @if(session('errors'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Something it's wrong:
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                    </div>
                @endif
                <div class="form-group">
                    <label for=""><strong>Nama Produk</strong></label>
                    <input type="text" name="product_name" class="form-control" placeholder="Nama Produk">
                </div>
                <div class="form-group">
                    <label for=""><strong>Deskripsi</strong></label>
                    <textarea class="form-control" name="description"></textarea>
                </div>
                <div class="form-group">
                    <label for=""><strong>Harga</strong></label>
                    <input type="number" name="price" class="form-control" placeholder="Harga">
                </div>
                <div class="form-group">
                    <label for=""><strong>Gambar Produk</strong></label>
                    <input type="file" name="photo" class="form-control" placeholder="Gambar Produk">
                </div>
                <div class="form-group">
                    <label for=""><strong>Whatsapp</strong></label>
                    <input type="number" name="whatsapp" class="form-control" placeholder="nonor ini akan di gunakan untuk melakukan penesanan">
                </div>
                <div class="form-group">
                    <label for=""><strong>Tokopedia</strong></label>
                    <input type="url" name="tokopedia" class="form-control" placeholder="Link url Toko menuju branag anda">
                </div>
                <div class="form-group">
                    <label for=""><strong>shoppe</strong></label>
                    <input type="url" name="shoppe" class="form-control" placeholder="Link url Toko menuju branag anda">
                </div>
                <div class="form-group">
                    <label for=""><strong>bukalapak</strong></label>
                    <input type="url" name="bukalapak" class="form-control" placeholder="Link url Toko menuju branag anda">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-block">Tambah Barang</button>
                {{-- <p class="text-center">Sudah punya akun? <a href="{{ route('login') }}">Login</a> sekarang!</p> --}}
            </div>
            </form>
    </div>
    <!-- /.card-body -->
  </div>
@endsection