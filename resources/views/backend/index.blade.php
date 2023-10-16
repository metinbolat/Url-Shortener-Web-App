@extends('backend.layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Yönlendirmeler</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Anasayfa</a></li>
                        <li class="breadcrumb-item active">Yönlendirmeler</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Yönlendirmeler</h3>
            </div>
            @if(session()->has('message'))
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">{{session()->get('message')}}</h3>
                    </div>
                    @endif
            <div class="card-body">
                <div class="box">
                    <div class="box-header">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <div style="margin-left: 5px !important; margin-bottom: 5px !important;" class="ml-5"><a class="btn btn-primary" href="{{route('add')}}">Yeni Ekle</a></div>
                            </li>
                        </ul>
                    </div>
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tr>
                                <th>#</th>
                                <th>Site İsmi</th>
                                <th>Slug</th>
                                <th>Url</th>
                                <th></th>
                                <th>Eylemler</th>
                            </tr>
                            @foreach ($redirects as $redirect)
                                <tr>

                                    <td>{{$loop->index + 1}}</td>
                                    <td>{{$redirect->name}}</td>
                                    <td>{{url('/').'/'. $redirect->slug}}</td>
                                    <td><a href="{{$redirect->url}}">{{$redirect->url}}</a></td>
                                    <td width="5"><a href="{{route('edit',$redirect->slug)}}"><button class="btn btn-primary"><i class="fa fa-edit"></i></button></a></td>
                                    <td width="5"><form id="{{'form-delete-'.$redirect->id}}" method="post" action="{{route('delete', $redirect->slug)}}"> @csrf @method('delete')<button onclick="event.preventDefault();
                                                if(confirm('Do you really want to delete?'))       {
                                                document.getElementById('form-delete-{{$redirect->id}}')
                                                .submit()
                                                }" class="btn btn-primary"><i class="fa fa-trash"></i></button></form></td>
                                </tr>
                            @endforeach
                            <div class="col-md-12"><ul class="pagination pagination-sm no-margin pull-left">{!! $redirects->links() !!}</ul></div>
                        </table>

                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                        <ul class="pagination pagination-sm no-margin pull-left">
                            {!! $redirects->links() !!}
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
@endsection
