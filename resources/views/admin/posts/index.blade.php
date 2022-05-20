@extends('layouts.admin')
@section('title', 'Posts')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="pages">
            {{$posts->links()}}
        </div>
        @foreach ($posts as $post)
          <div class="card mx-4 my-5" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">{{$post->title}}</h5>
                <p class="card-text">{{$post->content}}</p>
                <p class="card-text">Aggiunto il: {{date('d-m-Y', strtotime($post->created_at))}}</p>
                <a href="{{route('admin.posts.show', $post->slug)}}" class="btn btn-primary">Apri</a>
                <a href="{{route('admin.posts.edit', $post->slug)}}" class="btn btn-primary">Modifica</a>
            </div>
          </div>
        @endforeach
        <a href="{{route('admin.posts.create')}}" class="btn btn-primary">Aggiungi post</a>
    </div>
</div>
@endsection

