@extends('layouts.user-profile')

@section('user-content')
    <div class="modal-content">
        <div class="modal-header">
            <strong style="font-size: 1rem">Diskusi anda<br>
                @if($data['status'] == "all")
                    <small class="text-muted">Menampilkan semua diskusi</small>
                @elseif($data['status'] == "answered")
                    <small class="text-muted">Menampilkan diskusi terjawab</small>
                @endif
            </strong>
            <a href="{{ route('user.thread.create') }}" class="btn btn-primary btn-sm pull-right">
                <strong>
                    <i class="fas fa-question"></i>
                    &nbsp;Tanya Dokter
                </strong>
            </a>
        </div>
        <div class="modal-body">
            @if(count($data['threads']) > 0)

                <div class="row">
                    <div class="col-md-6">
                        {{ $data['threads']->links() }}
                    </div>
                    <div class="col-md-6 text-right justify-content-end mb-3">
                        <a href="{{ route('user.profile', ['query' => 'all']) }}" class="btn btn-primary btn-sm {{ $data['status'] == "all" ? 'disabled' : '' }}"> Semua Diskusi </a>
                        <a href="{{ route('user.profile', ['query' => 'answered']) }}" class="btn btn-success btn-sm {{ $data['status'] == "all" ? '' : 'disabled' }}"> Diskusi Terjawab </a>
                    </div>
                </div>

                @foreach($data['threads'] as $thread)
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <small class="float-right text-muted">{{ $thread->created_at->diffForHumans() }}</small>
                                    <a href="{{ route('user.thread.show', $thread->id) }}"><h5 class="card-title">{{ $thread->topic->topic_name }}</h5></a>
                                    <p class="card-text">{!! $thread->trimStr($thread->question) !!}</p>
                                    <span class="float-left mt-3">
                                        <small>
                                            <a href="{{ route('user.thread.edit', $thread->id) }}" class="{{ $thread->status == false ? 'text-success' : 'text-muted' }} mr-3">
                                                <i class="fas fa-edit"></i>
                                                Edit
                                            </a>
                                            <a href="#" class="text-danger" onclick="$('#del').submit()">
                                                <i class="fas fa-trash"></i>
                                                Hapus
                                            </a>
                                        </small>
                                    </span>

                                    <form id="del" onsubmit="return confirm('Yakin ingin menghapus ulasan ini?')" action="{{ route('user.thread.destroy', $thread->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                    </form>

                                    @if($thread->doctor_id != null)
                                        <span class="float-right mt-3">
                                            <i class="fas fa-check-circle text-success"></i>
                                            <small>
                                                <span class="text-muted">Dijawab Oleh</span>
                                                <b class="text-primary">dr. {{ $thread->doctor->name }}</b>
                                            </small>
                                        </span>
                                    @else
                                        <small class="float-right text-muted mt-3">Belum Dijawab</small>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="alert alert-warning text-center">
                    <span>Anda belum membuat diskusi apapun.</span>
                </div>
            @endif
        </div>
    </div>
@endsection
