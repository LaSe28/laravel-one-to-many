@extends('layouts.admin')
@section('title', 'Posts')
@section('content')
<div class="container ">
    <a class="btn btn-primary" href="{{ route('admin.home') }}">Home</a>
    <div class="row justify-content-center">
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
              <tr data-title="{{$post->title}}" data-id="{{ $post->slug }}">
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
                    @if ($post->user_id === Auth::user()->id)
                    <button class="btn-delete btn btn-danger" type="submit">Elimina</button>
                    @endif
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
<div class="d-none" id="popup">
    <div class="message">
        <div class="row justify-content-center ">
            <div class="mt-3 text-center">Sei sicuro di voler eliminare questo post?</div>
            <div id="title" class="mb-4 text-center fs-4"></div>
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

