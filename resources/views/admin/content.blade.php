@extends('templates.template')
@extends('templates.partials.sidebar')
@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">

        <!-- /.card-header -->

        <!-- /.card-body -->
      </div>
      <!-- /.card -->

      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Content Halaman Landing Page</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @if (Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif
          <table id="example1" class="table table-striped table-bordered table-responsive">
            <thead>
              <tr>
                <!-- <th>Rendering engine</th> -->
                <!-- <th>Profile</th> -->
                <th>Email</th>
                <th>No TLP</th>
                <th>Alamat</th>
                <th>No WA</th>
                <th>Facebook</th>
                <th>Instagram</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
             @foreach ($contents as $item)
                 
             
                <tr>
                  <!-- <td>Trident</td> -->
                  <!-- <td> -->

                  <!-- </td> -->
                  <td>
                    {{ $item->email }}
                  </td>
                  <td>
                    {{ $item->telephone }}
                  </td>
                  <td>
                    {{ $item->address }}

                  </td>
                  <td>
                    {{ $item->whatsapp }}
                  </td>
                  <td>
                    {{ $item->facebook }}
                  </td>
                  <td>
                    {{ $item->instagram }}

                  </td>
                  <td>
                    {{-- <button id="updatedata" type="button" class="btn btn-primary float-lg-left mr-1" 
                    data-idhalaman="{{ $item->id }}" data-toggle="modal" data-target="#exampleModal" data-profile="{{ $item->profile }}" 
                        data-notlp="{{ $item->telephone }}" 
                        data-email="{{ $item->email }}" 
                        data-alamat="{{ $item->address }}" 
                        data-wa="{{ $item->whatsapp }}" 
                        data-facebook="{{ $item->facebook }}" 
                        data-instagram="{{ $item->instagram }}">Update</button> --}}
                    <a class="btn btn-primary" href="updateContent/{{ $item->id }}">Update Data</a>
                  </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
              <tr>
                <!-- <th>Rendering engine</th> -->
                <!-- <th>Profile</th> -->
                <th>Email</th>
                <th>No TLP</th>
                <th>Alamat</th>
                <th>No WA</th>
                <th>Facebook</th>
                <th>Instagram</th>
                <th>Aksi</th>
              </tr>

            </tfoot>
          </table>
        </div>
        {{-- {{ $contents->links() }} --}}
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
 
  <script src="{{ asset('assets/wilayah/content.js') }}">

</script>
@endsection