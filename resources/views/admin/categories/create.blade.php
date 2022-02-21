@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{route("categories.store")}}" method="POST">
        @csrf
        <div class="form-group">
          <label for="name">Nome</label>
          <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="inserisci il nome della categoria" value="{{old('name')}}">
          @error('name')
             <div class="alert alert-danger">{{$message}}</div> 
          @enderror
        </div>
        <button type="submit" class="btn btn-primary">crea</button>
       
      </form>
</div>

@endsection