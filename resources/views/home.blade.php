@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <a
            href="{{route('posts.index')}}"
             class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
            >
           <h1>Hola </h1>
            </a>
        </div>
    </div>
</div>
@endsection