@extends('templates.template')
@extends('templates.partials.sidebar')
@extends('templates.partials.cardcss')
@section('content')
<div class="row">

  @foreach ($products as $product)
  <div class="col-sm-4">
        <div class="card" style="width: 18rem;">
            <img src="{{ asset('storage/'.$product->photo) }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{ $product->product_name }}</h5>
                <p class="card-text">{{ $product->description }}</p>
                <h5 class="card-title">Rp.{{ $product->price }},-</h5>
                <p class="card-text"><a href="{{ "https://wa.me/" . $product->whatsapp . "?text=Saya%20ingin%20memesan%20%0A".$product->product_name."%0A%0ATolong%20kirimkan%20ke%20alamat%3A%0A"}}">whatsapp</a></p>
                <p class="card-text"><a href="{{ $product->tokopedia }}">tokopedia</a></p>
                <p class="card-text"><a href="{{ $product->bukalapak }}">bukalapak</a></p>
                <p class="card-text"><a href="{{ $product->shopee }}">shopee</a></p>
                <center>
                <a href="{{route('Produk.edit', [$product->id])}}" class="btn btn-primary">update</a>
                <form id="alert" class="d-inline" action="{{route('Produk.destroy', [$product->id])}}" method="POST">
                    @csrf
                  <input type="hidden" name="_method" value="DELETE">
                  <input type="button" onclick="sweetAlert()" value="Delete" class="btn btn-danger">
                </form>
                {{-- <a href="" class="btn btn-danger">Delete</a> --}}
                </center>
            </div>
          </div>
  </div>
        @endforeach
</div>
{{$products->links()}}
<script type="text/javascript">

  function sweetAlert() 
  {  
    Swal.fire({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!'
   }).then((result) => {
    if (result.value) {
     Swal.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
      )
      $('#alert').submit();
    }
   })
  }

</script>

@endsection
