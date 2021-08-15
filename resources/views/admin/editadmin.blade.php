@extends('templates.template')
@extends('templates.partials.sidebar')
@section('content')
<div class="card card-danger">
    <div class="card-header">
      <h3 class="card-title">Input User</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('UserAction.update',[$User->id]) }}" method="post">
            @csrf
            @method('PUT')
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
                    <label for=""><strong>Nama Lengkap</strong></label>
                    <input type="text" name="name" class="form-control" value="{{ $User->name }}" placeholder="Nama Lengkap">
                </div>
                <div class="form-group">
                    <label for=""><strong>Username</strong></label>
                    <input type="text" name="username" value="{{ $User->username }}" class="form-control" placeholder="Username">
                </div>
                <div class="form-group">
                    <label for=""><strong>Email</strong></label>
                    <input type="text" name="email" value="{{ $User->email }}" class="form-control" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for=""><strong>Password</strong></label>
                    <input type="password" name="password" class="form-control" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for=""><strong>Konfirmasi Password</strong></label>
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Password">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-block">Update</button>
                {{-- <p class="text-center">Sudah punya akun? <a href="{{ route('login') }}">Login</a> sekarang!</p> --}}
            </div>
            </form>
    </div>
    <!-- /.card-body -->
  </div>
@endsection