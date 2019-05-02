@extends('layouts.adm-app')

@section('content')
    <section class="content-header">
        <h1>
            Dashboard
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fas fa-tachometer-alt"></i> {{ session('role') }}</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        <div class="row">

            <div class="col-lg-12 col-xs-12">
                @auth('doctor')
                    @if( $data['doctor']->city_id == null || $data['doctor']->gender == null || $data['doctor']->biography == null || $data['doctor']->profile_picture == 'user-default.jpg')
                    <div class="alert alert-warning alert-dismissible text-center mt-2 mb-2" role="alert" style="margin-top: 20px">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <i class="fa far fa-exclamation-triangle pull-left float-left fa-3x"></i>
                        <strong>Peringatan !</strong><br>
                        {{ $data['warning'] }}
                    </div>
                    @endif
                @endauth
                <div class="callout" style="margin-bottom: 0!important;">
                    <h3>
                        {!! Auth::guard(session('guard'))->user()->getGreetings() !!}
                        <strong>
                            @auth('doctor')
                                dr.
                            @endauth
                            {{ Auth::guard(session('guard'))->user()->name }}
                        </strong>
                        !
                    </h3>
                    <i>Awali dengan Doa, Mari bantu sesama, Untuk dunia yang lebih baik dari sebelumnya.</i>
                </div>
            </div>
        </div>

        @auth('admin')
        <div class="pad margin no-print">
            <div class="row">
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-teal">
                        <div class="inner">
                            <h3>{{ $data['articles'] }}</h3>
                            <p>Artikel tercatat</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-android-document"></i>
                        </div>
                        <a href="{{ url('/admin/article') }}" class="small-box-footer">
                            Selengkapnya <i class="fa fa-angle-double-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>{{ $data['doctors'] }}</h3>
                            <p>Tenaga medis</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user-md fa-sm"></i>
                        </div>
                        <a href="{{ url('/admin/doctor') }}" class="small-box-footer">
                            Selengkapnya <i class="fa fa-angle-double-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-blue">
                        <div class="inner">
                            <h3>{{ $data['members'] }}</h3>
                            <p>Member terdaftar</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <a href="{{ url('/admin/member') }}" class="small-box-footer">
                            Selengkapnya <i class="fa fa-angle-double-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-purple">
                        <div class="inner">
                            <h3>{{ $data['threads'] }}</h3>
                            <p>Diskusi dibuat</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-comments"></i>
                        </div>
                        <a href="{{ url('/admin/thread/all') }}" class="small-box-footer">
                            Selengkapnya <i class="fa fa-angle-double-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <i class="fa fa-bar-chart-o"></i>

                            <h3 class="box-title">Statistik Pengunjung</h3>
                        </div>
                        <div class="box-body">
                            <div id="line-chart" style="height: 200px;"></div>
                        </div>
                        <!-- /.box-body-->
                    </div>
                    <!-- /.box -->
                </div>
                <div class="col-md-4">
                    <div class="box box-danger">
                        <div class="box-header with-border">
                            <h3 class="box-title">Dikunjungi Oleh</h3>
                        </div>
                        <div class="box-body chart-responsive">
                            <div class="chart" id="donutz" style="height: 200px; position: relative;"></div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
            </div>
        </div>
        @endauth

    </section>
    <script src="{{ asset("bower_components/jquery/dist/jquery.min.js") }}" type="text/javascript"></script>
    <script src="{{ asset("bower_components/morris.js/morris.min.js") }}" type="text/javascript"></script>
    <script src="{{ asset("bower_components/raphael/raphael.min.js") }}" type="text/javascript"></script>
    <script>
        $(document).ready(function() {
            var line = new Morris.Line({
                element: 'line-chart',
                resize: true,
                data: [
                    {y: '2019-01-27', vis: 889},
                    {y: '2019-01-28', vis: 789},
                    {y: '2019-01-29', vis: 902},
                    {y: '2019-01-30', vis: 1832},
                    {y: '2019-01-31', vis: 1532},
                    {y: '2019-02-01', vis: 1021},
                    {y: '2019-02-02', vis: 2778},
                    {y: '2019-02-03', vis: 1321},
                    {y: '2019-02-04', vis: 1312},
                    {y: '2019-02-05', vis: 1201},
                    {y: '2019-02-06', vis: 1512},
                    {y: '2019-02-07', vis: 1447}
                ],
                xkey: 'y',
                ykeys: ['vis'],
                xLabels: ['month'],
                labels: ['Visits'],
                lineColors: ['#3c8dbc'],
                hideHover: 'auto'
            });

            var donut = new Morris.Donut({
                element: 'donutz',
                resize: true,
                colors: ["#00a65a", "#aaa"],
                data: [
                    {label: "Organik", value: 72},
                    {label: "Rujukan", value: 28}
                ],
                formatter: function (y) { return y + "%" },
                hideHover: 'auto'
            });
        });
    </script>
@endsection
