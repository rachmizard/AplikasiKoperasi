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
                  <th>Email</th>
                  <th>Password</th>
                  <th>Role</th>
                  <th>Aksi</th>
                  <th>Select</th>
                </tr>
              </thead>
              <tbody>
                @foreach($anggota as $in)
                <tr>
                <td>{{ $in->name }}</td>
                <td>{{ $in->email }}</td>
                <td>{{ $in->password }}</td>
                <td>{{ $in->role }}</td>
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
@endsection

