@extends('customer.template')
@section('content')

<section class="location" id="location">
    
    <div class="container text-center ">
      <h3 class="display-4">Info lokasi mitra kongdjie coffee</h3>
      <div class="row backlok justify-content-center">
        <div class="col">
            <table class="table table-hover table-warning mt-3">
                <thead>
                    <tr>
                      <th scope="col">Nama</th>
                      <th scope="col">Alamat</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($franchises as $item)
                      <tr>
                          <td>{{ $item->name }}</td>
                          <td>{{ "$item->address $item->village $item->subdistrict $item->district $item->province" }}</td>
                        </tr>
                        @endforeach
                    </tbody>
              </table>
              {{ $franchises->links('pagination::bootstrap-4')  }}

              <div class="container mt-5">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered dt-responsive nowrap">
                        
                    </table>
                </div>
            </div>
        </div>
      </div>
        
        <div class="row tekswilayah justify-content-center" >
            
        </div>
      {{-- </div> --}}
    </div>
   
  </section>  

  

@endsection
