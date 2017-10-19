@extends('layouts.app')

@section('dashboard')
@if(Auth::user()->role == 'ADMIN' || Auth::user()->role == 'PETUGAS')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <form method="POST" action="{{ route('simpanan.update', $simpanan->id) }}">
                        {{ csrf_field() }}
                      <div class="form-group">
                        <label for="nama">Nama Simpanan</label>
                        <input type="text" name='nm_simpanan' class="form-control" id="nama" aria-describedby="nama" placeholder="Nama Simpanan" value="{{$simpanan->nm_simpanan}}">
                      </div>
                      <div class="form-group">
                        <label for="alamat">Anggota</label>
                        <select class="form-control" name="id_anggota">                        
                        @foreach($anggota as $in)
                        	<option value="{{ $in->id }}" @if(($simpanan->id_anggota)==($in->id)) selected @endif>{{ $in->nama }}</option>
                        @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="tgl_lahir">Tanggal Simpanan</label>
                        <input type="date" name='tgl_simpanan' class="form-control" id="tgl_lahir" aria-describedby="emailHelp" placeholder="Tanggal Simpanan" value="{{$simpanan->tgl_simpanan}}">
                      </div>
                      <div class="form-group">
                        <label for="tmp_lhr">Besar Simpanan</label>
                        <input type="text" name='besar_simpanan'  class="form-control" id="tmp_lhr" placeholder="Besar Simpanan" value="{{$simpanan->besar_simpanan}}">
                      </div>
                      <div class="form-group">
                        <label for="no_tlp">Keterangan</label>
                        <input type="text" name="ket" class="form-control" id="no_tlp" placeholder="Keterangan" value="{{$simpanan->ket}}">
                      </div>
                      <button type="submit" class="btn btn-primary">Tambah Simpanan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@else
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="cars card-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                  You're not authorized to access this page!
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endsection

