@extends('layouts.adm-app')

@section('content')
    <section class="content-header">
        <h1>
            Diskusi
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route(session('guard').'.dashboard') }}"><i class="fa fas fa-tachometer-alt"></i> {{ session('role') }}</a></li>
            <li class="active">Diskusi</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Tampilkan</h3>
                    </div>
                    <div class="box-body no-padding">
                        <ul class="nav nav-pills nav-stacked">
                            <li class="{{ $data['query'] == "all" ? 'active' : '' }}">
                                <a
                                    @if(Auth::guard('admin')->check())
                                        href="{{ route('admin.thread.index', ['query' => 'all']) }}"
                                    @elseif(Auth::guard('doctor')->check())
                                        href="{{ route('doctor.thread.index', ['query' => 'all']) }}"
                                    @endif
                                >
                                    <i class="fa fa-comments text-blue"></i>
                                    Semua
                                    <span class="label label-primary pull-right">
                                        {{ $data['count']['all'] }}
                                    </span>
                                </a>
                            </li>
                            <li class="{{ $data['query'] == "answered" ? 'active' : '' }}">
                                <a
                                    @if(Auth::guard('admin')->check())
                                        href="{{ route('admin.thread.index', ['query' => 'answered']) }}"
                                    @elseif(Auth::guard('doctor')->check())
                                        href="{{ route('doctor.thread.index', ['query' => 'answered']) }}"
                                    @endif
                                >
                                    <i class="fa fa-check-circle text-green"></i>
                                    Terjawab
                                    <span class="label label-success pull-right">
                                        {{ $data['count']['answered'] }}
                                    </span>
                                </a>
                            </li>
                            <li class="{{ $data['query'] == "unanswered" ? 'active' : '' }}">
                                <a
                                    @if(Auth::guard('admin')->check())
                                        href="{{ route('admin.thread.index', ['query' => 'unanswered']) }}"
                                    @elseif(Auth::guard('doctor')->check())
                                        href="{{ route('doctor.thread.index', ['query' => 'unanswered']) }}"
                                    @endif
                                >
                                    <i class="fa fa-exclamation-triangle text-yellow"></i>
                                    Belum Terjawab
                                    <span class="label label-warning pull-right">
                                        {{ $data['count']['unanswered'] }}
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>

            <div class="col-md-9">

                @include('layouts.inc.messages')

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">
                            Pertanyaan
                        </h3>

                        <div class="box-tools pull-right">
                            <p style="margin-top:3px; margin-right: 3px;">
                                @if($data['query'] == "all")
                                    <span class="badge bg-blue">Semua</span>
                                @elseif($data['query'] == "answered")
                                    <span class="badge bg-green">
                                        <i class="fas fa-check-circle"></i>&nbsp;
                                        Terjawab
                                    </span>
                                @else
                                    <span class="badge bg-yellow">
                                        <i class="fas fa-exclamation-triangle"></i>&nbsp;
                                        Belum Terjawab
                                    </span>
                                @endif
                            </p>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        @if(count($data['threads']) > 0)
                            <div class="table-responsive mailbox-messages">
                                <table class="table">
                                    <tbody>
                                    @foreach($data['threads'] as $thread)
                                        <tr>
                                            <td>
                                                @if($thread->status == true)
                                                    <i class="fa fa-check-circle text-green"
                                                        data-toggle="tooltip"
                                                        @auth('admin')
                                                            title="Terjawab oleh dr. {{ $thread->doctor->name }}"
                                                        @endauth

                                                        @auth('doctor')
                                                            @if($thread->doctor_id == Auth::guard('doctor')->user()->id)
                                                                title="Terjawab oleh anda"
                                                            @else
                                                                title="Terjawab oleh dr. {{ $thread->doctor->name }}"
                                                            @endif
                                                        @endauth
                                                    ></i>
                                                @else
                                                    <i class="fa fa-exclamation-triangle text-yellow"
                                                        data-toggle="tooltip"
                                                        title="Belum Terjawab"
                                                    ></i>
                                                @endif
                                            </td>
                                            <td class="mailbox-name">
                                                {{ Str::limit($thread->user->name, 15) }}
                                            </td>
                                            <td class="mailbox-subject">
                                                <b>{{ Str::limit($thread->topic->topic_name, 30) }}</b>
                                            </td>
                                            <td>
                                                <span>{!! Str::limit($thread->question, 25) !!}</span>
                                            </td>
                                            <td class="mailbox-attachment">
                                                <a href="{{ route(session('guard').'.thread.show', $thread->id) }}" class="btn btn-info btn-xs" title="Selengkapnya" data-toggle="tooltip">
                                                    <i class="fas fa-external-link-square-alt"></i>
                                                </a>
                                                @auth('admin')
                                                    <a href="#" class="btn btn-danger btn-xs" title="Hapus">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </a>
                                                @endauth

                                                @auth('doctor')
                                                    <a href="{{ route('doctor.thread.show', $thread->id) }}" class="btn btn-success btn-xs {{ $thread->status == true ? 'disabled' : '' }}" style="{{ $thread->doctor_id == Auth::guard('doctor')->user()->id ? 'display: none;' : ''}}" title="Jawab" data-toggle="tooltip">
                                                        <i class="fas fa-reply"></i>
                                                    </a>
                                                    @if($thread->doctor_id == Auth::guard('doctor')->user()->id)
                                                        <a href="{{ route('doctor.thread.edit', $thread->id) }}" class="btn btn-warning btn-xs" title="Edit Jawaban" data-toggle="tooltip">
                                                            <i class="fas fa-sync-alt"></i>
                                                        </a>
                                                        <a href="#" onclick="$('#delAns').submit()" class="btn btn-danger btn-xs" title="Hapus Jawaban" data-toggle="tooltip">
                                                            <i class="fas fa-trash"></i>
                                                        </a>

                                                        <form onsubmit="return confirm('Yakin ingin hapus jawaban?')" id="delAns" action="{{ route('doctor.thread.answer.destroy', $thread->id) }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="_method" value="PUT">
                                                        </form>
                                                    @endif
                                                @endauth
                                            </td>
                                            <td class="mailbox-date">{{ $thread->created_at->diffForHumans() }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <br>
                            <div class="alert alert-warning col-md-8 col-md-offset-2 text-center text-bold">
                                @if($data['query'] == "all")
                                    Belum ada diskusi apapun.
                                @elseif($data['query'] = "answered")
                                    Belum ada diskusi yang terjawab.
                                @else
                                    Semua diskusi telah terjawab.
                                @endif
                            </div>
                        @endif
                    </div>
                </div>
                <div class="text-center">
                    {{ $data['threads']->links() }}
                </div>
            </div>
        </div>
    </section>
@endsection
