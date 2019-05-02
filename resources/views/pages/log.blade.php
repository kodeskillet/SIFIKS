@extends('layouts.admin-profile')

@section('admin-content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <strong class="box-title">Log Aktivitas</strong>
        </div>
        <div class="box-body bg-gray-light">

            @if(count($data['logs']) > 0)

            <ul class="timeline">

                @foreach($data['logs'] as $log)
                    <li class="time-label">
                    <span class="bg-navy">
                        {{ $log->created_at->format('d F Y') }}
                        &nbsp;-&nbsp;
                        <i class="far fa-clock"></i>
                        {{ $log->created_at->format('G:i') }}
                    </span>
                    </li>
                    <li>
                        <!-- timeline icon -->
                        @if($log->prefix == 'a-create')
                            <i class="fa fas fa-pen bg-blue"></i>
                        @elseif($log->prefix == 'a-update')
                            <i class="fa fas fa-edit bg-orange"></i>
                        @elseif($log->prefix == 't-create')
                            <i class="fa fas fa-comment-dots bg-yellow"></i>
                        @elseif($log->prefix == 't-answer')
                            <i class="fa fas fa-reply-all bg-green"></i>
                        @else
                        @endif
                        <div class="timeline-item">
                            <span class="time"><i class="far fa-clock"></i> {{ $log->created_at->diffForHumans() }}</span>

                            <h3 class="timeline-header">
                                @if($log->admin_id != null)
                                    <span class="badge bg-red">
                                        Admin
                                    </span>
                                    <a href="#">{{ $log->admin->name }}</a>
                                @elseif($log->doctor_id != null)
                                    <span class="badge bg-yellow">
                                        Doctor
                                    </span>
                                    <a href="#">{{ $log->doctor->name }}</a>
                                @else
                                    <span class="badge bg-blue">
                                        Member
                                    </span>
                                    <a href="#">{{ $log->member->name }}</a>
                                @endif
                                {{ $log->action }}
                                @if($log->prefix == "t-answer")
                                    <a href="#">{{ $log->thread->user->name }}</a>
                                @endif
                            </h3>

                            @if($log->prefix != "a-update")
                                <div class="timeline-body">
                                    @if($log->target == "article")
                                        <h4>
                                            {{ $log->article->title }}
                                        </h4>
                                        <p>
                                            {!! \Illuminate\Support\Str::limit($log->article->content, 200) !!}
                                        </p>
                                    @else
                                        @if($log->prefix == "t-create")
                                            <h4>
                                                {{ $log->thread->topic->topic_name }}
                                            </h4>
                                            <p>
                                                {!! \Illuminate\Support\Str::limit($log->thread->question, 200) !!}
                                            </p>
                                        @elseif($log->prefix == "t-answer")
                                            <p>
                                                {!! \Illuminate\Support\Str::limit($log->thread->answer, 200) !!}
                                            </p>
                                        @endif
                                    @endif
                                </div>
                            @endif

                            <div class="timeline-footer">
                                <a class="btn btn-primary btn-xs" href="
                                    @if($log->target == "article")
                                        {{ url('/admin/article/'.$log->article->id) }}
                                    @else
                                        {{ url('/admin/thread/'.$log->thread->id.'/show') }}
                                    @endif
                                ">
                                    <i class="fa fa-share margin-r-5"></i>Selengkapnya
                                </a>
                            </div>
                        </div>
                    </li>
                @endforeach

            </ul>
            <div class="text-center">
                {{ $data['logs']->links() }}
            </div>
            @else
                <div class="alert alert-warning text-center">
                    <strong>Belum ada aktivitas apapun.</strong>
                </div>
            @endif
        </div>
    </div>
@endsection
