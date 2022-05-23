@extends('layouts.admin')
@section('title', $title)
@section('content')
<div class="container pt-5">
    <div class="row justify-content-center">
        <h2 class="card-title">{{$post->title}}</h2>
        <div class="card-text my-3">{{$post->content}}</div>
        <div class="card-text my-3">Aggiunto il: {{date('d-m-Y', strtotime($post->created_at))}}</div>
        <div class="my-2">Da {{$post->user->name}}</div>
    </div>
    @if ($post->user_id === Auth::user()->id)
    <a href="{{route('admin.posts.edit', $post->slug)}}" class="btn btn-primary my-3">Modifica</a>
    <button class="btn-delete-show btn btn-danger" type="submit">Elimina</button>
    @endif
    <div>
        <h3 class="my-4">Altri post di {{$post->user->name}}</h3>
        <div class="row justify-content-center">
            @foreach ($posts as $post)
            @if (url()->current() !== 'http://localhost:8000/admin/posts/' . $post->slug)
            <div class="card mx-4 my-5" style="width: 15rem;">
                <div class="card-title">{{$post->title}}</div>
                <div class="card-text my-3">Aggiunto il: {{date('d-m-Y', strtotime($post->created_at))}}</div>
                <a href="{{route('admin.posts.show', $post->slug)}}" class="col-3 align-self-end btn btn-primary">Apri</a>
            </div>
            @endif
            @endforeach
        </div>
    </div>
</div>
<div class="d-none" id="popup">
    <div class="message">
        <div class="row justify-content-center ">
            <div class="mt-3 text-center">Sei sicuro di voler eliminare questo post?</div>
            <div id="title" class="mb-4 text-center fs-1"></div>
            <button id="btn-si" class="btn-danger btn col-2 mx-2 mb-3">Si</button>
            <a href="" class="btn btn-primary col-2 mx-2 mb-3">No</a>
            <form class="" id="form-delete" data-base="{{ route('admin.posts.destroy', '*****') }}" method="post">
                @csrf
                @method('DELETE')
            </form>
        </div>
    </div>
</div>
@endsection
