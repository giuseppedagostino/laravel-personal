@extends('layouts.layout')

@section('main')
<main>

  @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif

  <div class="container my-4">

    <form action="{{ route('articles.update', $article->id) }}" method="POST">
      @csrf
      @method('PUT')
  
      {{-- TITOLO --}}
      <div class="form-group">
        <label for="title">Titolo</label>
        <input type="text" class="form-control" id="title" value="{{ $article->title }}" name="title">
      </div>
  
      {{-- SOTTOTITOLO --}}
      <div class="form-group">
        <label for="subtitle">Sottotitolo</label>
        <input type="text" class="form-control" id="subtitle" value="{{ $article->subtitle }}" name="subtitle">
      </div>

      {{-- IMMAGINE --}}
      <div class="form-group">
        <label for="image">Immagine</label>
        <input type="text" class="form-control" id="image" value="{{ $article->image }}" name="image">
      </div>
  
      {{-- AUTORE --}}
      <div class="form-group">
        <label for="author">Autore</label>
        <input type="text" class="form-control" id="author" value="{{ $article->author }}" name="author">
      </div>
  
      {{-- CONTENUTO --}}
      <div class="form-group">
        <label for="content">Contenuto</label>
        <input type="text" class="form-control" id="content" value="{{ $article->content }}" name="content">
      </div>
  
      {{-- DATA DI PUBBLICAZIONE --}}
      <div class="form-group">
        <label for="publication_date">Data di pubblicazione</label>
        <input type="text" class="form-control" id="publication_date" value="{{ $article->publication_date }}" name="publication_date">
      </div>
      
      {{-- SALVA --}}
      <button type="submit" class="btn btn-lg btn-outline-success mt-3">Salva</button>
    </form>

    <a href="{{ route('articles.index') }}" class="btn btn-outline-primary">Torna alla home</a>
  </div>

</main>
@endsection