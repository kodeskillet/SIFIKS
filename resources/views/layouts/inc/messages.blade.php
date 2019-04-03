@if(session('success'))
    <div class="alert alert-success alert-dismissible text-center mt-2 mb-2" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>Sukses !</strong><br>
        {{ session('success') }}
    </div>
@endif

@if(session('failed'))
    <div class="alert alert-danger alert-dismissible text-center mt-2" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>Gagal !</strong><br>
        {{ session('failed') }}
    </div>
@endif

@if(session('info'))
<div class="alert alert-info alert-dismissible text-center mt-2 mb-2" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <strong>Informasi !</strong><br>
    {{ session('info') }}
</div>
@endif

@if(session('warning'))
<div class="alert alert-warning alert-dismissible text-center mt-2 mb-2" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <strong>Peringatan !</strong><br>
    {{ session('warning') }}
</div>
@endif
