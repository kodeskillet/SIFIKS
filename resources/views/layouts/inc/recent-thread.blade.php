<h4>Diskusi Kesehatan Terbaru</h4>
@foreach($threads as $thread)
    <div class="box box-widget">
        <div class="box-header with-border">
            <div class="user-block">
                <img class="img-circle" src="{{ 'storage/user_images/'.$thread->user->profile_picture }}" alt="User Image">
                <span class="username">{{ $thread->user->name }}</span>
                <span class="description">{{ $thread->created_at->diffForHumans() }}</span>

            </div>
            <!-- /.user-block -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <!-- post text -->
            <a href="/ask-detail"><h5>{{ $thread->topic->topic_name  }}</h5></a>
            <p>{!! $thread->trimStr($thread->question) !!}</p>

            @if($thread->doctor_id == null)
                <span class="pull-left text-muted">
                    <small>Belum Dijawab</small>
                </span>
            @else
                <span class="pull-left">
                    <i class="fa fa-check-circle text-primary"></i>
                    <small>Dijawab oleh <b>User</b></small>
                </span>
            @endif

        </div>
        <hr>
    </div>
@endforeach

