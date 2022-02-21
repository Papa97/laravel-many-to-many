@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Nome: {{$category->name}}</h1>
    <h2>Slug: {{$category->slug}}</h2>
    @if (count($category->posts) > 0)
    <h3>Lista post associati:</h3>
    <ul>
        @foreach ($category->posts as $post)
            <li>{{$post->title}}</li>
        @endforeach
    </ul>
    @endif
</div>

@endsection