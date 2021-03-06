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

    <form action="{{ route('articles.store') }}" method="POST">
      @csrf
      @method('POST')
  
      {{-- TITOLO --}}
      <div class="form-group">
        <label for="title">Titolo</label>
        <input type="text" class="form-control" id="title" value="{{ old('title') }}" name="title"  placeholder="Inserisci titolo">
      </div>
  
      {{-- SOTTOTITOLO --}}
      <div class="form-group">
        <label for="subtitle">Sottotitolo</label>
        <input type="text" class="form-control" id="subtitle" value="{{ old('subtitle') }}" name="subtitle"  placeholder="Inserisci sottotitolo">
      </div>

      {{-- IMMAGINE --}}
      <div class="form-group">
        <label for="image">Immagine</label>
        <input type="text" class="form-control" id="image" value="{{ old('image') }}" name="image"  placeholder="Inserisci url immagine">
      </div>
  
      {{-- AUTORE --}}
      <div class="form-group">
        <label for="author">Autore</label>
        <input type="text" class="form-control" id="author" value="{{ old('author') }}" name="author"  placeholder="Inserisci autore">
      </div>
  
      {{-- CONTENUTO --}}
      <div class="form-group">
        <label for="content">Contenuto</label>
        <textarea class="form-control" rows="10" name="content" id="body" placeholder="Inserisci contenuto">{{ old('content') }}</textarea>
      </div>
  
      {{-- DATA DI PUBBLICAZIONE --}}
      <div class="form-group">
        <label for="publication_date">Data di pubblicazione</label>
        <input type="date" class="form-control" id="publication_date" value="{{ old('publication_date') }}" name="publication_date"  placeholder="Inserisci data di pubblicazione">
      </div>

      <hr>
      {{-- TAGS --}}
      <h3 class="mb-3">Tags</h3>
      <div class="form-group">
        @foreach ($tags as $tag)
          <div class="custom-control custom-checkbox d-inline mr-4">
            {{-- nel name inserisco l'array tags, è una cosa di html --}}
            <input class="custom-control-input" type="checkbox" id="tag-{{ $tag->id }}" name="tags[]" value="{{ $tag->id }}">
            <label class="custom-control-label" for="tag-{{ $tag->id }}">{{ $tag->name }}</label>
          </div>
        @endforeach
      </div>
      
      {{-- SALVA --}}
      <button type="submit" class="btn btn-lg btn-outline-success my-3">Crea</button>
    </form>

    <a href="{{ route('articles.index') }}" class="btn btn-lg btn-outline-primary">Torna alla home</a>
  </div>

</main>
@endsection