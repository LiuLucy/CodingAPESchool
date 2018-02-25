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
        'email' => [
          'required',
          'email',
          'max:150',
        ],
        'password' => [
          'required',
          'min:6',
        ],
      ];

      $validator = Validator::make($input,$rules);


      if($validator->fails()) {
          return redirect('/users/login')
                ->withErrors($validator)
                ->withInput();
      }

      //撈資料使用者資料
      $User = User::where('email', $input['email'])->first();
        if ($User === null) {
            return '沒有資料';// user doesn't exist
        };

      //驗證密碼
      $is_password_correct = Hash::check($input['password'], $User->password);




      if(!$is_password_correct) {
          $error_message = [
            'msg' => ['密碼驗證錯誤',],
          ];

          return redirect('/users/login')
                ->withErrors($error_message)
                ->withInput();
      }

      session()->put('user_id',$User->id);


      return redirect()->intended('/');

  }


  public function showRegistrationForm() {
      return view('User/auth/register');
  }


  public function register() {
      $input = request()->all();

      //驗證有沒有寫對格式
      $rules = [
        'name' => [
            'required',
            'max:50',
        ],
        'email' => [
            'required',
            'max:150',
            'email',
        ],
        'password' => [
            'required',
            'same:password_confirmation',
            'min:6',
        ],
        'password_confirmation' => [
            'required',
            'min:6',
        ],
        'gender' => [
            'required',
            'in:M,F'
        ],
        'card_id' => [
            'required',
            'size:10',
        ],
        'phone' => [
            'required',
            'max:10',
            'regex:/(09)[0-9]{8}/',//09開頭後面有八個數字
            'size:10',
        ],
      ];

      $validator = Validator::make($input,$rules);

      if($validator->fails()) {
          return redirect('/users/register')->withErrors($validator);
      }

      //對密碼加密
      $input['password'] = Hash::make($input['password']);

      $Users = User::create($input);

      //寄信給註冊的使用者
      // $mail_binding = [
      //   'name' => $input['name']
      // ];
      //
      // Mail::send('email.registerEmailNotification',$mail_binding,
      //   function($mail) use ($input){
      //       $mail->to($input['email']);
      //       $mail->from('lucy933626@gmail.com');
      //       $mail->subject('猿創立程式設計學校，歡迎您使用我們的系統');
      //   });

        return redirect('/users/login');
  }

  public function logout() {
      session()->forget('user_id');
      return redirect('/');
  }

}
