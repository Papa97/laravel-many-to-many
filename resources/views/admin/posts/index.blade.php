@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Lista post</h3>

    <div class="row justify-content-center">
        <div>
            <a href="{{route("posts.create")}}"><button type="button" class="btn btn-outline-success">Crea post</button></a>
        </div>

        <div class="col-md-12">

            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Titolo</th>
                    <th scope="col">Slug</th>
                    <th scope="col">categoria</th>
                    <th scope="col">azioni</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($posts as $post)
                <tr>
                    <th scope="row">{{$post->id}}</th>
                    <td>{{$post->title}}</td>
                    <td>{{$post->slug}}</td>
                    <td>
                      @if ($post->category)
                          {{$post->category->name}}
                          @else
                          nessuna
                      @endif
                    </td>
                    <td>
                        <a href="{{route("posts.show", $post->id)}}"><button type="button" class="btn btn-outline-primary w-100">Vai al post</button></a>
                        <a href="{{route("posts.edit", $post->id)}}"><button type="button" class="btn btn-outline-warning w-100">Modifica il post</button></a>
                        <form action="{{route("posts.destroy", $post->id)}}" method="POST">
                        @csrf
                        @method("DELETE")
                            <button type="submit" class="btn btn-outline-danger w-100">Cancella</button>
                        </form>
                    </td>
                  </tr> 
                @endforeach
                </tbody>
              </table>


        </div>
    </div>
</div>
@endsection


