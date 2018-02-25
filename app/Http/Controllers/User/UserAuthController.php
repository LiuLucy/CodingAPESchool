<?php

namespace App\Http\Controllers\User;

use View;
use Validator;
use App\User;
use Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserAuthController extends Controller
{
  
  public function showLoginForm() {
      return view('User/auth/login');
  }

  public function login() {
      $input = request()->all();

      $rules = [
        'name' => 'required|max:50',
        'password' => 'required|min:6|confirmed',
        'email'    => 'required|email|max:255|unique:User,email',
      ];

      $validator = Validator::make($input,$rules);

      if($validator->fails()) {
          return redirect('/user/auth/login')
                ->withErrors($validator)
                ->withInput();
      }

      //撈資料使用者資料
      $User = User::where('email',$input['email'])->firstOrFail();
      //驗證密碼
      $is_password_correct = Hash::check($input['password'], $User->password);

      if(!$is_password_correct) {
          $error_message = [
            'msg' => ['密碼驗證錯誤',],

          ];

          return redirect('/User/auth/login')
                ->withErrors($error_message)
                ->withInput();
      }

      session()->put('user_id',$User->id);

      return redirect()->intended('/');

  }





  protected function create(array $data) {
      return User::create([
          'name'     => $data['name'],
          'email'    => $data['email'],
          'password' => bcrypt($data['password']),
      ]);
  }


  public function logout() {
      session()->forget('user_id');
      return redirect('/');
  }

}
