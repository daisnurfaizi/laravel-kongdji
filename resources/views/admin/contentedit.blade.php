@extends('templates.template')
@extends('templates.partials.sidebar')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="text-center">Form Content Halaman</h3>
    </div>
    <form action="{{ route('updateHalaman.update',$contents->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="card-body">
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
            <label for=""><strong>Profile</strong></label>
            <textarea name="profile" class="form-control" placeholder="isi prifile content">
                {{ $contents->profile }}
            </textarea>
        </div>
        <div class="form-group">
            <label for=""><strong>Email</strong></label>
            <input type="email" name="email" value="{{ $contents->email }}" class="form-control" placeholder="Email">
        </div>
        <div class="form-group">
            <label for=""><strong>Telepon</strong></label>
            <input type="number" name="telephone" value="{{ $contents->telephone }}" class="form-control" placeholder="Telephone">
        </div>
        <div class="form-group">
            <label for=""><strong>Alamat</strong></label>
            <textarea name="address" class="form-control">
                {{ $contents->address }}
            </textarea>
        </div>
        <div class="form-group">
            <label for=""><strong>Whatsapp</strong></label>
            <input type="number" name="whatsapp" value="{{ $contents->whatsapp }}" class="form-control" placeholder="whatsapp">
        </div>
        <div class="form-group">
            <label for=""><strong>Facebook</strong></label>
            <input type="text" name="facebook" value="{{ $contents->facebook }}" class="form-control" placeholder="Link Facebook">
        </div>
        <div class="form-group">
            <label for=""><strong>Instagram</strong></label>
            <input type="text" name="instagram" value="{{ $contents->instagram }}"class="form-control" placeholder="Link Instagram">
        </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary btn-block">Update</button>
    </div>
    </form>
</div>
@endsection