@extends('layouts.app')

@section('dashboard')
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{route('home')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">{{ route('index.pinjaman')}}</li>
      </ol>

                <a class="btn btn-secondary btn-sm mb-3" href="{{route('home')}}">Kembali</a>
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
                @if(session()->has('messageedit'))
                    <div class="alert alert-success">
                        {{ session()->get('messageedit') }}
                    </div>
                @endif
                @if(session()->has('messagehapus'))
                    <div class="alert alert-danger">
                        {{ session()->get('messagehapus') }}
                    </div>
                @endif
                @if(session()->has('messagehapusgagal'))
                    <div class="alert alert-danger">
                        {{ session()->get('messagehapusgagal') }}
                    </div>
                @endif
      <div class="row">
        <div class="col-12">
      <!-- Area Chart Example-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-area-chart"></i> Menu</div>
        <div class="card-body">
         <div class="table-responsive">
            @foreach($pinjaman as $got)
            <form action="{{route('pinjaman.destroy', $got->id)}}">
            @endforeach
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Nama Pinjaman</th>
                  <th>Anggota</th>
                  <th>Besar Pinjaman</th>
                  <th>Tgl Pinjaman</th>
                  <th>Tgl Pelunasan</th>
                  <th>Angsuran</th>
                  <th>Aksi</th>
                  <th>Select</th>
                </tr>
              </thead>
              <tbody>
                @foreach($pinjaman as $in)
                <tr>
                <td>{{ $in->nama_pinjaman }}</td>
                <td>{{ $in->anggota['nama'] }}</td>
                <td>{{ $in->besar_pinjaman }}</td>
                <td>{{ $in->tgl_pinjaman }}</td>
                <td>{{ $in->tgl_pelunasan }}</td>
                <td>{{ $in->id_angsuran }}</td>
                <td>
                    <a href="{{ route('pinjaman.edit', $in->id) }}">Edit</a>
                    <a href="{{ route('pinjaman.edit', $in->id) }}">Detail</a>
                </td>
                <td>
                    <input style="margin-left: 20px;" class="form-check-input" type="checkbox" value="{{$in->id}}" name="checked[]">
                </td>
                @endforeach
                </tr>
              </tbody>
            </table>
        <div class="card-footer small text-muted">Table Petugas
            <i class="fa fa-area-chart"></i>
            <a href="{{route('pinjaman.create')}}" class="btn btn-primary">Tambah data</a>
            <button type="submit" class="btn btn-danger">Hapus</button>
      </div>
        </form>
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

