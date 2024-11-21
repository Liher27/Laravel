@extends('layouts.app')
@section('content')


<div class="container">
    <h1>{{$post->titulo}}</h1>
        <p>Creado el {{$post->created_at}}</p>
        <p>{{$post->texto}}</p>
            @auth
                <div>
                    <h3>Añadir comentario</h3>
                        <form class="mt-2" name="create_platform"
                        action="{{route('comentarios.store')}}" method="POST"
                        enctype="multipart/form-data">
                            @csrf
                            <input type="text" class="form-control" id="post" name="post"
                            required hidden value="{{$post->id}}"/>
                            <div class="form-group mb-3">
                                <textarea type="textarea" rows="5" class="form-control"
                                id="texto" name="texto"></textarea>
                            </div>
                                <button type="submit" class="btn btn-primary" name="">
                                    Comenta!
                                </button>
                        </form>
                </div>
            @endauth
            <br/>
            <br/>
    @foreach ($post->comentarios as $comentario)
        <li>
            {{$comentario->texto}}
        </li>
    @endforeach

</div>
@endsection