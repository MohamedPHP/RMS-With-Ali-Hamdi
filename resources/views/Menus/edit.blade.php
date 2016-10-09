@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Menu: {{$menu->title}}</div>
                <div class="panel-body">
                    <div class="col-lg-8">
                    {!! Form::model($menu ,array('method' => 'PATCH', 'action' => ['MenusController@update', $menu->id], 'files'=>true)) !!}
                        <div class="form-group col-lg-4">
                            {!! Form::text('title', null, array('required', 'class'=>'form-control', 'placeholder'=>'Menu Title')) !!}
                        </div>
                        <div class="form-group col-lg-4">
                            {!! Form::select('type', ['food'=>'food','hot drinks'=>'tea','cold drinks'=>'pepsi'], null, array('required', 'class'=>'form-control', 'placeholder'=>'Menu Type')) !!}
                        </div>
                        <div class="form-group col-lg-4">
                            {!! Form::select('status', ['1'=>'active','0'=>'Inactive'], null, array('required', 'class'=>'form-control', 'placeholder'=>'Menu Status')) !!}
                        </div>
                        <div class="form-group col-lg-12">
                            {!! Form::textarea('describtion', null, array('required', 'class'=>'form-control', 'placeholder'=>'Menu Describtion')) !!}
                        </div>
                        <div class="form-group col-lg-4">
                            {!! Form::file('image', array('id'=>'file-7', 'class'=>'inputfile inputfile-6')) !!}
                            <label for="file-7"><strong><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> Choose a Image&hellip;</strong></label>
                        </div>
                        <div class="form-group col-lg-3">
                            {!! Form::submit('Update', array('class'=>'btn btn-primary btn-block')) !!}
                        </div>
                    {!! Form::close() !!}
                    </div>
                    <div class="col-lg-4">
                        <img class="img-responsive img-rounded" src="{{asset($menu->image)}}" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
