@extends('backend.layouts.app')
@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>General Form</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">General Form</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-6">
                        <!-- general form elements -->
                        @if(session()->has('message'))
                            <div class="card card-success">
                                <div class="card-header">
                                    <h3 class="card-title">{{session()->get('message')}}</h3>
                                </div>
                            @endif
                            <!-- /.card-header -->
                                <!-- form start -->
                                <form action="{{route('update', $redirect->slug)}}" method="post">
                                    @csrf @method('patch')
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" name="name" class="form-control" id="name" placeholder="Site ismi" value="{{$redirect->name}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="slug">Slug</label>
                                            <input type="text" name="slug" class="form-control" id="slug" placeholder="Slug" value="{{$redirect->slug}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="slug">Url</label>
                                            <input type="text" name="url" class="form-control" id="url" placeholder="Url" value="{{$redirect->url}}">
                                        </div>

                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card -->

                    </div>
                    <!--/.col (left) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
