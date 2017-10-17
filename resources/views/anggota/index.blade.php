@extends('layouts.app')

@section('dashboard')
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{route('index.anggota')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">{{ route('index.anggota')}}</li>
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
            @foreach($anggota as $got)
            <form action="{{route('anggota.destroy', $got->id)}}">
            @endforeach
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Nama</th>
                  <th>Alamat</th>
                  <th>Tanggal Lahir</th>
                  <th>Tempat lahir</th>
                  <th>Jenis Kelamin</th>
                  <th>Status</th>
                  <th>No telepon</th>
                  <th>Aksi</th>
                  <th>Select</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Nama</th>
                  <th>Alamat</th>
                  <th>Tanggal Lahir</th>
                  <th>Tempat lahir</th>
                  <th>Jenis Kelamin</th>
                  <th>Status</th>
                  <th>No telepon</th>
                  <th>Aksi</th>
                  <th>Select</th>
                </tr>
              </tfoot>
              <tbody>
                @foreach($anggota as $in)
                <tr>
                <td>{{ $in->nama }}</td>
                <td>{{ $in->alamat }}</td>
                <td>{{ $in->tgl_lhr }}</td>
                <td>{{ $in->tmp_lahir }}</td>
                <td>{{ $in->j_kelamin }}</td>
                <td>{{ $in->status }}</td>
                <td>{{ $in->no_tlp }}</td>
                <td>
                    <a href="{{ route('anggota.edit', $in->id) }}">Edit</a>
                </td>
                <td>
                    <input style="margin-left: 20px;" class="form-check-input" type="checkbox" value="{{$in->id}}" name="checked[]">
                </td>
                @endforeach
                </tr>
              </tbody>
            </table>
        <div class="card-footer small text-muted">Table Anggota
            <i class="fa fa-area-chart"></i>
            <a href="{{route('anggota.create')}}" class="btn btn-primary">Tambah data</a>
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

