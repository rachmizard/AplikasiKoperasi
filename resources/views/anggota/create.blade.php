@extends('layouts.app')
@section('dashboard')
@if(Auth::user()->role == 'ADMIN')
<div class="container-fluid">
  <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{route('index.anggota')}}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">{{ route('anggota.create')}}</li>
  </ol>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard tambah User Anggota</div>

                <div class="panel-body">
                    <form method="POST" action="{{ route('anggota.store') }}">
                        {{ csrf_field() }}
                      <div class="form-group">
                        <label for="nama">Nama anggota</label>
                        <input type="text" name='name' class="form-control" id="nama" aria-describedby="nama" placeholder="Nama">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your name with anyone else.</small>
                      </div>
                      <div class="form-group">
                        <label for="email">Email anggota</label>
                        <input type="email" name='email' class="form-control" id="email" placeholder="Email">
                      </div>
                      <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name='password' class="form-control" id="password" placeholder="Password">
                      </div>
                      <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" name='alamat' class="form-control" id="alamat" placeholder="Alamat">
                      </div>
                      <div class="form-group">
                        <label for="tgl_lahir">Tanggal Lahir</label>
                        <input type="date" name='tgl_lhr' class="form-control" id="tgl_lahir" aria-describedby="emailHelp" placeholder="Tanggal Lahir">
                      </div>
                      <div class="form-group">
                        <label for="tmp_lhr">Tempat Lahir</label>
                        <input type="text" name='tmp_lahir'  class="form-control" id="tmp_lhr" placeholder="Tempat Lahir">
                      </div>
                      <div class="form-group">
                        <label for="j_kel">Jenis Kelamin</label>
                        <select class="form-control custom-select" name='j_kelamin' id="j_kel">
                            <option value="" disabled="">--Jenis Kelamin--</option>
                            <option value="pria">Pria</option>
                            <option value="wanita">Wanita</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" class="form-control custom-select" id="status">
                            <option value="">--Status--</option>
                            <option value="Pelajar">Pelajar</option>
                            <option value="Mahasiswa">Mahasiswa</option>
                            <option value="Pekerja">Pekerja</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="no_tlp">No-telepon</label>
                        <input type="text" name="no_tlp" class="form-control" id="no_tlp" placeholder="No-Telepon">
                      </div>
                      <div class="form-group">
                        <label for="role">Role</label>
                        <select name="role" class="form-control custom-select" id="role">
                            <option value="">--ROLE--</option>
                            <option value="ANGGOTA">ANGGOTA</option>
                        </select>
                      </div>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@else
You're not authorized to access this page!
@endif
@endsection
