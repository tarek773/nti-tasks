<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use Illuminate\Http\Request;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ArticleController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::with('user')->latest()->Paginate(10);
        return view('articles.index', ['articles' => $articles]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleRequest $request)
    {
        //
        // $this->authorize('create', Article::class);
        $article = Article::create($request->validated());

        return redirect()->route('articles.index')->with('success', 'Article created successfully.');
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        //
        $this->authorize('update', $article);
        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ArticleRequest $request, Article $article)
    {
        // dd($request->validated());
        $this->authorize('update', $article);

        $article->update($request->validated());

        return redirect()->route('articles.index')->with('success', 'Article updated successfully.');
    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        //
        $this->authorize('delete', $article);
        $article->delete();

        return redirect()->route('articles.index')->with('success', 'Article deleted successfully.');
    }
}
