@extends('layouts.layout')

@section('main')
<main>

  <div class="container my-4">

    @if ($errors->any())
      <div class="container my-4">
        <div class="alert message_alert">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      </div>
    @endif

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
        <textarea class="form-control" rows="10" id="content" name="content">{{ $article->content }}</textarea>
      </div>
  
      {{-- DATA DI PUBBLICAZIONE --}}
      <div class="form-group">
        <label for="publication_date">Data di pubblicazione</label>
        <input type="text" class="form-control" id="publication_date" value="{{ $article->publication_date }}" name="publication_date">
      </div>

      <hr>
      {{-- TAGS --}}
      <h3 class="mb-3">Tags</h3>
      <div class="form-group">
        @foreach ($tags as $tag)
          <div class="custom-control custom-checkbox d-inline mr-4">
            {{-- nel name inserisco l'array tags, è una cosa di html --}}
            <input class="custom-control-input" type="checkbox" id="tag-{{ $tag->id }}" name="tags[]" value="{{ $tag->id }}"
            {{-- verifica inline per sapere se le checkbox sono già checkate --}}
            {{-- la checkbox deve essere già spuntata se il suo $tag->id esiste nella collection di tag presenti in questo articolo --}} 
            @if($article->tags->contains($tag->id)) checked @endif
            >
            <label class="custom-control-label" for="tag-{{ $tag->id }}">{{ $tag->name }}</label>
          </div>
        @endforeach
      </div>
      
      {{-- SALVA --}}
      <button type="submit" class="btn btn-lg btn-outline-success my-3">Salva</button>
    </form>

    <a href="{{ route('articles.index') }}" class="btn btn-lg btn-outline-primary">Torna alla home</a>
  </div>

</main>
@endsection