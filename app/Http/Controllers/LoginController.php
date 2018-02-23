<?php

namespace App\Http\Controllers;
use View;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
  /**
   * Specify to use manage auth guard
   *
   * @var string
   */
  protected $guard = 'users';


  /**
   * Custom login redirect path
   *
   * @var string
   */
  protected $loginPath = '/users/login';

  /**
   * Locate login view.
   *
   * @var string
   */
  protected $loginView = 'user.auth.login';

  /**
   * Locate registration view.
   *
   * @var string
   */
  protected $registerView = 'user.auth.register';

  /**
   * Where to redirect users after login / registration.
   *
   * @var string
   */
  protected $redirectAfterLogout = '/users';


  public function __construct()
  {
      parent::__construct();
      $this->redirectTo = '/users';
  }


  public function login(Request $request)
  {
      if (Auth::guard('users')->attempt(['name' => $request->account, 'password' => $request->password]))
      {
          return redirect()->intended('home');
      }

      return $this->sendFailedLoginResponse($request);
  }

  protected function validator(array $data)
  {
      return Validator::make($data, [
          'password' => 'required|min:6|confirmed',
          'email'    => 'required|email|max:255|unique:Manage,email',
      ]);
  }


  protected function create(array $data)
  {
      return User::create([
          'name'     => $data['name'],
          'email'    => $data['email'],
          'password' => bcrypt($data['password']),
      ]);
  }
}
