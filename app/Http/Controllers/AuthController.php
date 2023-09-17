<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected function authenticated(Request $request, $user)
{
    return redirect('/home');  // ログイン成功後にリダイレクトするURL
}


}
