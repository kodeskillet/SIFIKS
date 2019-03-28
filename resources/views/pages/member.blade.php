@extends('layouts.adm-app')

@section('content')
    <section class="content-header">
        <h1>
            Member
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/admin"><i class="fa fas fa-tachometer-alt"></i> {{ session('role') }}</a></li>
            <li class="active">Member</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="box box-primary">
            <div class="box-header with-border">
                <strong>Daftar Member</strong>
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
                                @if(count($data['user'])>0)
                                <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                                    <thead>
                                    <tr role="row">
                                        <th class="sorting-asc">Nama</th>
                                        <th class="sorting">Email</th>
                                        <th class="sorting">Bergabung</th>
                                        <th class="sorting">Terakhir diubah</th>
                                        <th class="sorting text-center" title="Via Google OAuth"><i class="fa fa-google fa-lg"></i></th>
                                        <th class="sorting">Status</th>
                                        <th class="sorting"></th>
                                    </tr>
                                    </thead>
                                    @foreach($data['user'] as $user)
                                    <tbody>
                                    <tr role="row" class="odd">
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->created_at->format("d M Y") }}</td>
                                        <td>{{ $user->updated_at->diffForHumans() }}</td>
                                        <td class="text-center">
                                            @if($user->provider_id != null)
                                                <strong><i class="fa fa-check text-green"></i> </strong>
                                            @else
                                                <strong><i class="fa fa-times text-red"></i> </strong>
                                            @endif
                                        </td>
                                        <td>
                                            @if($user->status == 0)
                                                <span class="text-red">Diblokir</span>
                                            @else
                                                <span class="text-green">Aktif</span>
                                            @endif

                                        </td>
                                        <td class="text-center">
                                            <form method="post" action="{{ route('member.update', ['id' => $user->id]) }}">
                                                @csrf
                                                <input type="hidden" name="_method" value="PUT">
                                                @if($user->status == 0)
                                                    <input type="hidden" name="cond" value="{{ __(1) }}">
                                                    <button type="submit" class="btn btn-success btn-sm" title="Aktifkan">
                                                        <i class="fa fa-unlock"></i>
                                                    </button>
                                                @else
                                                    <input type="hidden" name="cond" value="{{ __(0) }}">
                                                    <button type="submit" class="btn btn-danger btn-sm" title="Blokir">
                                                        <i class="fa fa-ban"></i>
                                                    </button>
                                                @endif
                                            </form>
                                        </td>
                                    </tr>
                                    </tbody>
                                    @endforeach
                                </table>
                                {{$data['user']->links()}} {{--  {{Pagination harus di bawah}} --}}
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
