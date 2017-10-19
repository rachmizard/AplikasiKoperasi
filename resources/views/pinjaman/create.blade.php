@extends('layouts.app')

@section('dashboard')
<div class="container-fluid">
  <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{route('index.pinjaman')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">{{ route('pinjaman.create')}}</li>
  </ol>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        	<div class="card mb-3">
		        <div class="card-header">
		          <i class="fa fa-area-chart"></i> Tambah pinjaman</div>
            <div class="card-body">
                <div class="panel-body">
                    <form method="POST" action="{{ route('pinjaman.store') }}">
                        {{ csrf_field() }}
                      <div class="form-group">
                        <label for="nama">Nama Pinjaman</label>
                        <input type="text" name='nama_pinjaman' class="form-control" id="nama" aria-describedby="nama" placeholder="Nama pinjaman">
                      </div>
                      <div class="form-group">
                      	<label for="anggota">Anggota</label>
                        <select name="id_anggota" class="form-control" id="anggota">
                        	<option value="">--ANGGOTA--</option>
                        	@foreach($anggota as $in)
                        	<option value="{{ $in->id }}">{{ $in->nama }}</option>
                        	@endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="besar_pinjaman">Besar Pinjaman</label>
                        <input type="text" name='besar_pinjaman' class="form-control" id="besar_pinjaman" aria-describedby="emailHelp" placeholder="Besar Pinjaman">
                      </div>
                      <div class="form-group">
                        <label for="tmp_pengajuan">Tanggal Pengajuan Peminjaman</label>
                        <input type="date" name='tgl_pengajuan_peminjaman'  class="form-control" id="tmp_pengajuan" placeholder="Tanggal Pengajuan Pinjaman">
                      </div>
                      <div class="form-group">
                        <label for="tmp_acc">Tanggal Konfirmasi Peminjaman</label>
                        <input type="date" name='tgl_acc_peminjaman'  class="form-control" id="tmp_acc" placeholder="Tanggal Konfirmasi Pinjaman">
                      </div>
                      <div class="form-group">
                        <label for="tmp_pinjam">Tanggal Pinjaman</label>
                        <input type="date" name='tgl_pinjaman'  class="form-control" id="tmp_pinjam" placeholder="Tanggal Pinjaman ">
                      </div>
                      <div class="form-group">
                        <label for="tmp_pelunasan">Tanggal Pelunasan</label>
                        <input type="date" name='tgl_pelunasan'  class="form-control" id="tmp_pelunasan" placeholder="Tanggal Pelunasan Pinjaman">
                      </div>
                      <div class="form-group">
                        <label for="angsuran">Angsuran</label>
                        <input type="text" name="id_angsuran" class="form-control" id="angsuran" placeholder="Angsuran">
                      </div>
                      <div class="form-group">
                        <select name="ket" class="form-control" id="">
                        	<option value="">--KETERANGAN--</option>
                        	<option value="PENDING">Pending</option>
                        	<option value="LUNAS">Lunas</option>
                        </select>
                      </div>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
