@extends('layouts.admin')
@section('title', $title)
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <h2 class="card-title">{{$post->title}}</h2>
        <p class="card-text">{{$post->content}}</p>
        <p class="card-text">Aggiunto il: {{date('d-m-Y', strtotime($post->created_at))}}</p>
    </div>
</div>
@endsection
