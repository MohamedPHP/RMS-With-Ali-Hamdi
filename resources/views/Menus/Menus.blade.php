@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Menus</div>
                <div class="panel-body">
                    <a href="Menus/create" class="btn btn-default" style="margin: 10px 0;">Add New Menu</a>
                    <table class="table table-hover table-responsive table-bordered">
                        <tr style="background-color:#333;color:#fff;">
                            <th>ID</th>
                            <th>Title</th>
                            <th>Image</th>
                            <td>Created By</td>
                            <th>Describtion</th>
                            <th>Status</th>
                            <th>Type</th>
                            <th>Delete</th>
                            <th>Edit</th>
                        </tr>
                        @foreach ($menus as $menu)
                            <tr>
                                <td>{{$menu->id}}</td>
                                <td>{{$menu->title}}</td>
                                <td><img width='128' height='128' class='img-responsive imgThumb' src="{{$menu->image}}"></td>
                                <td>{{$menu->user->name}}</td>
                                <td>{{$menu->describtion}}</td>
                                <td>
                                    @if($menu->status == 1)
                                        <span style="color:#337ab7;">True</span>
                                    @endif
                                    @if($menu->status == 0)
                                        <span style="color:#c9302c;">False</span>
                                    @endif
                                </td>
                                <td>{{$menu->type}}</td>
                                <td>
                                    {!! Form::open(['method'=>'DELETE', 'route'=>['Menus.destroy', $menu->id]]) !!}
                                    {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                                    {!! Form::close() !!}
                                </td>
                                <td><a href="/Menus/{{$menu->id}}/edit" class="btn btn-primary">Edit</a></td>
                            </tr>
                        @endforeach
                    </table>
                    <div class="pagination col-lg-12">
                        {!! $menus->render() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
