@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <a href="{{route('simpanan.create')}}">Tambah simpanan</a>
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
                @if(session()->has('messagehapusgagal'))
                    <div class="alert alert-danger">
                        {{ session()->get('messagehapusgagal') }}
                    </div>
                @endif
                @foreach($simpanan as $got)
                <form action="{{ route('simpanan.destroy', $got->id) }}">
                @endforeach
                    <table class="table">
                        <tr>
                        <th>No</th>
                        <th>Nama Simpanan</th>
                        <th>Anggota</th>
                        <th>Tanggal Simpanan</th>
                        <th>Besar Simpanan</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                        </tr>
                        <tbody> 
                        <tr>
                        @if($simpanan->count() > 0)
                        @foreach($simpanan as $in)
                        <td>{{ (($simpanan->currentPage() -1) * $simpanan->perPage()) + $loop->iteration }}</td>
                        <td>{{ $in->nm_simpanan }}</td>
                        <td>{{ $in->anggota['nama'] }}</td>
                        <td>{{ $in->tgl_simpanan }}</td>
                        <td>{{ $in->besar_simpanan }}</td>
                        <td>{{ $in->ket }}</td>
                        <td>
                            <a href="{{ route('simpanan.edit', $in->id) }}">Edit</a>
							<input class="form-check-input" type="checkbox" value="{{$in->id}}" name="checked[]">
                        </td>
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
@endsection
