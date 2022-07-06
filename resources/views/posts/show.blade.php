@extends('layouts.app')

@section('content')
<h2>Show Page</h2>
@csrf
<a href="{{route('posts.edit', $post->id)}}"><h1>{{$post->title}}</h1></a>
@endsection