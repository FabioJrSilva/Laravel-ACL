@extends('layouts.app') 
@section('content')
<div class="container">
    @forelse ($posts as $post) @can('view_post', $post)
    <h3>{{ $post->title }}</h3>
    <p>{{ $post->description }}</p>
    <p>
        <b>Autor: {{ $post->user->name }}</b> @can('update_post', $post)
        <a href="{{ url("/post/$post->id/update") }}">Editar</a> @endcan
    </p>
    @endcan
    <hr> @empty
    <p>Nenhum $post cadastrado!</p>
    @endforelse
</div>
@endsection