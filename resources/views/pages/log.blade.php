@extends('layouts.admin-profile')

@section('admin-content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <strong class="box-title">Log Aktivitas</strong>
        </div>
        <div class="box-body bg-gray-light">
            <ul class="timeline">

                <li class="time-label">
                    <span class="bg-aqua">
                        26 Apr. 2019
                    </span>
                </li>
                <li>
                    <!-- timeline icon -->
                    <i class="fa fas fa-user-edit bg-blue"></i>
                    <div class="timeline-item">
                        <span class="time"><i class="far fa-clock"></i> 00:05</span>

                        <h3 class="timeline-header">
                            <span class="badge bg-red">Admin</span>&nbsp;
                            <a href="#">Fauzan AR.</a> membuat artikel baru.
                        </h3>

                        <div class="timeline-body">
                            <h4>Ablasi Retina</h4>
                            <p>Ablasi retina adalah penyakit mata akibat lepasnya lapisan tipis di dalam mata yang disebut retina. Kondisi ini tergolong darurat dan dapat menyebabkan kebutaan perma...</p>
                        </div>

                        <div class="timeline-footer">
                            <a class="btn btn-primary btn-xs" href="#">
                                <i class="fa fa-share margin-r-5"></i>Selengkapnya
                            </a>
                        </div>
                    </div>
                </li>
                <li>
                    <!-- timeline icon -->
                    <i class="fa fas fa-reply-all bg-green"></i>
                    <div class="timeline-item">
                        <span class="time"><i class="far fa-clock"></i> 15:34</span>

                        <h3 class="timeline-header">
                            <span class="badge bg-yellow-gradient">Dokter</span>&nbsp;
                            <a href="#">Alfuzzy Satria J.</a> menjawab diskusi oleh <a href="#">Ahmad Syifaur</a>.
                        </h3>

                        <div class="timeline-body">
                            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium deleniti atque corrupti cumque nihil impedit quo minus id quod maxime...</p>
                        </div>

                        <div class="timeline-footer">
                            <a class="btn btn-primary btn-xs" href="#">
                                <i class="fa fa-share margin-r-5"></i>Selengkapnya
                            </a>
                        </div>
                    </div>
                </li>

                <li class="time-label">
                    <span class="bg-purple">
                        25 Apr. 2019
                    </span>
                </li>
                <li>
                    <!-- timeline icon -->
                    <i class="fa fas fa-reply-all bg-green"></i>
                    <div class="timeline-item">
                        <span class="time"><i class="far fa-clock"></i> 21:21</span>

                        <h3 class="timeline-header">
                            <span class="badge bg-yellow-gradient">Dokter</span>&nbsp;
                            <a href="#">Alfuzzy Satria J.</a> menjawab diskusi oleh <a href="#">Endah Astuti</a>.
                        </h3>

                        <div class="timeline-body">
                            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium deleniti atque corrupti cumque nihil impedit quo minus id quod maxime...</p>
                        </div>

                        <div class="timeline-footer">
                            <a class="btn btn-primary btn-xs" href="#">
                                <i class="fa fa-share margin-r-5"></i>Selengkapnya
                            </a>
                        </div>
                    </div>
                </li>
                <li>
                    <!-- timeline icon -->
                    <i class="fa fas fa-comment-dots bg-yellow"></i>
                    <div class="timeline-item">
                        <span class="time"><i class="far fa-clock"></i> 12:49</span>

                        <h3 class="timeline-header">
                            <span class="badge bg-blue-gradient">Member</span>&nbsp;
                            <a href="#">Endah Astuti</a> membuat diskusi baru.
                        </h3>

                        <div class="timeline-body">
                            <h4>Telinga saya budeg</h4>
                            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium deleniti atque corrupti cumque nihil impedit quo minus id quod maxime...</p>
                        </div>

                        <div class="timeline-footer">
                            <a class="btn btn-primary btn-xs" href="#">
                                <i class="fa fa-share margin-r-5"></i>Selengkapnya
                            </a>
                        </div>
                    </div>
                </li>

            </ul>
        </div>
    </div>
@endsection
