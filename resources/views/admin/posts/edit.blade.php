@extends('layouts.admin')
@section('title', 'Update Post')
@section('content')
<div class="container">
    <form method="POST" action="{{route('admin.posts.update', $post->slug)}}">
        @csrf
        @method('PUT')
        <div class="input-group mt-5 mb-3">
            <label for="title" class="input-group-text" id="basic-addon1">Titolo del Post</label>
            <input type="text" name="title" id="title" class="form-control" value="{{$post->title}}" aria-label="Username" aria-describedby="basic-addon1">
        </div>
        @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="input-group mt-5 mb-3">
            <label for="slug" class="input-group-text" id="basic-addon1">Slug del Post</label>
            <input type="text" name="slug" id="slug" class="form-control" value="{{$post->slug}}" aria-label="Username" aria-describedby="basic-addon1">
        </div>
        @error('slug')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="input-group mt-5">
            <label for="content" class="input-group-text">Contenuto del Post</label>
            <textarea id="content" name="content" class="form-control" aria-label="With textarea">{{$post->content}}</textarea>
        </div>
        @error('content')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <button class="btn btn-primary mt-3" type="submit">Aggiorna</button>
    </form>
</div>
@endsection

