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

  public function showLoginForm() {
       return view('User/auth/login');
  }

  public function login() {
      $input = request()->all();
      //驗證規則
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
          return redirect($this->loginView)
                ->withErrors($validator)
                ->withInput();
      }

      //撈資料使用者資料
      $User = $this->getUserDatas($input);

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
      session()->put('studentNumber',request('studentNumber'));
      return redirect('/users/register/student');
  }


  public function showStudentForm() {
      session()->put('is_done','1');
      return view('User.auth.register');
  }

  public function registerStudent() {
      $input = request()->all();

      $rules = [
        'name.*' => 'required',
        'card_id.*' => 'required',
        'gender.*' => 'required',
      ];
      $validator = Validator::make($input,$rules);

      if($validator->fails()) {
          return redirect('/users/register/student')->withErrors($validator);
      }

      $inputName = ['name', 'card_id','gender','birthday'];
      for ($i=0; $i < session()->get('studentNumber') ; $i++) {
        for ($j=0; $j < count($inputName); $j++) {
           $studentData = [$inputName[$j] => $input[$inputName[$j]][$i],];
           echo $studentData[$inputName[$j]]."<br>";
        }

      }

      // $input['password'] = Hash::make($input['password']);

      // $Users = User::create($input);
      // $Users->type_id = request('type_id');
      // return redirect('/users/login');
  }

  public function logout() {
      session()->forget('user_id');
      return redirect('/');
  }


  public function getErrorMsg() {
        $error_message = [
          'error_msg' => ['電子郵件或密碼驗證錯誤輕重新輸入',],
        ];
        return $error_message;
  }

  public function getUserDatas($input) {
      return User::where('email', $input['email'])->first();
  }



}
