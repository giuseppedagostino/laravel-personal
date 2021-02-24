@extends('layouts.layout')

@section('main')

  <div class="d-flex flex-wrap bg-dark">
    @foreach ($articles as $article)
      <div class="card m-3" style="width: 20rem;">
        <img class="card-img-top" src="{{ $article->image }}" alt="Card image cap">
        <div class="card-body">
          <h3 class="card-title">{{ $article->title }}</h3>
          <h5 class="card-title">{{ $article->subtitle }}</h5>
          <p class="card-text">{{ substr($article->content, 0, 100) . " ..." }}</p>
          <p class="card-text">{{ $article->author }} - {{ $article->publication_date }}</p>
          {{-- DEVO PASSARE LO SLUG PERCHE' LO UTILIZZI --}}
          <a href="{{ route('articles.show', $article->slug) }}" class="btn btn-primary">Leggi di più</a>
        </div>
      </div>
    @endforeach
  </div>
  @endsection