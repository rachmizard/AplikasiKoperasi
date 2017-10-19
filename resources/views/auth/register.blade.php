<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }}">
                            <label for="alamat" class="col-md-4 control-label">Alamat</label>

                            <div class="col-md-6">
                                <input id="alamat" type="text" class="form-control" name="alamat" required>

                                @if ($errors->has('alamat'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('alamat') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('tgl_lhr') ? ' has-error' : '' }}">
                            <label for="alamat" class="col-md-4 control-label">Tanggal Lahir</label>

                            <div class="col-md-6">
                                <input id="tgl_lhr" type="date" class="form-control" name="tgl_lhr" required>

                                @if ($errors->has('tgl_lahir'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tgl_lahir') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('tmp_lahir') ? ' has-error' : '' }}">
                            <label for="tmp_lahir" class="col-md-4 control-label">Tempat Lahir</label>

                            <div class="col-md-6">
                                <input id="tmp_lahir" type="text" class="form-control" name="tmp_lahir" required>

                                @if ($errors->has('tmp_lahir'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tmp_lahir') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('j_kelamin') ? ' has-error' : '' }}">
                            <label for="j_kelamin" class="col-md-4 control-label">Jenis Kelamin</label>

                            <div class="col-md-6">
                                <select name="j_kelamin" id="">
                                    <option value="Pria">Pria</option>
                                    <option value="Wanita">Wanita</option>
                                </select>

                                @if ($errors->has('j_kelamin'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('j_kelamin') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                            <label for="j_kelamin" class="col-md-4 control-label">Status</label>

                            <div class="col-md-6">
                                <select name="status" id="">
                                    <option value="Pekerja">Pekerja</option>
                                    <option value="Mahasiswa">Mahasiswa</option>
                                </select>

                                @if ($errors->has('status'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('no_tlp') ? ' has-error' : '' }}">
                            <label for="no_tlp" class="col-md-4 control-label">No Telepon</label>

                            <div class="col-md-6">
                                <input id="no_tlp" type="text" class="form-control" name="no_tlp" required>

                                @if ($errors->has('no_tlp'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('no_tlp') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <input type="hidden" name='role' value="Not Activated">
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
