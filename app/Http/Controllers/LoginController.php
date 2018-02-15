<?php

namespace App\Http\Controllers;
use View;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function show() {
        return View::make('user.auth.login');
    }

    public function login() {
        return '123';
    }

    public function logout() {

    }
}
