@extends('layouts.adm-app')

@section('content')
    <section class="content-header">
        <h1>
            <a href="{{ route('doctor.create') }}" class="btn btn-default">
                <i class="fa fa-chevron-left"></i>
            </a>&nbsp;&nbsp;&nbsp;
            Spesialis
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/admin"><i class="fa fa-dashboard"></i> {{ session('role') }}</a></li>
            <li><a href="{{ route('doctor.index') }}">Dokter</a></li>
            <li><a href="{{ route('doctor.create') }}">Tambah Dokter</a></li>
            <li class="active">Spesialis</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        <!-- Specialty List -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <strong>Daftar Spesialis</strong>
                <div class="pull-right">
                    <a href="{{route('specialty.create')}}" class="btn btn-success">
                        <strong>
                            <i class="fa fa-plus"></i>
                            &nbsp;Tambah Spesialis
                        </strong>
                    </a>
                    {{--<button type="button" class="btn btn-warning" data-widget="collapse" data-toggle="tooltip" title="Toggle">--}}
                        {{--<i class="fa fa-minus"></i>--}}
                    {{--</button>--}}
                </div>
            </div>
            <div class="box-body">
                <div class="box-body">
                    <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                        <div class="row">
                            <div class="col-sm-6"></div>
                            <div class="col-sm-6"></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                @if(count($data['specialization'])>0)
                                    <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                                        <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Gelar</th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Nama</th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Detail</th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Ditinjau</th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Terakhir diubah</th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending"></th>
                                        </tr>
                                        </thead>
                                        @foreach($data['specialization'] as $specialty)
                                            <tbody>
                                            <tr role="row" class="odd">
                                                <td>{{ $specialty->degree }}</td>
                                                <td>{{ $specialty->name }}</td>
                                                <td class="text-center">
                                                    <a href="{{ route('specialty.show', $specialty->id) }}" class="btn btn-info" title="Click to show detail">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                </td>
                                                <td>{{ $specialty->created_at->format("d M Y") }}</td>
                                                <td>{{ $specialty->updated_at->format("d M Y | h:i") }}</td>
                                                <td class="text-center">
                                                    <form method="post" action="{{ route('specialty.destroy', $specialty->id) }}">
                                                        @csrf
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <input type="hidden" name="id" value="{{ $specialty->id }}">
                                                        <button type="submit" class="btn btn-danger btn-sm">
                                                            <i class="fa fa-trash-o"></i>
                                                        </button>

                                                        <a href="{{ route('specialty.edit', ['id' => $specialty->id]) }}" class="btn btn-warning btn-sm">
                                                            <i class="fa fa-refresh"></i>
                                                        </a>
                                                    </form>
                                                </td>
                                            </tr>
                                            </tbody>
                                        @endforeach
                                    </table>
                                    <div class="text-center">
                                        {{ $data['specialization']->links() }}
                                    </div>
                                @else
                                    <div class="row">
                                        <div class="col-md-6 col-md-offset-3">
                                            <div class="alert alert-danger text-center">
                                                <strong>Maaf tidak ada konten.</strong>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.box -->
    </section>
@endsection
