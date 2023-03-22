<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use Illuminate\Http\Request;

class OuterController extends Controller
{
    public function index()
    {
        $articles = Articles::all();
        return view('home', [
            'title' => 'Seluruh Artikel',
            'articles' => $articles,
        ]);
    }

    public function article_detail($id)
    {
        $article = Articles::find($id);
        return view('article', [
            'title' => $article->title,
            'article' => $article,
        ]);
    }
}
