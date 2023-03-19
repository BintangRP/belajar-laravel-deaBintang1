<?php

namespace App\Http\Controllers;

use App\Models\Users;
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
            dd('ada token');
        } else {
            dd('tidak ada token');
        }
        return view('Dashboard.index');
    }
}
