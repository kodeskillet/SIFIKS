@extends('layouts.adm-app')

@section('content')
    <section class="content-header">
        <h1>
            Artikel
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> {{ session('role') }}</a></li>
            <li class="active">Artikel</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        <div class="box">
            <div class="box-header with-border">
                <a href="{{ route('articles.create') }}" class="btn btn-success pull-right"><i class="fa fa-plus"></i>&nbsp;&nbsp;<b>Buat artikel</b></a>
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
                                @if(count($data['articles'])>0)
                                    <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                                        <thead>
                                        <tr role="row">
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Category</th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Judul</th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Artikel</th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Penulis</th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Tgl. Dibuat</th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Tgl. Diperbaruhi</th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending"></th>
                                        </tr>
                                        </thead>
                                        @foreach($data['articles'] as $article)
                                            <tbody>
                                            <tr role="row" class="odd">
                                                <td>{{$article->category}}</td>
                                                <td>{{$article->title}}</td>
                                                <td class="text-center">
                                                    <a href="/articles/{{ $article->id }}" class="btn btn-info">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                </td>
                                                <td>{{$article->writer_id}}</td>
                                                <td>{{$article->created_at}}</td>
                                                <td>{{$article->updated_at}}</td>
                                                <td class="text-center">
                                                    <a href="" class="btn btn-danger btn-sm">
                                                        <i class="fa fa-trash-o"></i>
                                                    </a>
                                                    <a href="/articles/{{$article->id}}/edit" class="btn btn-warning btn-sm">
                                                        <i class="fa fa-refresh"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            </tbody>
                                        @endforeach
                                        <tfoot>
                                        </tfoot>
                                    </table>
                                @else
                                    <div class="alert alert-danger" role="alert">
                                        <p>Maaf tidak ada konten</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-5">
                                <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div>
                            </div>
                            <div class="col-sm-7">
                                <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                                    <ul class="pagination">
                                        <li class="paginate_button previous disabled" id="example2_previous">
                                            <a href="#" aria-controls="example2" data-dt-idx="0" tabindex="0">Previous</a>
                                        </li>
                                        <li class="paginate_button active">
                                            <a href="#" aria-controls="example2" data-dt-idx="1" tabindex="0">1</a>
                                        </li>
                                        <li class="paginate_button ">
                                            <a href="#" aria-controls="example2" data-dt-idx="2" tabindex="0">2</a>
                                        </li>
                                        <li class="paginate_button ">
                                            <a href="#" aria-controls="example2" data-dt-idx="3" tabindex="0">3</a>
                                        </li>
                                        <li class="paginate_button ">
                                            <a href="#" aria-controls="example2" data-dt-idx="4" tabindex="0">4</a>
                                        </li>
                                        <li class="paginate_button ">
                                            <a href="#" aria-controls="example2" data-dt-idx="5" tabindex="0">5</a>
                                        </li>
                                        <li class="paginate_button ">
                                            <a href="#" aria-controls="example2" data-dt-idx="6" tabindex="0">6</a>
                                        </li>
                                        <li class="paginate_button next" id="example2_next">
                                            <a href="#" aria-controls="example2" data-dt-idx="7" tabindex="0">Next</a>
                                        </li>
                                    </ul>
                                </div>
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
