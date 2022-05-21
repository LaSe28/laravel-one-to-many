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
    <a href="{{route('admin.posts.edit', $post->slug)}}" class="btn btn-primary my-3">Modifica</a>
    <button class="btn-delete btn btn-danger" type="submit">Elimina</button>
    <form id="form-delete" action="{{ route('admin.posts.destroy', $post->slug) }}" method="post">
        @csrf
        @method('DELETE')
    </form>
    <div>
        <h3 class="my-4">Altri post di {{$post->user->name}}</h3>
        <div class="row justify-content-center">
            @foreach ($posts as $post)
            @if (url()->current() !== 'http://localhost:8000/admin/posts/' . $post->slug)
            <div class="card mx-4 my-5" style="width: 15rem;">
                <div class="card-title">{{$post->title}}</div>
                <div class="card-text my-3">Aggiunto il: {{date('d-m-Y', strtotime($post->created_at))}}</div>
                <td><a href="{{route('admin.posts.show', $post->slug)}}" class="me-1 btn btn-primary">Apri</a></td>
            </div>
            @endif
            @endforeach
        </div>
    </div>
</div>
@endsection
