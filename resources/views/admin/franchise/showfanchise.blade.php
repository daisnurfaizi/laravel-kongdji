@extends('templates.template')
@extends('templates.partials.sidebar')
@extends('templates.partials.cardcss')
@section('content')
<div class="card-body">
  @if (Session::has('success'))
  <div class="alert alert-success">
      {{ Session::get('success') }}
  </div>
  @endif
</div>
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
<table class="table table-responsive">
    <thead class="table-dark">
      <th>Owner</th>
      <th>Franchise Name</th>
      <th>Provinsi</th>
      <th>Alamat</th>
      <th>To Do</th>
      <th></th>
    </thead>
    <tbody>
        @foreach ($franchises as $franchise)
            <tr>
                <td>{{ $franchise->owner }}</td>
                <td>{{ $franchise->name }}</td>
                <td>{{ $franchise->province }}</td>
                <td>{{ $franchise->province." ".
                $franchise->district." ".
                $franchise->subdistrict." ".
                $franchise->village." ".
                $franchise->address }}</td>
                <td colspan="2">
                  <a href="{{route('FranchiseAction.edit', [$franchise->id])}}" class="btn btn-primary">Update</a>
                  <form id="alert" class="d-inline" action="{{route('FranchiseAction.destroy', [$franchise->id])}}" method="POST">
                    @csrf
                  <input type="hidden" name="_method" value="DELETE">
                  <input type="button" onclick="sweetAlert()" value="Delete" class="btn btn-danger">
                </form>
                </td>
            </tr>
        @endforeach
    </tbody>
  </table>
  {{ $franchises->links('pagination::bootstrap-4') }}
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