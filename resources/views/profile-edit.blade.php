@extends('layouts.user-profile')

@section('user-content')
    <div class="modal-content">
        <div class="modal-header">
            <strong>Edit profil</strong>
        </div>
        <form action="{{ route('user.profile.edit.submit', $data['user']->id) }}" method="POST" autocomplete="off" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="form-group row justify-content-center">
                    <label class="col-md-3 col-form-label text-md-right">Foto Profil</label>
                    <div class="col-md-6">
                        <div class="ml-0 mb-md-4" style="border: 1px solid #ddd; width: 175px; height: 175px">
                            <img id="preview" src="{{ asset('storage/user_images/'.$data['user']->profile_picture) }}" class="img-fluid" alt="Foto Anda">
                            @if($data['user']->profile_picture != "user-default.jpg" && $data['user']->profile_picture != "user-default-male.png" && $data['user']->profile_picture != "user-default-female.png")
                                <a href="{{ route('user.image.remove') }}" class="btn btn-danger btn-sm form-control">
                                    <strong>Hapus foto</strong>
                                </a>
                            @endif
                        </div>

                    </div>
                </div>
                <div class="form-group row justify-content-center">
                    <label for="image" class="col-md-3 col-form-label">&nbsp;</label>
                    <div class="col-md-6">
                        <div class="custom-file">
                            <input type="file" onchange="previewImage(this)" class="custom-file-input" name="image" id="image" accept="image/x-png,image/gif,image/jpeg">
                            <label class="custom-file-label" for="picture">Pilih gambar</label>
                        </div>
                        @if($errors->has('image'))
                            <div class="text-danger">
                                {{$errors->first('image')}}
                            </div>
                        @endif
                    </div>
                </div>
                <hr>
                <div class="form-group row justify-content-center">
                    <label for="name" class="col-md-3 col-form-label text-md-right">Nama</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="name" name="name" value="{{ $data['user']->name }}">
                        @if($errors->has('name'))
                            <div class="text-danger">
                                {{$errors->first('name')}}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group row justify-content-center">
                    <label for="email" class="col-md-3 col-form-label text-md-right">E-mail</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="email" name="email" value="{{ $data['user']->email }}">
                        @if($errors->has('email'))
                            <div class="text-danger">
                                {{$errors->first('email')}}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group row justify-content-center">
                    <label class="col-md-3 col-form-label text-md-right">Gender</label>
                    <div class="col-md-6">
                        <div class="row mt-2">
                            <div class="col-md-4">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="ml" name="gender" class="custom-control-input" value="Laki - laki"
                                        {{ $data['user']->gender == 'Laki - laki' ? 'checked' : '' }}
                                    >
                                    <label class="custom-control-label" for="ml">Laki - laki</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="fml" name="gender" class="custom-control-input" value="Perempuan"
                                            {{ $data['user']->gender == 'Perempuan' ? 'checked' : '' }}
                                    >
                                    <label class="custom-control-label" for="fml">Perempuan</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row justify-content-center">
                    <label for="bio" class="col-md-3 col-form-label text-md-right">Biografi</label>
                    <div class="col-md-6">
                        <textarea id="bio" name="bio" class="form-control">{{ $data['user']->biography }}</textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="_method" value="PUT">
                <button type="submit" class="btn btn-success">
                    <strong>Simpan</strong>
                </button>
                <a href="{{ route('user.profile') }}" class="btn btn-danger">
                    <strong>Batal</strong>
                </a>
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
