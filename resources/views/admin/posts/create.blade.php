@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{route("posts.store")}}" method="POST">
        @csrf
        <div class="form-group">
          <label for="title">Titolo</label>
          <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="inserisci il titolo del post" value="{{old('title')}}">
          @error('title')
             <div class="alert alert-danger">{{$message}}</div> 
          @enderror
        </div>

        <div class="form-group">
            <label for="content">Contenuto</label>
            <textarea  class="form-control @error('content') is-invalid @enderror" id="content" name="content" placeholder="inserisci il contenuto del post" rows="9">{{old('content')}}</textarea>
            @error('content')
                <div class="alert alert-danger">{{$message}}</div> 
            @enderror

          </div>
        
        <div class="form-group">
          <label for="category_id">Categoria</label>
          <select class="custom-select" @error('category_id') is-invalid @enderror aria-label="Default select example" id="category_id" name="category_id">
            <option >Categorie</option>
            @foreach ($categories as $category)
                <option value="{{$category->id}}" {{old('category_id') ? 'selected' : ''}}>{{$category->name}}</option>
            @endforeach
          </select>
          @error('category_id')
                <div class="alert alert-danger">{{$message}}</div> 
          @enderror
        </div>

        
        <div class="form-group">
          <h3>Tags</h3>
  
            @foreach ($tags as $tag)
            <div class="form-check form-check-inline">
              <input type="checkbox" class="form-check-input" id="{{$tag->slug}}" name="tags[]" value="{{$tag->id}}" {{in_array($tag->id, old("tags" ,[]) ) ? 'checked' : ''}}>
              <label class="form-check-label" for="{{$tag->slug}}">{{$tag->name}}</label>
            </div>
              @endforeach
              @error('tags')
                  <div class="alert alert-danger">{{$message}}</div> 
              @enderror
        </div>


        <div class="form-group form-check">

          <input type="checkbox" class="form-check-input @error('published') is-invalid @enderror" id="published" name="published"{{old('published') ? 'checked' : ''}}>
          <label class="form-check-label" for="published">Pubblica</label>
            @error('published')
                <div class="alert alert-danger">{{$message}}</div> 
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">crea</button>
       
      </form>
</div>

@endsection