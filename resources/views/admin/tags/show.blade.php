@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Nome: {{$tag->name}}</h1>
    <h2>Slug: {{$tag->slug}}</h2>    
</div>

@endsection