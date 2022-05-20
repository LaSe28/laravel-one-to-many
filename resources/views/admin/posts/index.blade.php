@extends('layouts.admin')
@section('title', 'Posts')
@section('content')
<div class="container ">
    <div class="row justify-content-center">
        @foreach ($posts as $post)
        <div class="card mx-4 my-5" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">{{$post->title}}</h5>
                <p class="card-text">{{$post->content}}</p>
                <p class="card-text">Aggiunto il: {{date('d-m-Y', strtotime($post->created_at))}}</p>
                <a href="{{route('admin.posts.show', $post->slug)}}" class="me-1 btn btn-primary">Apri</a>
                <a href="{{route('admin.posts.edit', $post->slug)}}" class="btn btn-primary">Modifica</a>
                <form id="form-delete" action="{{ route('admin.posts.destroy', $post->slug) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn-delete btn btn-danger mt-2" type="submit">Elimina</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
    <div class="row justify-content-center">
        <a href="{{route('admin.posts.create')}}" class="col-lg-2 btn btn-primary my-5">Aggiungi post</a>
        <div class="pages">
            {{$posts->links()}}
        </div>
    </div>
</div>
@endsection

