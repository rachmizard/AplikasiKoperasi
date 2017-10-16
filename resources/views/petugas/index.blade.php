@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <a href="{{route('petugas.create')}}">Tambah petugas</a>
                    <a href="{{route('home')}}">Kembali</a>
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
                @can('undelete-a-user')
				<a href="{{ route('petugas.restore', $petugas->id) }}" class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip"
				    data-original-title="Undelete">
				    <i class="icon wb-refresh" aria-hidden="true"></i>
				</a>
				@endcan
                    <table class="table">
                        <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>No-telepon</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>Aksi</th>
                        </tr>
                        <tbody> 
                        <tr>
                        @if($petugas->count() > 0)
                        @foreach($petugas as $in)
                        <td>{{ (($petugas->currentPage() -1) * $petugas->perPage()) + $loop->iteration }}</td>
                        <td>{{ $in->nama }}</td>
                        <td>{{ $in->alamat }}</td>
                        <td>{{ $in->no_tlp }}</td>
                        <td>{{ $in->tmp_lhr }}</td>
                        <td>{{ $in->tgl_lhr }}</td>
                        <td>
                            <a href="{{ route('petugas.edit', $in->id) }}">Edit</a>
                            <a href="{{ route('petugas.destroy', $in->id) }}">Hapus</a>
                        </td>
                    	</tr>
                        @endforeach
                        @endif
                        </tbody>
                    </table>
                        <div class="text-center">{{$petugas->render()}}</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
