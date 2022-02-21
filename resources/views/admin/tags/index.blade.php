@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Lista Tag</h3>

    <div class="row justify-content-center">
        <div>
            <a href="{{route("categories.create")}}"><button type="button" class="btn btn-outline-success">Crea categoria</button></a>
        </div>

        <div class="col-md-12">

            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Slug</th>
                    <th scope="col">azioni</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($tags as $tag)
                <tr>
                    <th scope="row">{{$tag->id}}</th>
                    <td>{{$tag->name}}</td>
                    <td>{{$tag->slug}}</td>
                    <td>
                        <a href="{{route("tags.show", $tag->id)}}"><button type="button" class="btn btn-outline-primary w-100">Vai al post</button></a>
                        <a href="{{route("tags.edit", $tag->id)}}"><button type="button" class="btn btn-outline-warning w-100">Modifica il post</button></a>
                        <form action="{{route("tags.destroy", $tag->id)}}" method="POST">
                        @csrf
                        @method("DELETE")
                            <button type="submit" class="btn btn-outline-danger w-100">Cancella</button>
                        </form>
                    </td>
                    {{-- <td scope="row">azioni varie</td> --}}
                  </tr> 
                @endforeach
                </tbody>
              </table>


        </div>
    </div>
</div>
@endsection


