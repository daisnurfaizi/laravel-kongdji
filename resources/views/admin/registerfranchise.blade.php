@extends('templates.template')
@extends('templates.partials.sidebar')
@section('content')
<div class="card card-success">
    <div class="card-header">
      <h3 class="card-title">Franchise</h3>
    </div>
    <div class="card-body">
      <form action="{{ route('FranchiseAction.store') }}" method="POST">
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
        <input class="form-control form-control-lg" type="text" placeholder="Nama Toko" name="name" required>
        <br>
        <label>Nama Pemilik</label>
        <input class="form-control " type="text" placeholder="Nama Pemilik" name="owner" required>
        <div class="form-group">
          <label>Pilih Provinsi</label>
          <select id="form_prov" class="form-control select2 select2-danger" name="province" data-dropdown-css-class="select2-danger" required style="width: 100%;">
            <option selected="selected">--Pilih Provinsi--</option>
           @foreach ($provinsi as $item)
           <option value="{{ $item->code }}/{{ $item->name }}">{{ $item->name }}</option>
           @endforeach
          </select>

        </div>
        <div class="form-group">
          <label id="kabupaten">Pilih Kabupaten</label>

          <select id="form_kab" class="form-control select2 select2-danger" name="district" required data-dropdown-css-class="select2-danger" style="width: 100%;">
            <input type="hidden" id="hidenkab" name="hidenkab">

          </select>
        </div>
        <div class="form-group">
          <label id="kecamatan">Pilih Kecamatan</label>

          <select id="form_kec" class="form-control select2 select2-danger" name="subdistrict">
            <input type="hidden" id="hidenkec" name="hidenkec">

          </select>
        </div>
        <div class="form-group">
          <label id="desa">Pilih Desa</label>
          <select id="form_des" class="form-control select2 select2-danger" name="village" required data-dropdown-css-class="select2-danger" style="width: 100%;">
          </select>
        </div>
        <div class="form-group">
          <label>Alamat Lengkap</label>
          <input class="form-control" required type="text" name="address" placeholder="address">
        </div>
        <br>
        <div class="form-group">
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
    <!-- /.card-body -->
  </div>
  <script src="{{asset('assets/wilayah/wilayah.js')}}">
</script>
@endsection