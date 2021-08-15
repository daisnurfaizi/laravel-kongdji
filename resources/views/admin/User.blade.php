@extends('templates.template')
@extends('templates.partials.sidebar')
@extends('templates.partials.cardcss')
@section('content')
<div class="container">
<table class="table table-striped table-hover">
    <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nama</th>
          <th scope="col">Username</th>
          <th scope="col">Email</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($Users as $user)      
          <tr>
              <th scope="row"></th>
              <td>{{ $user->name }}</td>
              <td>{{ $user->username }}</td>
              <td>{{ $user->email }}</td>
              <td>
                <a href="{{route('UserAction.edit', [$user->id])}}" class="btn btn-primary">Update</a>
                <form id="alert" class="d-inline" action="{{route('UserAction.destroy', [$user->id])}}" method="POST">
                    @csrf
                  <input type="hidden" name="_method" value="DELETE">
                  <input type="button" onclick="sweetAlert()" value="Delete" class="btn btn-danger">
                </form>
              </td>
        </tr>
            @endforeach
        </tbody>
  </table>
  
        {{ $Users->links('pagination::bootstrap-4') }}
    
</div>
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