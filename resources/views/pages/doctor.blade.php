{{--@extends('layouts.adm-app')--}}

{{--@section('content')--}}
{{--    <section class="content-header">--}}
{{--        <h1>--}}
{{--            Dokter--}}
{{--            <small></small>--}}
{{--        </h1>--}}
{{--        <ol class="breadcrumb">--}}
{{--            <li><a href="/admin"><i class="fa fas fa-tachometer-alt"></i> {{ session('role') }}</a></li>--}}
{{--            <li class="active">Dokter</li>--}}
{{--        </ol>--}}
{{--    </section>--}}

{{--    <!-- Main content -->--}}
{{--    <section class="content container-fluid">--}}

{{--        @include('layouts.inc.messages')--}}

{{--        <!-- Doctor List -->--}}
{{--        <div class="box box-primary">--}}
{{--            <div class="box-header with-border">--}}
{{--                <strong>Daftar Dokter</strong>--}}
{{--                <div class="pull-right">--}}
{{--                    <a href="{{route('doctor.create')}}" class="btn btn-success">--}}
{{--                        <strong>--}}
{{--                            <i class="fa fa-plus"></i>--}}
{{--                            &nbsp;Tambah Dokter--}}
{{--                        </strong>--}}
{{--                    </a>--}}
{{--                    --}}{{--<button type="button" class="btn btn-warning" data-widget="collapse" data-toggle="tooltip" title="Toggle">--}}
{{--                        --}}{{--<i class="fa fa-minus"></i>--}}
{{--                    --}}{{--</button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="box-body">--}}
{{--                <div class="box-body">--}}
{{--                    <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-sm-6"></div>--}}
{{--                            <div class="col-sm-6"></div>--}}
{{--                        </div>--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-sm-12">--}}
{{--                                @if(count($doctors) > 0)--}}
{{--                                <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">--}}
{{--                                    <thead>--}}
{{--                                    <tr role="row">--}}
{{--                                        <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Nama Dokter</th>--}}
{{--                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Spesialis</th>--}}
{{--                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Lokasi</th>--}}
{{--                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Email</th>--}}
{{--                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Ditinjau</th>--}}
{{--                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Terakhir diubah</th>--}}
{{--                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending"></th>--}}
{{--                                    </tr>--}}
{{--                                    </thead>--}}
{{--                                    @foreach($doctors as $doctor)--}}
{{--                                    <tbody>--}}
{{--                                    <tr role="row" class="odd">--}}
{{--                                        <td>{{ $doctor->name }}</td>--}}
{{--                                        <td>--}}
{{--                                            <a href="#" title="{{ $doctor->getSpecialty()->name }}">--}}
{{--                                                {{ $doctor->trimStr($doctor->getSpecialty()->name) }}--}}
{{--                                            </a>--}}
{{--                                        </td>--}}
{{--                                        <td>--}}
{{--                                            @if($doctor->city_id != null)--}}
{{--                                                {{ $doctor->getLocation()->name}}--}}
{{--                                            @else--}}
{{--                                                null--}}
{{--                                            @endif--}}
{{--                                        </td>--}}
{{--                                        <td>{{ $doctor->email }}</td>--}}
{{--                                        <td>{{ $doctor->created_at->format("d M Y") }}</td>--}}
{{--                                        <td>{{ $doctor->updated_at->diffForHumans() }}</td>--}}
{{--                                        <td class="text-center">--}}
{{--                                            <form onsubmit="return confirm('Yakin ingin menghapus Dokter?')" method="post" action="{{ route('doctor.destroy', $doctor->id) }}">--}}
{{--                                                @csrf--}}
{{--                                                <input type="hidden" name="_method" value="DELETE">--}}
{{--                                                <input type="hidden" name="id" value="{{ $doctor->id }}">--}}
{{--                                                <button type="submit" class="btn btn-danger btn-sm">--}}
{{--                                                    <i class="fa fas fa-trash"></i>--}}
{{--                                                </button>--}}

{{--                                                <a href="{{ route('doctor.edit', ['id' => $doctor->id]) }}" class="btn btn-warning btn-sm">--}}
{{--                                                    <i class="fa fas fa-sync"></i>--}}
{{--                                                </a>--}}
{{--                                            </form>--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                    </tbody>--}}
{{--                                    @endforeach--}}
{{--                                </table>--}}
{{--                                <div class="text-center">--}}
{{--                                    {{ $doctors->links() }}--}}
{{--                                </div>--}}
{{--                                @else--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-md-6 col-md-offset-3">--}}
{{--                                        <div class="alert alert-danger text-center">--}}
{{--                                            <strong>Maaf tidak ada konten.</strong>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                @endif--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <!-- /.box-body -->--}}
{{--        </div>--}}
{{--        <!-- /.box -->--}}
{{--    </section>--}}
{{--@endsection--}}


{{ $doctors }}
