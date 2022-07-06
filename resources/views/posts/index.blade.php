@extends('layouts.app')

@section('content')
<h2>Index Page</h2>
<ul>

@foreach($posts as $post)

@csrf

<div class="image-container">
    <img height="100" width="100" src="/images/{{$post->path}}">
</div>

<li><a href="{{route('posts.show', $post->id)}}">{{$post->title}}</a></li>

@endforeach

</ul>

@endsection


<!-- <form action="/uploadfile" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <input type="file" class="form-control-file" name="fileToUpload" id="exampleInputFile">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form> -->