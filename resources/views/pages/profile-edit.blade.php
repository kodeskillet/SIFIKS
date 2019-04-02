@extends('layouts.admin-profile')

@section('admin-content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <strong class="box-title">Edit Profil</strong>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label for="image">Foto Profil</label>
                    <div class="col-md-12 form-group">
                        <div class="col-md-4">
                            <div style="width: 121px; height: 121px; border: 1px solid #ddd">
                                <img id="prev" class="img-responsive" src="{{ asset('storage/user_images/user-default.jpg') }}">
                            </div>
                            <button type="button" class="btn btn-danger btn-sm" style="width: 121px">Hapus Foto</button>
                        </div>
                        <div class="col-md-6">
                            <input id="image" type="file">
                        </div>
                    </div>
                    <div class="col-md-12 form-group">
                        <label for="email">E-Mail</label>
                        <input id="email" type="text" class="form-control" value="{{ $data[session('guard')]->email }}">
                    </div>
                    <div class="col-md-12 form-group">
                        <label for="name">Nama</label>
                        <input id="name" type="text" class="form-control" value="{{ $data[session('guard')]->name }}">
                    </div>
                </div>
            </div>
        </div>
        <br><br>
        <div class="box-footer">
            <div class="col-md-4 col-md-offset-4">
                <button type="button" class="btn btn-success form-control"><strong>Simpan</strong></button>
            </div>
        </div>
    </div>
@endsection
