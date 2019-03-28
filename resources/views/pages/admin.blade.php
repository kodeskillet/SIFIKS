@extends('layouts.adm-app')

@section('content')
    <section class="content-header">
        <h1>
            Admin
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> {{ session('role') }}</a></li>
            <li class="active">Admin</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        <div class="box box-primary">
            <div class="box-header with-border">
                <strong>Daftar Admin</strong>
                <a href="{{ route('admin.create') }}" class="btn btn-success pull-right">
                    <strong>
                        <i class="fa fa-plus"></i>
                        &nbsp;Tambah Admin
                    </strong>
                </a>
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
                                @if(count($data['admin'])>0)
                                <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                                    <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Nama</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Email</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Didaftarkan</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Terakhir diubah</th>
                                    </tr>
                                    </thead>
                                    @foreach($data['admin'] as $admin)
                                    <tbody>
                                    <tr role="row" class="odd">
                                        <td>{{ $admin->name }}</td></td>
                                        <td>{{ $admin->email }}</td>
                                        <td>{{ $admin->created_at->format("d M Y") }}</td>
                                        <td>{{ $admin->updated_at->format("d M Y | h:i A") }}</td>
                                    </tr>
                                    </tbody>
                                    @endforeach
                                    <tfoot>
                                    </tfoot>
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
