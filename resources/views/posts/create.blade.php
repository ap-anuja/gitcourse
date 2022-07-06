@extends('layouts.app')

@section('content')

<h2>Create Page</h2>
{{--<form method="post" action="/posts">--}}
    <!-- created a file upload functionality -->
{!! Form::open(['method'=>'POST', 'action'=>'\App\Http\Controllers\PostController@store', 'files'=>true]) !!}

<div class="form-group">
{!!Form::label('title', 'Title:')!!}  
{!! Form::text('title', null, ['class'=>'form-control'])!!}  
</div>

<!-- created a file upload functionality -->
<div class="form-group">
    {!! Form::file('file', ['class'=>'form-control'])!!}  
</div>

<div class="form-group">
    {!! Form::submit('Create Post', ['class'=>'btn btn-primary'])!!}
</div>
{!! Form::close() !!}

@if(count($errors)>0)
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif

@endsection