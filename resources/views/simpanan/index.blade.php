@extends('layouts.app')

@section('dashboard')
<div class="container-fluid">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{route('index.anggota')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">{{ route('index.anggota')}}</li>
      </ol>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <a class="btn btn-sm btn-primary" href="{{route('simpanan.create')}}">Tambah simpanan</a>
                    <a class="btn btn-sm btn-danger" href="{{route('home')}}">Kembali</a>
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
                <div class="table-responsive">
                @foreach($simpanan as $got)
                <form action="{{ route('simpanan.destroy', $got->id) }}">
                @endforeach
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                        <th>No</th>
                        <th>Nama Simpanan</th>
                        <th>Anggota</th>
                        <th>Tanggal Simpanan</th>
                        <th>Besar Simpanan</th>
                        <th>Keterangan</th>
                        @if(Auth::user()->role == 'ADMIN' || Auth::user()->role == 'PETUGAS' )
                        <th>Aksi</th>
                        <th>Select</th>
                        @endif
                        </tr>
                    </thead>
                        <tbody> 
                        <tr>
                        @if($simpanan->count() > 0)
                        @foreach($simpanan as $in)
                        <td>{{ (($simpanan->currentPage() -1) * $simpanan->perPage()) + $loop->iteration }}</td>
                        <td>{{ $in->nm_simpanan }}</td>
                        <td>{{ $in->member['name'] }}</td>
                        <td>{{ $in->tgl_simpanan }}</td>
                        <td>{{ $in->besar_simpanan }}</td>
                        <td>{{ $in->ket }}</td>
                        @if(Auth::user()->role == 'ADMIN' || Auth::user()->role == 'PETUGAS' )
                        <td>
                            <a href="{{ route('simpanan.edit', $in->id) }}">Edit</a>
                        </td>
                        <td>
                            <input style="margin-left:10px;" class="form-check-input" type="checkbox" value="{{$in->id}}" name="checked[]">
                        </td>
                        @endif
                    	</tr>
                        @endforeach
                        @endif
                        </tbody>
                    </table>

							<button class="btn btn-danger" type="submit">Hapus</button>
							</form>
                        <div class="text-center">{{$simpanan->render()}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
