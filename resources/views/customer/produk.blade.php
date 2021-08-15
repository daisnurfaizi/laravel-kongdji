@extends('customer.template')
@section('content')
    
<section class="product" id="product">
    <div class="container text-center">
      <div class="row">
        @foreach ($products as $product)
        <div class="col produk">
          <div class="card">
            <img src="{{ asset('storage/'.$product->photo) }}"class="card-img-top" alt="Gayo-Coffee">
            <div class="card-body">
              <h5 class="card-title">{{ $product->product_name }}</h5>
              <p class="card-text"> Rp. {{ $product->price  }} ,- </p>
            </div>
            <div class="card-footer">
              <a  href="{{ "https://wa.me/" . $product->whatsapp . "?text=Saya%20ingin%20memesan%20%0A".$product->product_name."%0A%0ATolong%20kirimkan%20ke%20alamat%3A%0A"}}">Whastapp</a>
              <a  href="{{$product->tokopedia }}">Tokopedia</a>
              <a  href="{{$product->shopee}}">Shopee</a>
              <a  href="{{$product->bukalapak}}">Bukalapak</a>

            </div>
          </div>
        </div>
        @endforeach
      </div>
      {{ $products->links('pagination::bootstrap-4')  }}
</div>
</section>
@endsection
