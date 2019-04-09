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

        <div class="pad margin no-print">
            <div class="callout callout-info" style="margin-bottom: 0!important;">
                <h3>
                    {!! Auth::guard(session('guard'))->user()->getGreetings() !!}
                    <strong>
                        {{ Auth::guard(session('guard'))->user()->name }}
                    </strong>
                    !
                </h3>
                <i>Awali dengan Doa, Bekerja dengan Semangat, Pulang dengan Selamat, Amiin.</i>
            </div>
        </div>

    </section>
@endsection
