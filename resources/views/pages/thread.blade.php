@extends('layouts.adm-app')

@section('content')
    <section class="content-header">
        <h1>
            Diskusi
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fas fa-tachometer-alt"></i> {{ session('role') }}</a></li>
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
                                    <i class="fa fa-inbox text-blue"></i>
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
                        <div class="table-responsive mailbox-messages">
                            <table class="table table-hover table-striped">
                                <tbody>
                                    @foreach($data['threads'] as $thread)
                                        <tr
                                            @if($thread->status == true)
                                                @if($thread->doctor_id == Auth::guard('doctor')->user()->id)
                                                    title="Terjawab oleh anda"
                                                @else
                                                    title="Terjawab oleh dr. {{ $thread->doctor->name }}"
                                                @endif
                                            @else
                                                title="Belum Terjawab"
                                            @endif
                                        >
                                            <td class="mailbox-star">
                                                @if($thread->status == true)
                                                    <i class="fa fa-check-circle text-green"></i>
                                                @else
                                                    <i class="fa fa-exclamation-triangle text-yellow"></i>
                                                @endif
                                            </td>
                                            <td class="mailbox-name">
                                                {{ Str::limit($thread->user->name, 15) }}
                                            </td>
                                            <td class="mailbox-subject">
                                                <b>{{ Str::limit($thread->topic->topic_name, 20) }}</b>
                                            </td>
                                            <td>
                                                <span>{!! Str::limit($thread->question, 25) !!}</span>
                                            </td>
                                            <td class="mailbox-attachment">
                                                <a href="#" class="btn btn-success btn-xs {{ $thread->status == true ? 'disabled' : '' }}" style="{{ $thread->doctor_id == Auth::guard('doctor')->user()->id ? 'display: none;' : ''}}">
                                                    Jawab
                                                </a>
                                                @if($thread->doctor_id == Auth::guard('doctor')->user()->id)
                                                    <a href="#" class="btn btn-warning btn-xs">
                                                        Ubah Jawaban
                                                    </a>
                                                @endif
                                            </td>
                                            <td class="mailbox-date">{{ $thread->created_at->diffForHumans() }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
                <div class="text-center">
                    {{ $data['threads']->links() }}
                </div>
            </div>
        </div>
    </section>
@endsection
