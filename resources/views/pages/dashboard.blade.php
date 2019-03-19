@extends('layouts.adm-app')

@section('content')
    <section class="content-header">
        <h1>
            Dashboard
            <small></small>
        </h1>
        <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> {{ session('role') }}</a></li>
        <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        <center>
            <h2>Welcome <b>{{ session('role') }}</b></h2>
        </center>

    </section>
@endsection
