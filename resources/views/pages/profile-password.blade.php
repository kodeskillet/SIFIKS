@extends('layouts.admin-profile')

@section('admin-content')
    <div class="box box-primary">
        <form action="{{ route('admin.password.edit.submit', $data[session('guard')]->id) }}" method="POST">
            @csrf
            <div class="box-header with-border">
                <strong class="box-title">Ubah Password</strong>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="col-md-12 form-group">
                            <label for="old">Password Lama</label>
                            <input id="old" type="password" name="old_password" class="form-control">
                            @if($errors->has('old_password'))
                                <div class="text-danger text-bold">
                                    <i>*{{ $errors->first('old_password') }}</i>
                                </div>
                            @endif
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="new">Password Baru</label>
                            <input id="new" type="password" name="new_password" class="form-control">
                            @if($errors->has('new_password'))
                                <div class="text-danger text-bold">
                                    <i>*{{ $errors->first('new_password') }}</i>
                                </div>
                            @endif
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="new_conf">Konfirmasi Password</label>
                            <input id="new_conf" type="text" name="password_confirmation" class="form-control">
                            @if($errors->has('password_confirmation'))
                                <div class="text-danger text-bold">
                                    <i>*{{ $errors->first('password_confirmation') }}</i>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <br><br>
            <div class="box-footer">
                <div class="col-md-4 col-md-offset-4">
                    <input type="hidden" name="_method" value="PUT">
                    <button type="submit" class="btn btn-success form-control"><strong>Simpan</strong></button>
                </div>
            </div>
        </form>
    </div>
@endsection

