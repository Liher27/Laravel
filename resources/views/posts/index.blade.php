@extends('layouts.app')

@section('content')

@foreach ($posts as $post)

        <div class="d-flex flex-row">
            <a href="{{route('posts.show',$post)}}"> {{$post->titulo}}</a>.
            Escrito el {{$post->created_at}}
            
            <a class="btn btn-warning btn-sm" href="{{route('posts.edit',$post)}}"
            role="button">Editar</a>
            
            <form action="{{route('posts.destroy',$post)}}" method="POST">
                @csrf
                    @method('DELETE')
                        <button class="btn btn-sm btn-danger" type="submit"
                        onclick="return confirm('Are you sure?')">Delete
                        </button>
            </form>
        </div>
    </ul>
@endforeach

@endsection