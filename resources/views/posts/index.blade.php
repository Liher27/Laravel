@extends('layouts.app')

@section('content')

@foreach ($posts as $post)

    <ul class="pt-1">

        <div class="d-flex flex-row">
            <a href="{{route('posts.show',$post)}}"> {{$post->titulo}}</a>.
            Escrito el {{$post->created_at}}
            
            @auth
                <a class="btn btn-warning btn-sm" href="{{route('posts.edit',$post)}}"
                    role="button">Editar</a>
                    <form action="{{route('posts.destroy',$post)}}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('DELETE')
                            <button class="btn btn-sm btn-danger" type="submit"
                                onclick="return confirm('Are you sure?')">Delete
                            </button>
                    </form>
            @endauth

        </div>
    </ul>
@endforeach

@endsection