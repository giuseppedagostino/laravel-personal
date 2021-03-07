@extends('layouts.layout')

@section('main')
<header class="bg-dark p-3 d-flex justify-content-between">
  <div class="mx-5">
    <h4 class="text-white mx-4 mt-2">Laravel - Personal</h4>
  </div>
  <div class="mx-5">
    {{-- CREATE --}}
    <a href="{{ route('articles.create') }}" class="btn btn-outline-light btn-lg mx-4">Crea un nuovo articolo</a>
  </div>
</header>

<main>

    @if (session('message'))
      <div class="container message_success my-4">
        <div class="alert-success mx-4">
            {{ session('message') }}
        </div>
      </div>  
    @endif

  <div class="d-flex flex-wrap justify-content-center">
    
    @foreach ($articles as $article)
      <div class="card m-3" style="width: 20rem;">
        <img class="card-img-top" src="{{ $article->image }}" alt="{{ $article->title }}">
        <div class="card-body">
          <h3 class="card-title">{{ $article->title }}</h3>
          <p class="card-text">{{ substr($article->content, 0, 100) . " ..." }}</p>
          <p class="card-text"><strong>{{ $article->author }}</strong></p>
        </div>

        <div class="card-footer">

          {{-- TAGS --}}
          <div>
            @foreach ($article->tags as $tag)
              <span class="badge badge-info">{{ $tag->name }}</span>
            @endforeach
          </div>
          {{-- /TAGS --}}

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

        </div>

      </div>
    @endforeach
  </div>

</main>

@endsection