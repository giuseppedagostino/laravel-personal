@extends('layouts.layout')

@section('main')

  @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif

  <div class="container">

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
        <input type="text" class="form-control" id="content" value="{{ old('content') }}" name="content"  placeholder="Inserisci contenuto">
      </div>
  
      {{-- DATA DI PUBBLICAZIONE --}}
      <div class="form-group">
        <label for="publication_date">Data di pubblicazione</label>
        <input type="text" class="form-control" id="publication_date" value="{{ old('publication_date') }}" name="publication_date"  placeholder="Inserisci data di pubblicazione">
      </div>
      
      {{-- SALVA --}}
      <button type="submit" class="btn btn-lg btn-success mt-3">Salva</button>
    </form>

    <a href="{{ route('articles.index') }}" class="btn btn-primary">Torna alla home</a>
  </div>

@endsection