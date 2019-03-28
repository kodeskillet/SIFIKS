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
        <div class="box box-primary">
            <div class="box-header with-border">
                <strong>Daftar Artikel</strong>
                <a href="{{ route('article.create') }}" class="btn btn-success pull-right">
                    <strong>
                        <i class="fa fa-pencil"></i>
                        &nbsp;Buat artikel
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
                                @if(count($data['articles'])>0)
                                    <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                                        <thead>
                                        <tr role="row">
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Category</th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Judul</th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Artikel</th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Penulis</th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Ditinjau</th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Terakhir diubah</th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending"></th>
                                        </tr>
                                        </thead>
                                        @foreach($data['articles'] as $article)
                                            <tbody>
                                            <tr role="row" class="odd">
                                                <td>{{ ucwords($article->category) }}</td>
                                                <td>{{ $article->trimStr($article->title) }}</td>
                                                <td class="text-center">
                                                    <a href="{{ route('article.show', ['id' => $article->id]) }}" class="btn btn-info">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <strong>({{ $article->writer }})</strong>
                                                    @if($article->writer == "Admin")
                                                        {{ $article->admin->name }}
                                                    @else
                                                        {{ $article->doctor->name }}
                                                    @endif

                                                </td>
                                                <td>{{ $article->created_at->format("d M Y") }}</td>
                                                <td>{{ $article->updated_at->diffForHumans() }}</td>
                                                <td class="text-center">
                                                    <form method="post" action="{{ route('article.destroy', $article->id) }}">
                                                        @csrf
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <input type="hidden" name="id" value="{{ $article->id }}">
                                                        <button type="submit" class="btn btn-danger btn-sm">
                                                            <i class="fa fa-trash-o"></i>
                                                        </button>

                                                        <a href="{{ route('article.edit', ['id' => $article->id]) }}" class="btn btn-warning btn-sm">
                                                            <i class="fa fa-refresh"></i>
                                                        </a>
                                                    </form>
                                                </td>
                                            </tr>
                                            </tbody>

                                        @endforeach
                                        {{$data['articles']->links()}} {{--  {{Pagination harus di bawah}} --}}
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
