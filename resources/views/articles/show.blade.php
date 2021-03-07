@extends('layouts.layout')

@section('main')
<main>

  <div class="container my-4">
    <h2 class="display-4 text-center">{{ $articles->title}}</h2>
    <h3 class="text-center mb-4">{{ $articles->subtitle}}</h3>
    <div class="image_shadow">
      <img src="{{ $articles->image }}" alt="{{ $articles->title}}" style="width: 500px">
    </div>
    <p class="mt-4">{{ $articles->content }}</p>
    <p><strong>Autore: </strong>{{ $articles->author }}</p>
    <p class="mb-4"><strong>Data di pubblicazione: </strong>{{ $articles->publication_date }}</p>

    {{-- TAGS --}}
    <div class="text-center">
      @foreach ($articles->tags as $tag)
        <span class="badge badge-info">{{ $tag->name }}</span>
      @endforeach
    </div>
    {{-- /TAGS --}}

    <a href="{{ route('articles.index') }}" class="btn btn-lg btn-outline-primary">Torna alla home</a>
  </div>

</main>
@endsection
    