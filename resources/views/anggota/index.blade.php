@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <a href="{{route('anggota.create')}}">Tambah data</a>
                    <a href="{{route('home')}}">Kembali</a>
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
                    <table class="table">
                        <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Tanggal Lahir</th>
                        <th>Tempat Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>Status</th>
                        <th>No Telepon</th>
                        <th>Aksi</th>
                        </tr>
                        <tbody> 
                        @if($anggota->count() > 0)
                        @foreach($anggota as $in)
                        <td>{{ (($anggota->currentPage() -1) * $anggota->perPage()) + $loop->iteration }}</td>
                        <td>{{ $in->nama }}</td>
                        <td>{{ $in->alamat }}</td>
                        <td>{{ $in->tgl_lhr }}</td>
                        <td>{{ $in->tmp_lahir }}</td>
                        <td>{{ $in->j_kelamin }}</td>
                        <td>{{ $in->status }}</td>
                        <td>{{ $in->no_tlp }}</td>
                        <td>
                            <a href="{{ route('anggota.edit', $in->id) }}">Edit</a>
                            <a href="{{ route('anggota.destroy', $in->id) }}">Hapus</a>
                        </td>
                        @endforeach
                        @endif
                        </tbody>
                    </table>
                        <div class="text-center">{{$anggota->render()}}</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
