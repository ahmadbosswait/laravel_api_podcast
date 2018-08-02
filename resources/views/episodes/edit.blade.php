@extends('layouts.app') 

@section('content')
    <h1>Edit Episode </h1>
    {!! Form::open(['action' => ['EpisodeController@update',$episode->id],'method'=>'POST']) !!}
        <div class="form-group">
            {{Form::label('download_url','Download Url')}}
            {{Form::text('download_url',$episode->download_url,['class'=>'form-control','placeholder'=>'Download Url'])}}
        </div>
        <div class="form-group">
            {{Form::label('title','Title')}}
            {{Form::text('title',$episode->title,['class'=>'form-control','placeholder'=>'Title'])}}
        </div>
        <div class="form-group">
            {{Form::label('description','Description')}}
            {{Form::textarea('description',$episode->description,['class'=>'form-control','placeholder'=>'Description'])}}
        </div>
        <div class="form-group">
            {{Form::label('episode_number','Episode Number')}}
            {{Form::text('episode_number',$episode->episode_number,['class'=>'form-control','placeholder'=>'Episode Number'])}}
        </div>
        {{Form::hidden('_method','PUT')}}
        {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
    <br><br><br>
@endsection