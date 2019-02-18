@extends('layouts.app') 
@section('content')
<div class="container">
    @forelse ($posts as $post)
    <h3>{{ $post->title }}</h3>
    <p>{{ $post->description }}</p>
    <p>
        <b>Autor: {{ $post->user->name }}</b> @can('update-post', $post)
        <a href="{{ url("/post/$post->id/update") }}">Editar</a> @endcan
    </p>
    <hr> @empty
    <p>Nenhum $post cadastrado!</p>
    @endforelse
</div>
@endsection