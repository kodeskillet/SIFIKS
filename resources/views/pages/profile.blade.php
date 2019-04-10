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
            </a>
        </div>
        <div class="box-body ">
            @if( count($data[session('guard')]->article) > 0 )
                @foreach($data[session('guard')]->article as $article)
                    <div class="container col-md-12">
                        <div class="post">
{{--                            <div class="user-block">--}}
{{--                                <img class="img-circle img-bordered-sm" src="{{ asset('storage/user_images/user-default.jpg') }}" alt="Image">--}}
{{--                                <span class="username">--}}
{{--                                  {{ $article->admin->name }}--}}
{{--                                </span>--}}
{{--                                <span class="description">{{ $article->created_at->diffForHumans() }}</span>--}}
{{--                            </div>--}}
                        <!-- /.user-block -->
                            <h4>
                                <strong>{{ $article->title }}</strong>
                                <small class="pull-right text-bold">{{ $article->getCat($article->category) }}</small>
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
                                    <a class="text-success" href="{{ route('article.edit', $article->id) }}">
                                        <i class="fa far fa-pencil-alt margin-r-5"></i>Edit
                                    </a>
                                </li>
                                <li class="text-sm">
                                    <a class="text-danger" href="#" onclick="destroy()">
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

    <script type="text/javascript">
        function destroy() {
            $('#delete').submit();
        }
    </script>
@endsection
