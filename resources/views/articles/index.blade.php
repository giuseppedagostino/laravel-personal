@extends('layouts.layout')

@section('main')
<main class="bg-secondary">

  @if (session('message'))
  <div class="alert-success mx-4">
      {{ session('message') }}
  </div>
  @endif  

  <div class="d-flex flex-wrap justify-content-center">
    
    @foreach ($articles as $article)
      <div class="card m-3" style="width: 20rem;">
        <img class="card-img-top" src="{{ $article->image }}" alt="{{ $article->title }}">
        <div class="card-body">
          <h3 class="card-title">{{ $article->title }}</h3>
          <h5 class="card-title">{{ $article->subtitle }}</h5>
          <p class="card-text">{{ substr($article->content, 0, 60) . " ..." }}</p>
          <p class="card-text">{{ $article->author }} - {{ $article->publication_date }}</p>

          {{-- SHOW --}}
          <a href="{{ route('articles.show', $article->slug) }}" class="btn btn-outline-primary">Leggi di più</a>

          {{-- EDIT --}}
          <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-outline-primary">
            <i class="fas fa-pencil-alt"></i>
          </a>
          
          {{-- DESTROY --}}
          <form action="{{ route('articles.destroy', $article->id) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button class="btn btn-outline-danger">
              <i class="fas fa-trash-alt"></i>
            </button>
          </form>

          {{-- TAGS --}}
          <div class="mt-3">
            @foreach ($article->tags as $tag)
              <span class="badge badge-info">{{ $tag->name }}</span>
            @endforeach
          </div>
          {{-- /TAGS --}}

        </div>
      </div>
    @endforeach
  </div>

  <div class="container p-4">
    {{-- CREATE --}}
    <a href="{{ route('articles.create') }}" class="btn btn-outline-light btn-lg btn-block">Crea un nuovo articolo</a>
  </div>

</main>

@endsection