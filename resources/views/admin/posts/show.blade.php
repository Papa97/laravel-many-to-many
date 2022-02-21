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

    @if (count($post->tags) > 0)
         <div>Tags: 
             @foreach ($post->tags as $tag)
                 <span class="badge badge-light">{{$tag->name}}</span>
             @endforeach
         </div>
    @endif

</div>

@endsection