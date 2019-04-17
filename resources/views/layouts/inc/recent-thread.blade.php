<hr class="mt-5">
<h5 class="mb-3">Diskusi Kesehatan Terbaru</h5>
<div class="container">
    @foreach($data['threads'] as $thread)
        <div class="box box-widget">
            <div class="box-header with-border">
                <div class="user-block">
                    <img class="img-circle" src="{{ asset('storage/user_images/'.$thread->user->profile_picture) }}" alt="User Image">
                    <span class="username">{{ $thread->user->name }}</span>
                    <span class="description">{{ $thread->created_at->diffForHumans() }}</span>

                </div>
                <!-- /.user-block -->
            </div>
            <!-- /.box-header -->
            <div class="box-body p-4">
                <!-- post text -->
                <a href="{{ route('user.thread.show', $thread->id) }}"><h5>{{ $thread->topic->topic_name  }}</h5></a>
                <p>{!! $thread->trimStr($thread->question) !!}</p>

                @if($thread->doctor_id != null)
                    <span class="float-left">
                    <i class="fa fa-check-circle text-primary"></i>
                    <small>Dijawab oleh <b>dr. {{ $thread->doctor->name }}</b></small>
                </span>
                @else
                    <span class="float-left text-muted">
                        <small>Belum Dijawab</small>
                    </span>
                @endif
            </div>
            <hr>
        </div>
    @endforeach
    <div class="row">
        <div class="col-md-6 text-left">
            @if(!$data['threads']->onFirstPage())
                <a href="{{ $data['threads']->previousPageUrl() }}" class="btn btn-primary">
                    <i class="fas fa-chevron-left"></i> Sebelumnya
                </a>
            @endif
        </div>
        <div class="col-md-6 text-right">
            <a href="{{ $data['threads']->nextPageUrl() }}" class="btn btn-primary">
                Selanjutnya <i class="fas fa-chevron-right"></i>
            </a>
        </div>
    </div>
</div>

