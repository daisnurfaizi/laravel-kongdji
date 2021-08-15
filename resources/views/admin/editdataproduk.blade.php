@extends('templates.template')
@extends('templates.partials.sidebar')
@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Update Produk</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{ route('Produk.update',[$product->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Nama Produk</label>
          <input type="text" class="form-control" id="exampleInputEmail" placeholder="Nama Produk" name="product_name" value="{{ $product->product_name  }}" required>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Harga</label>
          <input type="number" required step="1" min="1" max="99999999" maxlength="7" value="{{ $product->price }}" inputmode="numeric" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" class="form-control" id="exampleInputPassword1" placeholder="Harga" name="price">
        </div>
        <div class="form-group">
          <div class="form-group">
            <label for=""><strong>Gambar Produk</strong></label>
            <input type="file" name="photo" class="form-control" required placeholder="Gambar Produk">
          </div>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Deskripsi</label>
          <textarea name="description"  required id="deskripsi" class="form-control">
            {{ $product->description }}
          </textarea>
          <!-- <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Deskripsi" name="deskripsi"> -->
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Tokopedia</label>
          <textarea name="tokopedia" id="tokopedia" class="form-control">
              {{ $product->tokopedia }}
          </textarea>
          <!-- <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Deskripsi" name="deskripsi"> -->
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Shoppe</label>
          <textarea name="shoppe" id="shopee" class="form-control">
              {{ $product->shopee }}
          </textarea>
          <!-- <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Deskripsi" name="deskripsi"> -->
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Bukalapak</label>
          <textarea name="bukalapak" id="bukalapak" class="form-control">
              {{ $product->bukalapak }}
          </textarea>
          <!-- <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Deskripsi" name="deskripsi"> -->
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Nomor Whatsapp </label>
          <!-- <textarea name="link" id="link" class="form-control"></textarea> -->
          <input type="number" value="{{ $product->whatsapp }}" required step="1" min="1" max="9999999999999" maxlength="13" inputmode="numeric" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" class="form-control" id="exampleInputPassword1" placeholder="nomor wa" name="whatsapp">
          <!-- <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Deskripsi" name="deskripsi"> -->
        </div>
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
@endsection