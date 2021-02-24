<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- titolo --}}
    <title>Laravel personal</title>
    {{-- css --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  </head>

  <body>
    <h1>Article.Show</h1>

    <div class="container">
      <h2 class="display-4 text-center">{{ $articles->title}}</h2>
      <h3 class="text-center mb-4">{{ $articles->subtitle}}</h3>
      <img class="card-img-top" src="{{ $articles->image }}" alt="Card image cap">
      <p class="mt-4">Author: {{ $articles->content }}</p>
      <p><strong>Autore: </strong>{{ $articles->author }}</p>
      <p class="mb-4"><strong>Data di pubblicazione: </strong>{{ $articles->publication_date }}</p>
      <hr>

      <a href="{{ route('articles.index') }}" class="btn btn-primary">Torna alla home</a>
    </div>

  </body>
</html>