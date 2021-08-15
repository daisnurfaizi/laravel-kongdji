@section('sidebar')
    
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
      <li class="nav-header">MENU</li>
      <li class="nav-item">
        <a href="{{ route('content') }}" class="nav-link">
          <i class="nav-icon fas fa-book"></i>
          <p>
            Content Pages
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon ion ion-bag"></i>
          <p>
            Produk
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{ route('insertproduct') }}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Insert Produk</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('dataproduk') }}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Data Produk</p>
            </a>
          </li>
        </ul>
      </li>
      
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon ion ion-pie-graph"></i>
          <p>
              Franchise
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{ route('RegisFranchise') }}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Insert Franchise</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('listfranchise') }}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Data Franchise</p>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon ion ion-person-add"></i>
          <p>
            User
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{ route('register') }} "class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Regis User</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('showUser') }}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Data User</p>
            </a>
          </li>
        </ul>
      </li>
      
    
    </ul>
  </nav>
@endsection
