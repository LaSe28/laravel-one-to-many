@extends('layouts.admin')
@section('title', 'Create Post')
@section('content')
<div class="container">
    <form method="POST" action="{{route('admin.posts.store')}}">
        @csrf
        <div class="input-group mt-5 mb-3">
            <label for="title" class="input-group-text" id="basic-addon1">Titolo del Post</label>
            <input id="title-input" type="text" name="title" id="title" class="form-control" placeholder="..." aria-label="Username" aria-describedby="basic-addon1">
        </div>
        @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="input-group mt-5 mb-3">
            <label for="slug" class="input-group-text" id="basic-addon1">Slug del Post</label>
            <input id="slug-input" type="text" name="slug" id="slug" class="form-control" placeholder="..." aria-label="Username" aria-describedby="basic-addon1">
            <div id="slug" class="btn-secondary btn">Suggerisci uno slug</div>
        </div>

        @error('slug')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="input-group mt-5">
            <label for="content" class="input-group-text">Contenuto del Post</label>
            <textarea id="content" name="content" class="form-control" aria-label="With textarea"></textarea>
        </div>
        @error('content')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <button class="btn btn-primary mt-3" type="submit">Crea</button>
    </form>
</div>
@endsection

