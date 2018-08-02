@extends('layouts.app') 

@section('content')
    <h1>Create New Episode </h1>
    {!! Form::open(['action' => 'EpisodeController@store','method'=>'POST']) !!}
        <div class="form-group">
            {{Form::label('download_url','Download Url')}}
            {{Form::text('download_url','',['class'=>'form-control','placeholder'=>'Download Url'])}}
        </div>
        <div class="form-group">
            {{Form::label('title','Title')}}
            {{Form::text('title','',['class'=>'form-control','placeholder'=>'Title'])}}
        </div>
        <div class="form-group">
            {{Form::label('description','Description')}}
            {{Form::textarea('description','',['class'=>'form-control','placeholder'=>'Description'])}}
        </div>
        <div class="form-group">
            {{Form::label('episode_number','Episode Number')}}
            {{Form::text('episode_number','',['class'=>'form-control','placeholder'=>'Episode Number'])}}
        </div>
        {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
    <br><br><br>
@endsection