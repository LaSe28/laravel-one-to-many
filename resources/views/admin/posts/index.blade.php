@extends('layouts.admin')
@section('title', 'Posts')
@section('content')
<div class="container ">
    <a class="btn btn-primary" href="{{ route('admin.home') }}">Home</a>
    <div class="row justify-content-center">
        {{-- @foreach ($posts as $post)
        <div class="card mx-4 my-5" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">{{$post->title}}</h5>
                <p class="card-text">{{$post->content}}</p>
                <p class="card-text">Aggiunto il: {{date('d-m-Y', strtotime($post->created_at))}}</p>
                @if ($post->user_id === Auth::user()->id)
                <a href="{{route('admin.posts.show', $post->slug)}}" class="me-1 btn btn-primary">Apri</a>
                <a href="{{route('admin.posts.edit', $post->slug)}}" class="btn btn-primary">Modifica</a>
                <form id="form-delete" action="{{ route('admin.posts.destroy', $post->slug) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn-delete btn btn-danger mt-2" type="submit">Elimina</button>
                </form>
                @endif
            </div>
        </div>
        @endforeach --}}

        <table class="table">
            <thead>
              <tr>
                <th class="text-center"  scope="col">Title</th>
                <th class="text-center"  scope="col">Created</th>
                <th class="text-center"  scope="col">Author</th>
                <th class="text-center" scope="col" colspan="2">Actions</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($posts as $post)
              <tr>
                <th scope="row">{{$post->title}}</th>
                <td>{{date('d-m-Y', strtotime($post->created_at))}}</td>
                <td>{{$post->user->name}}</td>
                <td  class="text-center">
                    @if ($post->user_id === Auth::user()->id)
                    <a href="{{route('admin.posts.show', $post->slug)}}" class="me-1 btn btn-primary">Apri</a>
                    @endif
                    @if ($post->user_id === Auth::user()->id)
                    <a href="{{route('admin.posts.edit', $post->slug)}}" class="btn btn-primary">Modifica</a>
                    @else
                    <div class="text-center text-secondary text-opacity-50" >Nessuna azione disponibile su questo post</div>
                    @endif
                </td>
                <td>
                    <form id="form-delete" action="{{ route('admin.posts.destroy', $post->slug) }}" method="post">
                    @csrf
                    @method('DELETE')
                    @if ($post->user_id === Auth::user()->id)
                    <button class="btn-delete btn btn-danger" type="submit">Elimina</button>
                    @endif
                    </form>
                </td>
              </tr>
            @endforeach
            </tbody>

        </table>
    </div>
    <div class="row justify-content-center">
        <a href="{{route('admin.posts.create')}}" class="col-lg-2 btn btn-primary my-5">Aggiungi post</a>
        <div class="pages">
            {{$posts->links()}}
        </div>
    </div>
</div>
@endsection

