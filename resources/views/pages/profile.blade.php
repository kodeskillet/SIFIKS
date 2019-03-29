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
            <div class="box box-primary" data-widget="tree">
                <div class="box-body box-profile">
                <img class="profile-user-img img-responsive img-circle" src="/bower_components/admin-lte/dist/img/user4-128x128.jpg" alt="User profile picture">

                <h3 class="profile-username text-center">AhmadSyifaur</h3>
                <p class="text-muted text-center">ahmadsyifaur11@gmail.com</p>

                <a href=""><p class="text text-center">Change Picture</p></a>
                <hr>
                <ul class="list-group list-group-unbordered sidebar-menu tree" data-widget="tree">
                    <li class="treeview">
                        <a href="">
                        <p class="text-center"><b><i class="fa fa-edit "></i> Edit Profile</b></p>
                        </a>
                    </li>
                    <li class="treeview active">
                        <a href="">
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
            
          </div>
        </div>
    </section>
@endsection
