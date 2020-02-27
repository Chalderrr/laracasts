<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function index() 
    {
        if( request('tag') ) {
            $articles = Tag::where('name', request('tag'))->firstOrFail()->articles;
        } else {
            $articles = Article::latest()->get();
        }
        

        return view('articles.index', ['articles' => $articles]);
    }
    
    public function show(Article $article) 
    {
        return view('articles.show', ['article' => $article]);
    }

    public function create() 
    {
        return view('articles.create', [
            'tags' => Tag::all()
        ]);
    }

    public function store() 
    {
        $this->validateArticle();

        $article = new Article(request(['title', 'body', 'excerpt']));
        $article->user_id = 1;
        $article->save();


        if( request()->has('tags') ) {
            $article->tags()->attach(request('tags'));
        }

        //persisting the new resource

        // Article::create($validated);

        // $article = new Article();

        // $article->title = request('title');
        // $article->body = request('body');
        // $article->excerpt = request('excerpt');

        // $article->save();

        return redirect(route('articles.index'));
    }

    public function edit(Article $article) 
    {
        // find article associated with id
        return view('articles.edit', compact('article'));
    }
    
    public function update(Article $article) 
    {
        $article->update($this->validateArticle());

        return redirect($article->path());

    }

    protected function validateArticle() 
    {
        return request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required',
            'tags' => 'exists:tags,id'
        ]);
    }
    
}
