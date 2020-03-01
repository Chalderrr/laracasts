<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // return view('welcome');

    $container = new \App\Container();

    $container->bind('example', function() {
        return new \App\Example();
    });

    // ddd($container);

    $example = $container->resolve('example');

    ddd($example);
});

Route::get('/about', function () {

    return view('about', [
        'articles' => App\Article::take(3)->latest()->get()
    ]);
});

Route::get('/articles', 'ArticlesController@index')->name('articles.index');    
Route::post('/articles', 'ArticlesController@store');    
Route::get('/articles/create', 'ArticlesController@create');    
Route::get('/articles/{article}', 'ArticlesController@show')->name('articles.show');
Route::get('/articles/{article}/edit', 'ArticlesController@edit');
Route::put('/articles/{article}', 'ArticlesController@update');

