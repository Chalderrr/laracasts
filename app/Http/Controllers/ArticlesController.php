<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function index() 
    {
        $articles = Article::latest()->get();
        return view('articles.index', ['articles' => $articles]);
    }
    
    public function show(Article $article) 
    {
        return view('articles.show', ['article' => $article]);
    }

    public function create() 
    {
        return view('articles.create');
    }

    public function store() 
    {
        $validated = request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required'
        ]);
        //persisting the new resource

        Article::create($validated);

        // $article = new Article();

        // $article->title = request('title');
        // $article->body = request('body');
        // $article->excerpt = request('excerpt');

        // $article->save();

        return redirect('/articles');
    }

    public function edit(Article $article) 
    {
        // find article associated with id
        return view('articles.edit', compact('article'));
    }
    
    public function update(Article $article) 
    {
        request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required'
        ]);

        $article->title = request('title');
        $article->body = request('body');
        $article->excerpt = request('excerpt');

        $article->save();

        return redirect('/articles/' . $article->id);

    }
    
}
