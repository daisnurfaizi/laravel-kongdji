@extends('templates.template')
@extends('templates.partials.sidebar')
@section('content')
<div class="card card-success">
    <div class="card-header">
      <h3 class="card-title">Franchise</h3>
    </div>
    <div class="card-body">
      <form action="{{ route('FranchiseAction.update',[$Franchises->id]) }}" method="POST">
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
        <input class="form-control form-control-lg" type="text" placeholder="Nama Toko" value="{{ $Franchises->name }}" name="name" required>
        <br>
        <label>Nama Pemilik</label>
        <input class="form-control " type="text" value="{{ $Franchises->owner }}" placeholder="Nama Pemilik" name="owner" required>
        <div class="form-group">
          <label>Pilih Provinsi</label>
          <select id="form_prov" class="form-control select2 select2-danger" name="province" data-dropdown-css-class="select2-danger" required style="width: 100%;">
            <option selected="selected">{{ $Franchises->province }}</option>
           @foreach ($provinsi as $item)
           <option value="{{ $item->code }}/{{ $item->name }}">{{ $item->name }}</option>
           @endforeach
          </select>

        </div>
        <div class="form-group">
          <label id="kabupaten">Pilih Kabupaten</label>

          <select id="form_kab" class="form-control select2 select2-danger" name="district" required data-dropdown-css-class="select2-danger" style="width: 100%;">
            <option selected="selected">{{ $Franchises->district }}</option>
            <input type="hidden" id="hidenkab" name="hidenkab">

          </select>
        </div>
        <div class="form-group">
          <label id="kecamatan">Pilih Kecamatan</label>

          <select id="form_kec" class="form-control select2 select2-danger" name="subdistrict">
            <option selected="selected">{{ $Franchises->subdistrict }}</option>

            <input type="hidden" id="hidenkec" name="hidenkec">

          </select>
        </div>
        <div class="form-group">
          <label id="desa">Pilih Desa</label>
          <select id="form_des" class="form-control select2 select2-danger" name="village" required data-dropdown-css-class="select2-danger" style="width: 100%;">
            <option selected="selected">{{ $Franchises->village }}</option>
          
        </select>
        </div>
        <div class="form-group">
          <label>Alamat Lengkap</label>
          <textarea class="form-control" name="address" required>
            {{ $Franchises->address }}
          </textarea>
        </div>
        <br>
        <div class="form-group">
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
    <!-- /.card-body -->
  </div>
<script>
    var baseurl = window.location.origin;
 $(document).ready(function() {
    // sembunyikan form kabupaten, kecamatan dan desa
    // $("#form_kab").hide();
    // $("#form_kec").hide();
    // $("#form_des").hide();
    // $("#kabupaten").hide();
    // $("#kecamatan").hide();
    // $("#desa").hide();

    // ambil data kabupaten ketika data memilih provinsi
    $('body').on("change", "#form_prov", function() {
      // $('#form_prov').change(function() {
      var id = $(this).val();
      var text = $("#form_prov option:selected").text()
      var daerah = id.split("/")
      console.log(text)
      // $("#form_kab").show();

      // var data = id;
      $.ajax({
        type: 'GET',
        url: baseurl+"/District/"+text,
        dataType: 'json',
        data: {
          code: daerah[0]
        },
        success: function(hasil) {
          // console.log(daerah)
          $("#form_kab").html(hasil);
          $("#kabupaten").show();
          $("#form_kab").show();
          $('#form_kab').append(`<option value="" selected="selected">--Pilih Kabupaten--</option>`);
          $.each(hasil, function(i, item) {
            // console.log(item.nama)

            $('#form_kab').append('<option value=' + item.code + '/' + item.name + '>' + item.name + '</option>');
          })
          $("#form_kec").hide();
          $("#form_des").hide();
        }
      });
    });

    // ambil data kecamatan/kota ketika data memilih kabupaten
    $('body').on("change", "#form_kab", function() {
      var id = $(this).val();
      var text = $("#form_kab option:selected").text()
      var daerahkecamatan = id.split("/")
      $("#hidenkab").val(text)
      console.log(text)
      // console.log(id)
      $.ajax({
        type: 'GET',
        url: baseurl+"/Subdistrict/"+text,
        dataType: 'json',
        data: {
          code: daerahkecamatan[0]
        },
        success: function(kecamatan) {
          // console.log(id)
          $("#form_kec").html(kecamatan);
          $("#kecamatan").show();
          $("#form_kec").show();
          $('#form_kec').append(`<option value="" selected="selected">--Pilih Kecamatan--</option>`);
          $.each(kecamatan, function(i, item) {
            // console.log(item.nama)
            $('#form_kec').append('<option  value=' + item.code + '/' + item.name + '>' + item.name + '</option>');
          })
          $("#form_des").hide();
        }
      });
    });

    // ambil data desa ketika data memilih kecamatan/kota
    $('body').on("change", "#form_kec", function() {
      var id = $(this).val();
      var text = $("#form_kec option:selected").text()
      var daerah = id.split("/")
      // $("#hidenkab").val(text)
      var village = daerah[0].split(".")
      // console.log(id)
      var join = village[0]+"."+village[1]
      $.ajax({
        type: 'GET',
        url: baseurl+"/Village/"+text,
        dataType: 'json',
        data: {
          code: join
        },
        success: function(desa) {
          $("#form_des").html(desa);
          // console.log(item)
          $("#desa").show();

          $("#form_des").show();
          $('#form_des').append(`<option value="" selected="selected">--Pilih Desa--</option>`);

          $.each(desa, function(i, item) {
            // console.log(item)
            $('#form_des').append('<option value=' + item.code + '/' + item.name + '>' + item.name + '</option>');
          })
        }
      });
    });


  });

</script>
@endsection