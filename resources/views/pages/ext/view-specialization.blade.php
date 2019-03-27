@extends('layouts.adm-app')
@section('content')
    <section class="content-header">
        <h1>
            <a href="{{ route('doctor.create') }}" class="btn btn-default">
                <i class="fa fa-chevron-left"></i>
            </a>&nbsp;&nbsp;&nbsp;
            Detail Spesialis
            <small><b>( {{ $specialty->degree  }} )</b></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/admin"><i class="fa fa-dashboard"></i> {{ session('role') }}</a></li>
            <li><a href="{{ route('doctor.index') }}">Dokter</a></li>
            <li><a href="{{ route('doctor.create') }}">Tambah Dokter</a></li>
            <li><a href="{{ route('specialty.index') }}">Spesialis</a></li>
            <li class="active">Detail Spesialis</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="box box-primary container" style="padding-bottom:20px;">
            <br>
            <div class="text-muted">
                Ditinjau <strong>{{ $specialty->created_at->format("d F Y") }}</strong>
            </div>
            <hr>
            <h2>{{ $specialty->degree }}</h2>
            <h4>{{ $specialty->name }}</h4> <br>
            {!! $specialty->detail !!}
        </div>
    </section>
@endsection
