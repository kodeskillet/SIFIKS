@extends('pages.profile')

@section('content1')
    <div class="box box-widget">
        <div class="box-header with-border">
            <div class="user-block">
                <img class="img-circle" src="/bower_components/admin-lte/dist/img/user1-128x128.jpg" alt="User Image">
                <span class="username"><a href="#">Ahmad Syiufaur</a></span>
                <span class="description">7:30 PM Today</span>
            </div>
            <!-- /.user-block -->
            <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="" data-original-title="Mark as read">
                <i class="fa fa-circle-o"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
            <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <!-- post text -->
            <p>Far far away, behind the word mountains, far from the
            countries Vokalia and Consonantia, there live the blind
            texts. Separated they live in Bookmarksgrove right at</p>

            <p>the coast of the Semantics, a large language ocean.
            A small river named Duden flows by their place and supplies
            it with the necessary regelialia. It is a paradisematic
            country, in which roasted parts of sentences fly into
            your mouth.</p>

            <!-- Attachment -->
            <div class="attachment-block clearfix">
            <img class="attachment-img" src="/bower_components/admin-lte/dist/img/photo1.png" alt="Attachment Image">

            <div class="attachment-pushed">
                <h4 class="attachment-heading"><a href="http://www.lipsum.com/">Lorem ipsum text generator</a></h4>

                <div class="attachment-text">
                Description about the attachment can be placed here.
                Lorem Ipsum is simply dummy text of the printing and typesetting industry... <a href="#">more</a>
                </div>
                <!-- /.attachment-text -->
            </div>
            <!-- /.attachment-pushed -->
            </div>
            <!-- /.attachment-block -->

            <!-- Social sharing buttons -->
            <button type="button" class="btn btn-default btn-xs"><i class="fa fa-share"></i> Share</button>
            <button type="button" class="btn btn-default btn-xs"><i class="fa fa-thumbs-o-up"></i> Like</button>
            <span class="pull-right text-muted">45 likes - 2 comments</span>
        </div>
        <!-- /.box-body -->
    </div>
@endsection