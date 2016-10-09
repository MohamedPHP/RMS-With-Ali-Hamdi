@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Items</div>
                <div class="panel-body">
                    <a href="Items/create" class="btn btn-default" style="margin: 10px 0;">Add New Item</a>
                    <table width="100%" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr style="background-color:#444; color:#f6f6f6;">
                                <th>ID</th>
                                <th>Title</th>
                                <th>Image</th>
                                <td>Created By</td>
                                <td>Menu Refferer</td>
                                <th>Describtion</th>
                                <th>Status</th>
                                <th>price</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->title}}</td>
                                    <td><img width='128' height='128' class='img-responsive imgThumb' src="{{$item->image}}"></td>
                                    <td>{{$item->user->name}}</td>
                                    <td>{{$item->menu->title}}</td>
                                    <td>{{$item->describtion}}</td>
                                    <td>
                                        @if($item->status == 1)
                                            <span style="color:#337ab7;">True</span>
                                        @endif
                                        @if($item->status == 0)
                                            <span style="color:#c9302c;">False</span>
                                        @endif
                                    </td>
                                    <td>{{$item->price}}$</td>
                                    <td>
                                        {!! Form::open(['method'=>'DELETE', 'route'=>['Items.destroy', $item->id]]) !!}
                                        {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                    <td><a href="/Items/{{$item->id}}/edit" class="btn btn-primary">Edit</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- /.table-responsive -->
                    <div class="pagination col-lg-12">
                        {!! $items->render() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
