@extends('layouts.adm-app')

@section('content')
<section class="content-header">
        <h1>
            Profile Admin
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> {{ session('role') }}</a></li>
            <li class="active">QNA</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="col col-md-3">
            <div class="box box-primary">
                <div class="box-body box-profile">
                <img class="profile-user-img img-responsive img-circle" src="/bower_components/admin-lte/dist/img/user4-128x128.jpg" alt="User profile picture">

                <h3 class="profile-username text-center">AhmadSyifaur</h3>
                <p class="text-muted text-center">ahmadsyifaur11@gmail.com</p>

                <a href="" data-toggle="modal" data-target="#modal-default"><p class="text text-center">Change Picture</p></a>
                <a href="" data-toggle="modal" data-target="#modal-default"><p class="text text-center">Change Password</p></a>
                <!-- <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                  Change Picture
                </button> -->
                <!-- Modal -->
                <div class="modal fade" id="modal-default" style="display: none;">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">Change Picture</h4>
                      </div>
                      <div class="modal-body">
                        <img class="center" src="/bower_components/admin-lte/dist/img/user4-128x128.jpg" alt="User profile picture">
                        <div class="form-group">
                          <label for="exampleInputFile">Import From PC</label>
                          <input type="file" id="exampleInputFile">
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                      </div>
                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
                </div>
                <hr>
                <ul class="list-group list-group-unbordered sidebar-menu tree" data-widget="tree">
                    <li>
                        <a href="/admin/profile/edit">
                        <p class="text-center"><b><i class="fa fa-edit "></i> Edit Profile</b></p>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/profile/article">
                        <p class="text-center"><b><i class="fa fa-file-text "></i> Articles</b></p>
                        </a>
                    </li>
                </ul>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
        <div class="col col-md-8">
          <div class="box box-widget">
            @yield('content1')
          </div>
        </div>
    </section>
@endsection
