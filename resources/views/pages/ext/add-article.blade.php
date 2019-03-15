@extends('layouts.adm-app')

@section('content')
    <div class="box box-primary">
        {{--<div class="box-header with-border">--}}
            {{--<h3 class="box-title">Add New Artikel</h3>--}}
        {{--</div>--}}
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form">
            <div class="box-body">

                <div class="form-group">
                    <label for="category">Category</label>
                    <select id="category" class="form-control">
                        <option>Medicine</option>
                        <option>Health</option>
                        <option>Sickness</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <input type="text" class="form-control" id="name" placeholder="Give it a title...">
                </div>

                <div class="box-body pad">
                    <label for="editor1">Content</label>
                    <form>
                <textarea id="editor1" name="editor1">
                </textarea>
                    </form>
                </div>

                <!-- <div class="form-group">
                    <label for="exampleInputEmail1">City</label>
                    <input type="text" class="form-control" id="city" placeholder="Enter City">
                </div> -->

                <div class="form-group">
                    <label for="picture">Picture</label>
                    <input type="file" id="picture">

                    <p class="help-block">Example block-level help text here.</p>
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox"> Check me out
                    </label>
                </div>
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
        </form>
    </div>
@endsection
