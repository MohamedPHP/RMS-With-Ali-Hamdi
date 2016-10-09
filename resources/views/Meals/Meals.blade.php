@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Meals</div>
                <div class="panel-body">
                    <a href="Meals/create" class="btn btn-default" style="margin: 10px 0;">Add New Meal</a>
                    <table width="100%" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr style="background-color:#444; color:#f6f6f6;">
                                <th>ID</th>
                                <th>Title</th>
                                <th>Image</th>
                                <td>Created By</td>
                                <th>Describtion</th>
                                <th>Status</th>
                                <th>price</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($meals as $meal)
                                <tr>
                                    <td>{{$meal->id}}</td>
                                    <td>{{$meal->title}}</td>
                                    <td><img width='128' height='128' class='img-responsive imgThumb' src="{{$meal->image}}"></td>
                                    <td>{{$meal->user->name}}</td>
                                    <td>{{$meal->describtion}}</td>
                                    <td>
                                        @if($meal->status == 1)
                                            <span style="color:#337ab7;">True</span>
                                        @endif
                                        @if($meal->status == 0)
                                            <span style="color:#c9302c;">False</span>
                                        @endif
                                    </td>
                                    <td>{{$meal->price}}</td>
                                    <td>
                                        {!! Form::open(['method'=>'DELETE', 'route'=>['Meals.destroy', $meal->id]]) !!}
                                        {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                    <td><a href="/Meals/{{$meal->id}}/edit" class="btn btn-primary">Edit</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- /.table-responsive -->
                    <div class="pagination col-lg-12">
                        {!! $meals->render() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
