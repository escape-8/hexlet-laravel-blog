<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::paginate();

        return view('article.index', compact('articles'));
    }

    public function create()
    {
        $article = new Article();
        return view('article.create', compact('article'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        $article = new Article();
        $article->fill($data);
        $article->save();
        $request->session()->flash('status', 'Статья добавлена!');

        return redirect()
            ->route('articles.index');
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('article.edit', compact('article'));
    }

    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('article.show', compact('article'));
    }

    public function update(StoreRequest $request, $id)
    {
        $article = Article::findOrFail($id);
        $data = $request->validated();

        $article->fill($data);
        $article->save();
        $request->session()->flash('update', 'Статья обновлена!');
        return redirect()
            ->route('articles.index');
    }


}
