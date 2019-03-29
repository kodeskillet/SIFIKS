@extends('pages.profile')

@section('content1')
    <section>
        <div class="container">
            <!-- <div class="container"> -->
                <p><h3>Change Password</h3></p>
                <div class="row">
                    <div class="col-md-5">
                        <p>Old Password</p>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                            <input type="password" class="form-control" placeholder="Name">
                        </div>
                        <br>
                        <p>New Password</p>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                            <input type="email" class="form-control" placeholder="Email">
                        </div>
                    </div>
                </div>
                <hr>
                <a href="" class="btn btn-primary">Save</a>
                <a href="" class="btn btn-warning">Cancel</a>
            <!-- </div> -->
        </div>
        <br>    
    </section>
@endsection