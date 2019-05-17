@extends('layouts.admin-profile')

@section('admin-content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <strong class="box-title">Rumah Sakit anda</strong>
            <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#addHospital">
                <strong>
                    <i class="fa far fa-plus"></i>
                    &nbsp;Tambah Tempat Kerja
                </strong>
            </button><br>
            <small>Daftar Rumah Sakit tempat anda bekerja.</small>
        </div>
        <div class="box-body">
            <div class="container col-md-12">
                @if(count($data['doctor']->hospital) > 0)
                    @foreach($data['doctor']->hospital as $hospital)
                        <div class="row bg-gray-light" style="margin:10px 0; border: 1px solid #ddd; padding: 10px 0;">
                            <div class="col-md-4" style="padding-right: 0 !important;">
                                <img src="{{ asset('storage/images/hospital-illustration.jpg') }}" class="img-responsive" alt="Hospital">
                            </div>
                            <div class="col col-md-8">
                                <strong style="font-size: 1.8rem;">{{ $hospital->name }}</strong>
                                {!! \Illuminate\Support\Str::limit($hospital->biography, 250) !!}
                            </div>
                            <div class="row" style="padding: 0 15px;">
                                <div class="col-md-12 text-right" style="margin-top: 10px;">
                                    <small><a href="#" class="link-black"><i class="fa fas fa-reply"></i>&nbsp;&nbsp;&nbsp;Selengkapnya</a></small>
                                    &nbsp;&nbsp;|&nbsp;&nbsp;
                                    <small><a href="#" onclick="$('#delHospital').submit()" class="text-danger"><i class="fa fas fa-trash"></i>&nbsp;&nbsp;&nbsp;Hapus</a></small>

                                    <form id="delHospital" onsubmit="return confirm('Apakah anda yakin ingin menghapus ?')" action="{{ route('doctor.profile.hospital.destroy', ['doctor' => $data['doctor']->id , 'hospital' => $hospital->id]) }}" method="post">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="alert alert-warning text-center">
                        <strong>Maaf, tidak ada Rumah Sakit terdaftar yang ada di lokasi anda.</strong>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="addHospital" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form action="{{ route('doctor.profile.hospital.add', ['doctor' => $data['doctor']->id]) }}" method="post">
                @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <span class="modal-title">Pilih Rumah Sakit</span>
                    <button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @if(count($data['hospitals']) > 0)
                        @foreach($data['hospitals'] as $h)
                            <div style="margin: 10px 0;">
                                <div class="row" style="border:1px solid #ddd; border-bottom: 0; margin: 5px 10px; margin-bottom: 0;">
                                    <div class="col-md-12 bg-gray-light" style="padding: 10px;">
                                        <div class="row">
                                            <div class="col-md-4" style="padding-right: 0 !important;">
                                                <img src="{{ asset('storage/images/hospital-illustration.jpg') }}" class="img-responsive" alt="Hospital">
                                            </div>
                                            <div class="col col-md-8">
                                                <strong style="font-size: 1.8rem;">{{ $h->name }}</strong>
                                                {!! \Illuminate\Support\Str::limit($h->biography, 120) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="border:1px solid #ddd; margin: 10px; margin-top: 0;">
                                    <div class="col-md-12 text-center" style="padding: 5px 0;">
                                        @if(count($data['doctor']->hospital) > 0)
                                            @foreach($h->doctor as $doc)
                                                @if($doc->id == Auth::guard('doctor')->user()->id)
                                                    <span class="text-warning">Telah Terdaftar</span>
                                                @else
                                                    <input type="radio" name="hospital_id" value="{{ $h->id }}">
                                                @endif
                                            @endforeach
                                        @else
                                            <input type="radio" name="hospital_id" value="{{ $h->id }}">
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="row">
                            <div class="col col-md-12 text-center">
                                {{ $data['hospitals']->links() }}
                            </div>
                        </div>
                    @else
                        <div class="alert alert-warning text-center">
                            <strong>Maaf, tidak ada Rumah Sakit terdaftar yang ada di lokasi anda.</strong>
                        </div>
                    @endif
                </div>
                <div class="modal-footer">
                    <span class="text-danger" style="margin-right: 10px;">
                        @if ($errors->has('hospital_id'))
                            <span class="invalid-feedback" role="alert" style="margin-right: 10px">
                                <i><strong>{{ $errors->first('hospital_id') }}</strong></i>
                            </span>
                        @endif
                    </span>
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><strong>Tutup</strong></button>
                    @if(count($data['hospitals']) > 0)
                        <button type="submit" class="btn btn-primary btn-sm"><strong>Simpan</strong></button>
                    @endif
                </div>
            </div>
            </form>
        </div>
    </div>
@endsection
