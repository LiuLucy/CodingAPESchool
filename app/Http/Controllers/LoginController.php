<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function show() {
        return View::make('admin.login');
    }

    public function login() {
        
    }

    public function logout() {

    }
}
