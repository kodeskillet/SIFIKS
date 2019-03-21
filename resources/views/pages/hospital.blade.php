@extends('layouts.adm-app')

@section('content')
    <section class="content-header">
        <h1>
            Rumah Sakit
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> {{ session('role') }}</a></li>
            <li class="active">Rumah Sakit</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        <div class="box">
            <div class="box-header with-border">
                <a href="/administrator/artikel/tambah/" class="btn btn-success pull-right"><i class="fa fa-plus"></i>Tambah artikel</a>
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
                                <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                                    <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">No.</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Spesialis</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Kota</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Nama</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Biografi</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Profile Picture</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Email</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Email Verification</th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr role="row" class="odd">
                                        <td>1</td>
                                        <td>Kandungan</td>
                                        <td>Malang</td>
                                        <td>Marion Jola</td>
                                        <td>Artis dengan Kearifan lokal</td>
                                        <td>A</td>
                                        <td>marion@gmail.com</td>
                                        <td>jola@gmail.com</td>
                                        <td><a href="" class="btn btn-danger "><i class="fa fa-trash"></i>Hapus</a></td>
                                    </tr>
                                    </tbody>
                                    <tfoot>
                                    </tfoot>
                                </table>
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
