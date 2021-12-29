<?php

namespace App\Http\Controllers\Sale;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function index()
    {
        //
        if (auth()->check()) return redirect()->route('dash-board.index');
        return view('sale.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only(['email', 'password']);
        if(\Auth::attempt($credentials)) return redirect()->route('dash-board.index');
        return redirect()->route('login.index')->withErrors(['authenticate' => 'Usuário ou senha estão incorretos']);
    }
}
