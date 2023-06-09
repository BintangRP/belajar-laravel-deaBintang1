<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use App\Models\Users;
use Database\Factories\ArticlesFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class UsersController extends Controller
{
    public function login_form()
    {
        return view('login');
    }
    public function login_action(Request $request)
    {
        $users = Users::where('username', $request->username)->first();
        if ($users == null) {
            return redirect()->back()->with('error', 'Username atau Password salah');;
        }
        $request->session()->put('username', $users->username);

        $db_password = $users->password;
        $hashed_password = Hash::check($request->password, $db_password);
        if ($hashed_password) {
            // ngasih token sementara untuk token users yang login dalam database
            $users->token = Str::random(20); //token sementara
            $users->save(); //save token
            // ketika users logout maka di database tokennya hilang
            $request->session()->put('token', $users->token);
            return to_route('dashboard_index');
        } else {
            return redirect()->back()->with('error', 'Username atau Password salah');
        }
    }

    public function dashboard_index(Request $request)
    {
        if (Session::has('token')) {
            $articles = Articles::all();

            return view('Dashboard.index', [
                'title' => 'Dashboard Admin',
                'articles' => $articles,
            ])->with('success', 'Login Berhasil');
        } else {

            return to_route('login_form')->with('error', 'Login terlebih dahulu');
        }
        return view('Dashboard.index');
    }

    public function dashboard_logout(Request $request)
    {
        $user = Users::where('username', $request->session()->get('username'))->first();
        $user->token = NULL;
        $user->save();
        $request->session()->forget('token');

        return to_route('login_form')->with('success', 'Logout Berhasil');
    }

    public function article_create(Request $request)
    {
        $request->validate([
            'judul' => ['required', 'max:255', 'min:10'],
            'description' => 'required',
            'tag' => 'nullable',
        ]);

        $created = Articles::create([
            'title' => $request->judul,
            'description' => $request->description,
            'tag' => $request->tag,
        ]);

        if ($created) {
            return redirect()->back()->with('success', 'Article berhasil ditambahkan');
        } else {
            return redirect()->back()->with('error', 'Article gagal ditambahkan');
        }
    }

    public function article_edit(Request $request, $id)
    {
        $article = Articles::find($id);

        return view('dashboard.article_edit', [
            'title' => 'Edit Article',
            'article' => $article,
        ]);
    }

    public function article_update(Request $request)
    {

        $request->validate([
            'judul' => ['required', 'max:255', 'min:10'],
            'deskripsi' => 'required',
            'tag' => 'required',
        ]);

        // !TODO: FIX THIS

        $article = Articles::find($request->id);
        $article->title = $request->judul;
        $article->description = $request->deskripsi;
        $article->tag = $request->tag;
        $article->save();

        if ($article) {
            return view('Dashboard.index', [
                'title' => 'Dashboard Admin',
                'articles' => Articles::all(),
            ])->with('success', 'Article berhasil diupdate');
        } else {
            return view('Dashboard.article_edit')->with('error', 'Article gagal diupdate');
        }
    }

    public function article_delete(Request $request)
    {

        Articles::find($request->id)->delete();

        return redirect()->back()->with('success', 'Article ' . $request->id . ' berhasil dihapus');
    }
}
