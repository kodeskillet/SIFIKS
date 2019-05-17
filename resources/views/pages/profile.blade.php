@extends('layouts.admin-profile')

@section('admin-content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <strong class="box-title">Artikel anda</strong>
            <a href="{{ session('role') == "Admin" ? url('/admin/article/create') : url('/doctor/article/create') }}" class="btn btn-success pull-right">
                <strong>
                    <i class="fa far fa-pencil-alt"></i>
                    &nbsp;Buat Artikel
                </strong>
            </a><br>
            <small>Daftar artikel yang anda buat.</small>
        </div>
        <div class="box-body ">
            @if( count($data[session('guard')]->article) > 0 )
                @foreach($data[session('guard')]->article as $article)
                    <div class="container col-md-12">
                        <div class="post">
                            <h4>
                                <strong>{{ $article->title }}</strong>
                                <span class="badge pull-right
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
                            </h4>

                            <p>
                                {!! $article->cutStr($article->content) !!}
                            </p>
                            <ul class="list-inline">
                                <li class="text-sm">
                                    <a class="link-black" href="{{ url('/admin/article', $article->id) }}">
                                        <i class="fa fa-share margin-r-5"></i>Selengkapnya
                                    </a>
                                </li>
                                |
                                <li class="text-sm">
                                    <a class="text-success"
                                    @if(Auth::guard('admin')->check())
                                        href="{{ route('admin.article.edit', $article->id) }}"
                                    @elseif(Auth::guard('doctor')->check())
                                       href="{{ route('doctor.article.edit', $article->id) }}"
                                    @endif
                                    >
                                        <i class="fa far fa-pencil-alt margin-r-5"></i>Edit
                                    </a>
                                </li>
                                <li class="text-sm">
                                    <a class="text-danger" href="#" onclick="$('#delete').submit()">
                                        <i class="fa far fa-trash margin-r-5"></i>
                                        Hapus
                                    </a>
                                    <form onsubmit="return confirm('Yakin ingin menghapus artikel ini?')" action="{{ route('article.destroy', $article->id) }}" method="POST" id="delete">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                    </form>
                                </li>
                                <li class="pull-right">
                                    <span class="text-sm">{{ $article->created_at->diffForHumans() }}</span>
                                </li>
                            </ul>
                        </div>
                        <hr>
                    </div>
                @endforeach
            @else
                <br>
                <div class="container col-md-8 col-md-offset-2 alert alert-warning text-center text-bold">
                    Anda belum membuat artikel apapun.
                </div>
            @endif
        </div>
    </div>
@endsection
