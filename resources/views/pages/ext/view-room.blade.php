@extends('layouts.adm-app')
@section('content')
    <section class="content-header">
        <h1>
            <a href="{{ route('hospital.show', $data['hospital']->id) }}" class="btn btn-default">
                <i class="fa fa-chevron-left"></i>
            </a>&nbsp;&nbsp;&nbsp;
            {{ $data['hospital']->name }}
            <small><b>( {{ $data['room']->name }} )</b></small>
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fas fa-tachometer-alt"></i> {{ session('role') }}</a></li>
            <li><a href="{{ route('hospital.index') }}">Rumah Sakit</a></li>
            <li><a href="{{ route('hospital.show', $data['hospital']->id) }}">{{ $data['hospital']->name  }}</a></li>
            <li class="active">
                {{ $data['room']->name  }}
            </li>
        </ol>
    </section>


    <!-- Main content -->
    <section class="content container-fluid">
        <div class="box box-primary">
            <div class="box-header with-border">
                <strong>Tentang {{ $data['room']->name }}</strong>
                <div class="box-tools pull-right">
                    {{--<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">--}}
                        {{--<i class="fa fa-plus"></i>--}}
                    {{--</button>--}}
                    {{--<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">--}}
                    {{--<i class="fa fa-times"></i>--}}
                    {{--</button>--}}
                </div>
            </div>
            <div class="box-body with-border">
                <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                    <div class="row">
                        <div class="col-sm-12"></div>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-sm-10">
                                <h2>{{ $data['room']->name }}</h2>
                                <p>
                                    Terakhir diubah
                                    &nbsp;<strong>{{ $data['room']->updated_at->diffForHumans() }}</strong>
                                </p>
                                <div class="row">
                                    <div class="col-md-4">
                                        <h3>
                                            <small>Harga mulai dari</small><br>
                                            Rp. {{ number_format($data['room']->price_per_night, 2, ",", ".") }}
                                        </h3>
                                    </div>
                                    <div class="col-md-8">
                                        {!! $data['room']->description !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
