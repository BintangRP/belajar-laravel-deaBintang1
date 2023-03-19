<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
            return redirect()->back();
        }

        $db_password = $users->password;
        $hashed_password = Hash::check($request->password, $db_password);
        if ($hashed_password) {
            return view('dashboard');
        } else {
            return redirect()->back();
        }
    }
}
