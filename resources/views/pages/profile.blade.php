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
    
@endsection
