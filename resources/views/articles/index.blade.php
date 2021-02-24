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
    <h1>Article.Index</h1>

    <div class="d-flex flex-wrap">
      @foreach ($articles as $article)
        <div class="card m-3" style="width: 20rem;">
          <img class="card-img-top" src="{{ $article->image }}" alt="Card image cap">
          <div class="card-body">
            <h4 class="card-title">{{ $article->title }}</h4>
            <h3 class="card-title">{{ $article->subtitle }}</h3>
            <p class="card-text">{{ substr($article->content, 0, 100) . " ..." }}</p>
            <p class="card-text">{{ $article->author }} - {{ $article->publication_date }}</p>
            {{-- DEVO PASSARE LO SLUG PERCHE' LO UTILIZZI --}}
            <a href="{{ route('articles.show', $article->slug) }}" class="btn btn-primary">Leggi di più</a>
          </div>
        </div>
      @endforeach
    </div>

  </body>
</html>
