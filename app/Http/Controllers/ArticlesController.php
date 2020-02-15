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
    
    public function show($id) 
    {
        $article = Article::find($id);

        return view('articles.show', ['article' => $article]);
    }

    public function create() 
    {
        return view('articles.create');
    }

    public function store() 
    {
        request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required'
        ]);
        //persisting the new resource
        $article = new Article();

        $article->title = request('title');
        $article->body = request('body');
        $article->excerpt = request('excerpt');

        $article->save();

        return redirect('/articles');
    }

    public function edit($id) 
    {
        $article = Article::find($id);


        // find article associated with id
        return view('articles.edit', compact('article'));
    }
    
    public function update($id) 
    {
        request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required'
        ]);

        $article = Article::find($id);

        $article->title = request('title');
        $article->body = request('body');
        $article->excerpt = request('excerpt');

        $article->save();

        return redirect('/articles/' . $article->id);

    }
    
}
