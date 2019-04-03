@extends('layouts.user-profile')

@section('user-content')
    <div class="modal-content">
        <div class="modal-header">
            <strong>Diskusi anda</strong>
            <a href="#" class="btn btn-info btn-sm pull-right text-light">
                <strong>
                    <i class="fas fa-question"></i>
                    &nbsp;Tanya Dokter
                </strong>
            </a>
        </div>
        <div class="modal-body">
            <div class="alert alert-warning text-center">
                <span>Anda belum membuat diskusi apapun.</span>
            </div>
        </div>
    </div>
@endsection