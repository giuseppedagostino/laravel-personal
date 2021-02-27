<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Article;
use App\Tag;

class ArticleController extends Controller
{

    // array di validazione
    private $articleValidation = [
        'title' => 'required|max:100',
        'subtitle' => 'required|max:200',
        'image' => 'required', // forse devo metterla nullable?
        'author' => 'required|max:80',
        'content' => 'required',
        'publication_date' => 'required|date'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();
        // dd($articles);
        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Tag $tag)
    {
        // con una query recupero tutti i tag
        $tags = Tag::all();
        return view('articles.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        // dd($data);

        // effettuo un controllo sui dati inseriti
        $request->validate($this->articleValidation);

        $newArticle = new Article();
        $data['slug'] = Str::slug($request->title);
        // associo i dati presi dal form alle chiavi del database
        $newArticle->title = $data["title"];
        $newArticle->slug = $data["slug"];
        $newArticle->subtitle = $data["subtitle"];
        $newArticle->image = $data["image"];
        $newArticle->author = $data["author"];
        $newArticle->content = $data["content"];
        $newArticle->publication_date = $data["publication_date"];
        // salvo il nuovo articolo
        $postSaveResult = $newArticle->save();

        return redirect()->route('articles.index')->with('message', 'Articolo aggiunto correttamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    // alla show devo passare lo slug perchè lo utilizzi
    {
        // se non trova alcun articolo con quello slug restituisce 404
        // con where effettuo la query proprio per richiamare l'articolo con quello slug
        $articles = Article::where('slug', $slug)->firstOrFail();
        return view('articles.show', compact('articles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        // $articles = Article::all();
        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $data = $request->all();

        $request->validate($this->articleValidation);
        $article->update($data);

        return redirect()->route('articles.index')->with('message', 'Articolo aggiornato correttamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('articles.index')->with('message', 'Articolo eliminato correttamente');
    }
}
