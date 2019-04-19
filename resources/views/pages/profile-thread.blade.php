@extends('layouts.admin-profile')

@section('admin-content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <strong class="box-title">Diskusi terjawab</strong>
            <a href="{{ route('doctor.thread.index', ['query' => "all"]) }}" class="btn btn-primary pull-right">
                <strong>
                    <i class="fa far fa-comments"></i>
                    &nbsp;Lihat semua diskusi
                </strong>
            </a>
        </div>
        <div class="box-body ">
            @if( count($data['doctor']->thread) > 0 )
                <div class="table-responsive mailbox-messages">
                    <table class="table table-hover table-striped">
                        <tbody>
                        @foreach($data['doctor']->thread as $thread)
                            <tr>
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
                                    <b>{{ Str::limit($thread->topic->topic_name, 30) }}</b>
                                </td>
                                <td>
                                    <span>{!! Str::limit($thread->question, 25) !!}</span>
                                </td>
                                <td class="mailbox-attachment">
                                    <a href="#" class="btn btn-info btn-xs" title="Selengkapnya" data-toggle="tooltip">
                                        <i class="fas fa-external-link-square-alt"></i>
                                    </a>
                                    <a href="#" class="btn btn-success btn-xs {{ $thread->status == true ? 'disabled' : '' }}" style="{{ $thread->doctor_id == Auth::guard('doctor')->user()->id ? 'display: none;' : ''}}" title="Jawab" data-toggle="tooltip">
                                        <i class="fas fa-reply"></i>
                                    </a>
                                    <a href="#" class="btn btn-warning btn-xs" title="Edit Jawaban" data-toggle="tooltip">
                                        <i class="fas fa-sync-alt"></i>
                                    </a>
                                    <a href="#" onclick="$('#delAns').submit()" class="btn btn-danger btn-xs" title="Hapus Jawaban" data-toggle="tooltip">
                                        <i class="fas fa-trash"></i>
                                    </a>

                                    <form onsubmit="return confirm('Yakin ingin hapus jawaban?')" id="delAns" action="{{ route('doctor.thread.answer.destroy', $thread->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="_method" value="PUT">
                                    </form>
                                </td>
                                <td class="mailbox-date">{{ $thread->created_at->diffForHumans() }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <br>
                <div class="container col-md-8 col-md-offset-2 alert alert-warning text-center text-bold">
                    Anda belum menjawab diskusi apapun.
                </div>
            @endif
        </div>
    </div>
@endsection
