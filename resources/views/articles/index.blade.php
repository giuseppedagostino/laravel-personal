@extends('layouts.layout')

@section('main')

  @if (session('message'))
  <div class="alert-success">
      {{ session('message') }}
  </div>
  @endif  

  <div class="d-flex flex-wrap bg-secondary justify-content-center">
    
    @foreach ($articles as $article)
      <div class="card m-3" style="width: 20rem;">
        <img class="card-img-top" src="{{ $article->image }}" alt="{{ $article->title }}">
        <div class="card-body">
          <h3 class="card-title">{{ $article->title }}</h3>
          <h5 class="card-title">{{ $article->subtitle }}</h5>
          <p class="card-text">{{ substr($article->content, 0, 50) . " ..." }}</p>
          <p class="card-text">{{ $article->author }} - {{ $article->publication_date }}</p>

          {{-- SHOW --}}
          <a href="{{ route('articles.show', $article->slug) }}" class="btn btn-primary">Leggi di più</a>
          {{-- DESTROY --}}

          <form action="{{ route('articles.destroy', $article->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">Elimina</button>
          </form>

        </div>
      </div>
    @endforeach
  </div>

  <div class="bg-secondary">
    {{-- CREATE --}}
    <a href="{{ route('articles.create') }}" class="btn btn-primary m-3">Crea un nuovo articolo</a>
  </div>

  @endsection