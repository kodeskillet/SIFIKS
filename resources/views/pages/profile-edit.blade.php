@extends('layouts.admin-profile')

@section('admin-content')
    <div class="box box-primary">
        <form
            @if(Auth::guard('admin')->check())
                action="{{ route('admin.profile.edit.submit', $data['admin']->id) }}"
            @elseif(Auth::guard('doctor')->check())
                action="{{ route('doctor.profile.edit.submit', $data['doctor']->id) }}"
            @endif
            method="POST" enctype="multipart/form-data"
        >
            @csrf
            <div class="box-header with-border">
                <strong class="box-title">Edit Profil</strong>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label for="image">Foto Profil</label>
                        <div class="col-md-12 form-group">
                            <div class="col-md-4">
                                <div style="width: 121px; height: 121px; border: 1px solid #ddd">
                                    <img id="preview" class="img-responsive" src="{{ asset('storage/user_images/'.$data[session('guard')]->profile_picture) }}">
                                </div>
                                @if($data[session('guard')]->profile_picture != "user-default.jpg")
                                    <a href="{{ route('admin.image.remove') }}" class="btn btn-danger btn-sm" style="width: 121px">Hapus Foto</a>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <input id="image" type="file" name="profile_picture" accept="image/*" onchange="previewImage(this)">
                                @if($errors->has('profile_picture'))
                                    <div class="text-danger text-bold">
                                        <i>*{{ $errors->first('profile_picture') }}</i>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12 form-group">
                            <hr>
                            <label for="email">E-Mail</label>
                            <input id="email" type="text" name="email" class="form-control" value="{{ $data[session('guard')]->email }}">
                            @if($errors->has('email'))
                                <div class="text-danger text-bold">
                                    <i>*{{ $errors->first('email') }}</i>
                                </div>
                            @endif
                        </div>
                        <div class="col-md-12 form-group">
                            <label for="name">Nama</label>
                            <input id="name" type="text" name="name" class="form-control" value="{{ $data[session('guard')]->name }}">
                            @if($errors->has('name'))
                                <div class="text-danger text-bold">
                                    <i>*{{ $errors->first('name') }}</i>
                                </div>
                            @endif
                        </div>
                        @auth('doctor')
                            <div class="col-md-12 form-group">
                                <label>Jenis Kelamin</label>
                                <div class="row col-md-12">
                                    <label class="radio-inline">
                                        <input type="radio" name="gender" value="Laki - laki"
                                            {{ $data['doctor']->gender == "Laki - laki" ? 'checked' : ''}}
                                        >
                                        Laki - laki
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="gender" value="Perempuan"
                                            {{ $data['doctor']->gender == "Perempuan" ? 'checked' : ''}}
                                        >
                                        Perempuan
                                    </label>
                                    @if($errors->has('city_id'))
                                        <div class="text-danger text-bold">
                                            {{$errors->first('city_id')}}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="city_id">Regional</label>
                                {{ Form::select(
                                    'city_id',
                                    $data['cities'],
                                    $data['doctor']->city_id,
                                    [
                                        'id' => 'city_id',
                                        'class' => 'form-control',
                                        'placeholder' => '-- Pilih Kota --'
                                    ]
                                )}}
                                @if($errors->has('city_id'))
                                    <div class="text-danger text-bold">
                                        {{$errors->first('city_id')}}
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="specialization_id">Spesialisasi</label>
                                {{ Form::select(
                                    'specialization_id',
                                    $data['specialization'],
                                    $data['doctor']->specialization_id,
                                    [
                                        'id' => 'specialization_id' ,
                                        'class' => 'form-control',
                                        'placeholder' => '-- Pilih Spesialisasi --'
                                    ]
                                )}}
                                @if($errors->has('specialization_id'))
                                    <div class="text-danger text-bold">
                                        {{$errors->first('specialization_id')}}
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="biography">Biografi</label>
                                <textarea id="biography" name="biography" class="form-control" placeholder="Ceritakan tentang diri anda...">{{ $data['doctor']->biography }}</textarea>
                                @if($errors->has('biography'))
                                    <div class="text-danger text-bold">
                                        {{$errors->first('biography')}}
                                    </div>
                                @endif
                            </div>
                        @endauth
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

    <script type="text/javascript">
        function previewImage(input) {
            let preview = document.getElementById('preview');
            if (input.files && input.files[0]) {
                let reader = new FileReader();
                reader.onload = function (e) {
                    preview.setAttribute('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            } else {
                preview.setAttribute('src', 'placeholder.png');
            }
        }
    </script>
@endsection
