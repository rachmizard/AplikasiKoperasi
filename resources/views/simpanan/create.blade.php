@extends('layouts.app')

@section('dashboard')
<div class="container">
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
                    <form method="POST" action="{{ route('simpanan.store') }}">
                        {{ csrf_field() }}
                      <div class="form-group">
                        <label for="nama">Nama Simpanan</label>
                        <input type="text" name='nm_simpanan' class="form-control" id="nama" aria-describedby="nama" placeholder="Nama Simpanan">
                      </div>
                      <div class="form-group">
                        <label for="alamat">Anggota</label>
                        <select class="form-control" name="id_anggota" id="alamat">
                          @foreach($anggota as $in)
                          <option value="{{ $in->id }}">{{ $in->nama }}</option>
                          @endforeach
                        </select>
                      <div class="form-group">
                        <label for="tgl_lahir">Tanggal Simpanan</label>
                        <input type="date" name='tgl_simpanan' class="form-control" id="tgl_lahir" aria-describedby="emailHelp" placeholder="Tanggal Simpanan">
                      </div>
                      <div class="form-group">
                        <label for="tmp_lhr">Besar Simpanan</label>
                        <input type="text" name='besar_simpanan'  class="form-control" id="tmp_lhr" placeholder="Besar Simpanan">
                      </div>
                      <div class="form-group">
                        <label for="no_tlp">Keterangan</label>
                        <input type="text" name="ket" class="form-control" id="no_tlp" placeholder="Keterangan">
                      </div>
                      <button type="submit" class="btn btn-primary">Tambah Simpanan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
