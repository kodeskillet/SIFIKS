@extends('layouts.adm-app')

@section('content')
    <section class="content-header">
        <h1>
            Artikel
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fas fa-tachometer-alt"></i> {{ session('role') }}</a></li>
            <li class="active">Artikel</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        @include('layouts.inc.messages')

        <div class="box box-primary">
            <div class="box-header with-border">
                <strong>Daftar Artikel</strong>
                <a href="{{ session('role') == "Admin" ? url('/admin/article/create') : url('/doctor/article/create') }}" class="btn btn-success pull-right">
                    <strong>
                        <i class="fa fa fa-pencil-alt"></i>
                        &nbsp;Buat artikel
                    </strong>
                </a>
            </div>
            <div class="box-body no-padding">
                <div class="table-responsive mailbox-messages">
                    @if(count($data['articles'])>0)
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Kategori</th>
                                <th colspan="2" class="text-center">Artikel</th>
                                <th>Penulis</th>
                                <th>Ditinjau</th>
                                <th class="text-center">#</th>
                                <th>Terakhir diubah</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data['articles'] as $article)
                                <tr>
                                    <td>
                                        <span class="badge
                                            @if($article->category == "penyakit")
                                                bg-red
                                            @elseif($article->category == "obat")
                                                bg-blue
                                            @elseif($article->category == "kesehatan")
                                                bg-orange
                                            @elseif($article->category == "hidup-sehat")
                                                bg-yellow
                                            @else
                                                bg-green
                                            @endif
                                        ">
                                            {{ $article->getCat($article->category) }}
                                        </span>
                                    </td>
                                    <td class="text-right">
                                        <strong>{{ \Illuminate\Support\Str::limit($article->title, 20) }}&nbsp;&nbsp;&nbsp;&nbsp;- </strong>
                                    </td>
                                    <td>
                                        {!! \Illuminate\Support\Str::limit($article->content, 25) !!}
                                    </td>
                                    <td>
                                        <strong>({{ $article->writer()['role'] }})</strong>
                                        {{ $article->writer()['data']->name }}
                                    </td>
                                    <td>{{ $article->created_at->format("d M Y") }}</td>
                                    <td class="text-center">
                                        <a href="{{ url('/'.session('guard').'/article/'.$article->id) }}" class="btn btn-info btn-xs" data-toggle="tooltip" title="Selengkapnya">
                                            <i class="fa fa-external-link-square-alt"></i>
                                        </a>
                                        @if(session('role') == "Admin" && Auth::guard('admin')->user()->id == $article->admin_id)
                                            <button type="button" onclick="destroy()" class="btn btn-danger btn-xs" data-toggle="tooltip" title="Hapus">
                                                <i class="fa fas fa-trash"></i>
                                            </button>
                                            <a href="{{ route('admin.article.edit', $article->id) }}" class="btn btn-warning btn-xs" data-toggle="tooltip" title="Edit">
                                                <i class="fa fas fa-sync"></i>
                                            </a>
                                            <form onsubmit="return confirm('Yakin ingin menghapus artikel ini?')" id="delete" method="post" action="{{ route('article.destroy', $article->id) }}">
                                                @csrf
                                                <input type="hidden" name="_method" value="DELETE">
                                            </form>
                                        @elseif(session('role') == "Doctor" && Auth::guard('doctor')->user()->id == $article->doctor_id)
                                            <button type="button" onclick="destroy()" class="btn btn-danger btn-xs" data-toggle="tooltip" title="Hapus">
                                                <i class="fa fas fa-trash"></i>
                                            </button>
                                            <a href="{{ route('doctor.article.edit', $article->id) }}" class="btn btn-warning btn-xs" data-toggle="tooltip" title="Edit">
                                                <i class="fa fas fa-sync"></i>
                                            </a>
                                            <form onsubmit="return confirm('Yakin ingin menghapus artikel ini?')" id="delete" method="post" action="{{ route('article.destroy', $article->id) }}">
                                                @csrf
                                                <input type="hidden" name="_method" value="DELETE">
                                            </form>
                                        @endif
                                    </td>
                                    <td>{{ $article->updated_at->diffForHumans() }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                            {{ $data['articles']->links() }}
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
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </section>
    <script type="text/javascript">

        function destroy() {
            $('#delete').submit();
        }

    </script>
@endsection
