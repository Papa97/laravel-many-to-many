@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Titolo: {{$post->title}}</h1>
    <div>slug: {{$post->slug}}</div>
    <p>content: {{$post->content}}</p>

    @if ($post->category)
        <div>Categoria: {{$post->category->name}}</div>
    @endif
        @if ($post->published == true)
            <div>pubblicato</div>
        @else
            <div>non pubblicato</div>
        @endif

</div>

@endsection