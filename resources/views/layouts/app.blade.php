<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Koperasi</title>
  <!-- Bootstrap core CSS-->
  <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="{{asset('vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="{{asset('css/sb-admin.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('vendor/datatables/dataTables.bootstrap4.css')}}">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="{{route('index.anggota')}}">Koperasi</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    @if(Auth::user()->role == 'ADMIN')
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="{{route('home')}}">
            <i class="fa fa-fw fa-home"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Data</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <li>
              <a href="{{ route('index.anggota') }}"><i class="fa fa-fw fa-group"></i> Anggota</a>
            </li>
            <li>
              <a href="{{route('index.petugas')}}"><i class="fa fa-fw fa-user"></i> Petugas Koperasi</a>
            </li>
            <li>
              <a href="{{route('index.simpanan')}}"><i class="fa fa-fw fa-money"></i> Simpanan</a>
            </li>

            <li>
              <a href="{{route('index.pinjaman')}}"><i class="fa fa-fw fa-money"></i> Pinjaman</a>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseAdd" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-plus-circle"></i>
            <span class="nav-link-text">Tambah data</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseAdd">
            <li>
              <a href="{{ route('anggota.create') }}"><i class="fa fa-fw fa-plus-circle"></i> Tambah Anggota</a>
            </li>
            <li>
              <a href="{{route('petugas.create')}}"><i class="fa fa-fw fa-plus-circle"></i> Tambah Petugas Koperasi</a>
            </li>
            <li>
              <a href="{{route('simpanan.create')}}"><i class="fa fa-fw fa-plus-circle"></i> Tambah Simpanan</a>
            </li>
            <li>
              <a href="{{route('pinjaman.create')}}"><i class="fa fa-fw fa-plus-circle"></i> Tambah Pinjaman</a>
            </li>
          </ul>
        </li>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> {{ Auth::user()->name }}
            <i class="fa fa-fw fa-user"></i>
          </a>
          <div class="dropdown-menu" aria-labelledby="messagesDropdown">
            <h6 class="dropdown-header">Account:</h6>
            <div class="dropdown-divider"></div>
            @if(Auth::user()->role == 'ADMIN')
            <a class="dropdown-item" href="#">
              <strong>Welcome, you're logged in as Admin !</strong>
            </a>
            @else
            <a class="dropdown-item" href="#">
              <strong>Welcome, you're logged in as Anggota ! {{ Auth::user()->email }}</strong>
            </a>
            @endif
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" data-toggle="modal" href="#" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
        <li class="nav-item">
        </li>
      </ul>
    </div>
    @elseif(Auth::user()->role == 'ANGGOTA')
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="{{route('home')}}">
            <i class="fa fa-fw fa-home"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Data</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <li>
              <a href="{{route('index.simpanan')}}"><i class="fa fa-fw fa-money"></i> Simpanan</a>
            </li>
            <li>
              <a href="{{route('index.pinjaman')}}"><i class="fa fa-fw fa-money"></i> Pinjaman</a>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseAdd" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-plus-circle"></i>
            <span class="nav-link-text">Tambah data</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseAdd">
            <li>
              <a href="{{route('simpanan.create')}}"><i class="fa fa-fw fa-plus-circle"></i> Tambah Simpanan</a>
            </li>
            <li>
              <a href="{{route('pinjaman.create')}}"><i class="fa fa-fw fa-plus-circle"></i> Tambah Pinjaman</a>
            </li>
          </ul>
        </li>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> {{ Auth::user()->name }}
            <i class="fa fa-fw fa-user"></i>
          </a>
          <div class="dropdown-menu" aria-labelledby="messagesDropdown">
            <h6 class="dropdown-header">Account:</h6>
            <div class="dropdown-divider"></div>
            @if(Auth::user()->role == 'ADMIN')
            <a class="dropdown-item" href="#">
              <strong>Welcome, you're logged in as Admin !</strong>
            </a>
            @else
            <a class="dropdown-item" href="#">
              <strong>Welcome, you're logged in as Anggota ! {{ Auth::user()->email }}</strong>
            </a>
            @endif
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" data-toggle="modal" href="#" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
        <li class="nav-item">
        </li>
      </ul>
    </div>
    @else
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="{{route('home')}}">
            <i class="fa fa-fw fa-home"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> {{ Auth::user()->name }}
            <i class="fa fa-fw fa-user"></i>
          </a>
          <div class="dropdown-menu" aria-labelledby="messagesDropdown">
            <h6 class="dropdown-header">Account:</h6>
            <div class="dropdown-divider"></div>
            @if(Auth::user()->role == 'ADMIN')
            <a class="dropdown-item" href="#">
              <strong>Welcome, you're logged in as Admin !</strong>
            </a>
            @else
            <a class="dropdown-item" href="#">
              <strong>Welcome, you're logged in as Anggota ! {{ Auth::user()->email }}</strong>
            </a>
            @endif
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" data-toggle="modal" href="#" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
        <li class="nav-item">
        </li>
      </ul>
    </div>
    @endif
  </nav>
<div class="content-wrapper">
  @yield('dashboard')

</div>

    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <form action="{{route('logout')}}" method="POST">
                {{!! csrf_field() !!}}
            <button class="btn btn-secondary" type="submit">Logout</button>
            </form>
          </div>
        </div>
      </div>
    </div>
<!-- Bootstrap core JavaScript--><!-- Bootstrap core JavaScript-->
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/popper/popper.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- Core plugin JavaScript-->
    <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>
    <!-- Page level plugin JavaScript-->
    <script src="{{asset('vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('vendor/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('vendor/datatables/dataTables.bootstrap4.js')}}"></script>
    <!-- Custom scripts for all pages-->
    <script src="{{asset('js/sb-admin.min.js')}}"></script>
    <!-- Custom scripts for this page-->
    <script src="{{asset('js/sb-admin-datatables.min.js')}}"></script>
    <script src="{{asset('js/sb-admin-charts.min.js')}}"></script>
</body>

</html>
