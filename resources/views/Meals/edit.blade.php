@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Meal: {{$meal->title}}</div>
                <div class="panel-body">

                    {!! Form::model($meal ,array('method' => 'PATCH', 'action' => ['MealsController@update', $meal->id], 'files'=>true)) !!}
                        <div class="row">
                            <div class="col-lg-3">
                                <img style="height:193px;" class="img-responsive img-rounded" src="{{asset($meal->image)}}" />
                            </div>
                            <div class="col-lg-9">
                                <div class="form-group col-lg-3">
                                    {!! Form::text('title', null, array('required', 'class'=>'form-control', 'placeholder'=>'Meal Title')) !!}
                                </div>
                                <div class="form-group col-lg-3">
                                    {!! Form::select('status', ['1'=>'active','0'=>'Inactive'], null, array('required', 'class'=>'form-control', 'placeholder'=>'Meal Status')) !!}
                                </div>
                                <div class="form-group col-lg-3">
                                    {!! Form::text('price', null, array('required', 'class'=>'form-control', 'placeholder'=>'Meal Type $')) !!}
                                </div>
                                <div class="form-group col-lg-3">
                                    {!! Form::file('image', array('id'=>'file-7', 'class'=>'inputfile inputfile-6')) !!}
                                    <label for="file-7"><strong><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> Choose a Image&hellip;</strong></label>
                                </div>
                                <div class="form-group col-lg-12">
                                    {!! Form::textarea('describtion', null, array('required', 'class'=>'form-control', 'placeholder'=>'Meal Describtion')) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            @foreach($menus as $menu)
                                @if(count($menu->items) > 0)
                                    <div class="form-group col-lg-3 menuItems">
                                        <p  class="text-center" style="color:#333">{{ $menu->title }}</p>
                                        <ul>
                                            @foreach($menu->items as $item)
                                                <li>
                                                    <input name="items[]" type="checkbox" value="{{$item->id}}" @if(in_array($item->id, $mealitemsIDs)) checked @endif>
                                                    <input style="width:40px;" name="discount[{{$item->id}}]" type="number" @if(in_array($item->id, $mealitemsIDs)) value="{{$mealitemsIDsWithDiscount[$item->id]}}" @endif>
                                                    {{$item->title}}

                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <div class="clearfix"></div>
                        <div class="form-group col-lg-12">
                            {!! Form::submit('Update', array('class'=>'btn btn-primary btn-block')) !!}
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
