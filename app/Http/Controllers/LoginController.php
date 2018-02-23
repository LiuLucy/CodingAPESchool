<?php

namespace App\Http\Controllers;
use View;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function show() {
      return View::make('user.auth.login');
    }

    public function login() {
        $input = request()->all();
        $rules = [
            'email'=>''
        ];
        return $input;
    }

    public function logout() {

    }
}
