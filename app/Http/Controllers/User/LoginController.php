<?php

namespace App\Http\Controllers\User;
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
  protected $redirectTo = '/users';

  /**
   * Specify to use manage auth guard
   *
   * @var string
   */
  protected $guard = 'users';

  /**
   * Locate login view.
   *
   * @var string
   */
  protected $loginView = 'User.auth.login';

  /**
   * Locate registration view.
   *
   * @var string
   */
  protected $registerView = 'User.auth.register';

  /**
   * Where to redirect users after login / registration.
   *
   * @var string
   */
  protected $redirectAfterLogout = '/users';



  public function showLoginForm() {
      return view('User.auth.login');
  }

  public function showRegistrationForm() {
      return view('User.auth.register');
  }

  public function login(Request $request) {
      if (Auth::guard('users')->attempt(['name' => $request->account, 'password' => $request->password]))
      {
          return redirect()->intended('User.index');
      }

      return $this->sendFailedLoginResponse($request);
  }

  protected function validator(array $data) {
      return Validator::make($data, [
          'password' => 'required|min:6|confirmed',
          'email'    => 'required|email|max:255|unique:Manage,email',
      ]);
  }


  protected function create(array $data) {
      return User::create([
          'name'     => $data['name'],
          'email'    => $data['email'],
          'password' => bcrypt($data['password']),
      ]);
  }
}
