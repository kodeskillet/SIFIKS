@extends('layouts.adm-app')

@section('content')
    <section class="content-header">
        <h1>
            Rumah Sakit
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fas fa-tachometer-alt"></i>{{ session('role') }}</a></li>
            <li class="active">Rumah Sakit</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        @include('layouts.inc.messages')

        <div class="box box-primary">
            <div class="box-header with-border">
                <strong>Daftar Rumah Sakit</strong>
                <a href="{{route('hospital.create')}}" class="btn btn-success pull-right">
                    <strong>
                        <i class="fa fa-plus"></i>
                        &nbsp;Tambah Rumah Sakit
                    </strong>
                </a>
                {{--<div class="box-tools pull-right">--}}
                {{--<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"--}}
                {{--title="Collapse">--}}
                {{--<i class="fa fa-minus"></i></button>--}}
                {{--<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">--}}
                {{--<i clasbhbbs="fa fa-times"></i></button>--}}
                {{--</div>--}}
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
                                @if(count($data['hospital'])>0)
                                <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                                    <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Nama</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Kota</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Detil</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Ditinjau</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Terakhir diubah</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending"></th>
                                    </tr>
                                    </thead>
                                    @foreach($data['hospital'] as $hospital)
                                    <tbody>
                                    <tr role="row" class="odd">
                                        <td>{{ $hospital->name }}</td>
                                        <td>{{ $hospital->city->name }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('hospital.show', ['id' => $hospital->id]) }}" class="btn btn-info">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        </td>
                                        <td>{{ $hospital->created_at->format("d M Y") }}</td>
                                        <td>{{ $hospital->updated_at->diffForHumans() }}</td>
                                        <td class="text-center">
                                            <form method="post" action="{{ route('hospital.destroy', $hospital->id) }}">
                                                @csrf
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="id" value="{{ $hospital->id }}">
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="fa fas fa-trash"></i>
                                                </button>
                                                <a href="{{ route('hospital.edit', [ 'id' => $hospital->id]) }}" class="btn btn-warning btn-sm">
                                                    <i class="fa fas fa-sync"></i>
                                                </a>
                                            </form>
                                        </td>
                                    </tr>
                                    </tbody>
                                    @endforeach
                                    {{ $data['hospital']->links() }}
                                </table>
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
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </section>
@endsection
