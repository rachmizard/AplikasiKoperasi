@extends('layouts.app')

@section('dashboard')
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.html">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Blank Page</li>
      </ol>
      <!-- Admin redirect -->
      @if(Auth::user()->role == 'ADMIN')
      <div class="row">
        <div class="col-12">
      <!-- Area Chart Example-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-area-chart"></i> Menu</div>
        <div class="card-body">
              <div class="col-xl-12 col-sm-6 mb-3">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-group"></i>
              </div>
              <div class="mr-5">Anggota!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="{{route('index.anggota')}}">
              <span class="float-left">View Table!</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-12 col-sm-6 mb-3">
          <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-user"></i>
              </div>
              <div class="mr-5">Petugas koperasi!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="{{route('index.petugas')}}">
              <span class="float-left">View Table!</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-12 col-sm-6 mb-3">
          <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-money"></i>
              </div>
              <div class="mr-5">Simpanan!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="{{route('index.simpanan')}}">
              <span class="float-left">View Table!</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-12 col-sm-6 mb-3">
          <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-hand"></i>
              </div>
              <div class="mr-5">Pinjaman!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="{{route('index.pinjaman')}}">
              <span class="float-left">View Table!</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>


        </div>
      </div>
      @elseif(Auth::user()->role == 'ANGGOTA')
        <div class="col-xl-12 col-sm-6 mb-3">
          <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-money"></i>
              </div>
              <div class="mr-5">Simpanan!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="{{route('index.simpanan')}}">
              <span class="float-left">View Table!</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-12 col-sm-6 mb-3">
          <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-hand"></i>
              </div>
              <div class="mr-5">Pinjaman!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="{{route('index.pinjaman')}}">
              <span class="float-left">View Table!</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
      @elseif(Auth::user()->role == 'Not Activated')
      You're access was blocked, please permission to Admin to active your account!
      @else
      You're banned!
      @endif
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Your Website 2017</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
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
                {{csrf_field()}}
            <button class="btn btn-secondary" type="submit">Logout</button>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection