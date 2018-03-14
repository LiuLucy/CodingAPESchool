<?php

namespace App\Http\Controllers\User;

use View;
use Validator;
use App\User;
use Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserAuthController extends Controller
{

  protected $loginView = '/users/login';

  protected $regristView = '/users/register';

  protected $studentRegristView = '/users/register/student';

  public function showLoginForm() {
       return view('User/auth/login');
  }

  public function login() {
      $input = request()->all();
      //驗證規則
      $rules = [
        'card_id' => [
          'required',
          'size:10',
        ],
        'password' => [
          'required',
        ],
      ];

      $validator = Validator::make($input,$rules);

      if($validator->fails()) {
          return redirect($this->loginView)
                ->withErrors($validator)
                ->withInput();
      }

      $User = $this->getUserCardId($input);

      if ($User === null) {
        return redirect($this->loginView)
              ->withErrors($this->getErrorMsg())
              ->withInput();
      }

      //驗證密碼
      $is_password_correct = Hash::check($input['password'], $User->password);

      if(!$is_password_correct) {
          return redirect($this->loginView)
              ->withErrors($this->getErrorMsg())
              ->withInput();
      }

      session()->put('user_id',$User->id);

      return view('User.index',['name' => $User->name]);
  }


  public function showRegistrationForm() {
      session()->forget('is_done');
      return view('User/auth/register');
  }

  public function register() {
      $input = request()->all();

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
        ],
        'gender' => [
            'required',
            'in:M,F',
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
      $User = $this->getUserData($input['email'],'email');

      if (!$User == null) {
        $errorCardIdMsg = [
          'error_regist_email' => ['Email已有人使用',],
        ];
        return redirect($this->regristView)
              ->withErrors($errorCardIdMsg)
              ->withInput();
      }

      $User = $this->getUserData($input['card_id'],'card_id');

      if (!$User == null) {
        $errorCardIdMsg = [
          'error_regist_card_id' => ['身份證錯誤請在次確認',],
        ];
        return redirect($this->regristView)
              ->withErrors($errorCardIdMsg)
              ->withInput();
      }


      $validator = Validator::make($input,$rules);

      if($validator->fails()) {
          return redirect('/users/register')->withErrors($validator);
      }

      //對密碼加密
      $input['password'] = Hash::make($input['password']);

      $Users = User::create($input);
      session()->put('studentNumber',request('studentNumber'));//把學生的數量存起來
      return redirect('/users/register/student');
  }

  public function showStudentForm() {
      session()->put('is_done','1');
      return view('User.auth.register');
  }

  public function registerStudent() {
      $input = request()->except(['_token']);
      $rules = [
        'name.*' => [
          'required',
        ],
        'card_id.*' => [
          'required',
        ],
        'gender.*' => [
          'required',
        ],
      ];
      $validator = Validator::make($input,$rules);
      if($validator->fails()) {
          return redirect('/users/register/student')->withErrors($validator);
      }

      $User = $this->getUserCardId($input);
      if (!$User == null) {
        $errorCardIdMsg = [
          'error_regist_card_id' => ['身份證錯誤請在次確認',],
        ];
        return redirect($this->studentRegristView)
              ->withErrors($errorCardIdMsg)
              ->withInput();
      }
      //將學員資料存取到資料庫
      for ($i=0; $i < session()->get('studentNumber') ; $i++) {
        $input['password'][$i] = Hash::make($input['password'][$i]);
        $userStudent = new User;
        foreach ($input as $key => $value) {
            $userStudent->$key = $value[$i];
        }
        $userStudent->save();
      }
      return redirect('/users/login');
  }

  public function logout() {
      session()->forget('user_id');
      return redirect('/');
  }


  public function getErrorMsg() {
        $error_message = [
          'error_msg' => ['帳號或密碼驗證錯誤請重新輸入',],
        ];
        return $error_message;
  }

  public function getUserData($input,$getName) {
      return User::where($getName, $input)->first();
  }




}
