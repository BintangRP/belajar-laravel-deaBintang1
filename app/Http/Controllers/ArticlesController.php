<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function article_create()
    {
        return view('Dashboard.article_create', [
            'title' => 'Create Article',
        ]);
    }

    public function article_edit(Request $request, $id)
    {
        $article = Articles::find($id);

        return view('Dashboard.article_edit', [
            'title' => 'Edit Article',
            'article' => $article,
        ]);
    }

    public function article_delete($id)
    {
        $article = Articles::find($id);
        $article->delete();
        $article->save();

        return redirect()->back()->with('success', 'Article' . $id . ' berhasil dihapus');
    }
}
