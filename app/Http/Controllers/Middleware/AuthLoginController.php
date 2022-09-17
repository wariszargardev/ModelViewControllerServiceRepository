<?php

namespace App\Http\Controllers\Middleware;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthLoginController extends Controller
{
    public function showLoginForm(){
        return view('auth.login');
    }
}
