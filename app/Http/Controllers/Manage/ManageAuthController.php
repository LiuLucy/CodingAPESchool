<?php

namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Manage;
use Hash;
use Validator;
use View;

class ManageAuthController extends Controller
{
    protected $loginLocation = 'manage/login';

    protected $registerLocation = 'manage/register';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('Manage.auth.login');
    }

    public function showregisterForm()
    {
        return view('Manage.auth.register');
    }

    public function login()
    {
      $input = request()->all();
      //驗證規則
      $rules = [
        'email' => [
          'required',
          'email',
        ],
        'password' => [
          'required',
        ],
      ];

      $validator = Validator::make($input,$rules);

      if($validator->fails()) {
          return redirect($this->loginLocation)
                ->withErrors($validator)
                ->withInput();
      }

      $Manage = $this->getUserData($input['email'],"email");

      if ($Manage === null) {
        return redirect($this->loginLocation)
              ->withErrors($this->getErrorMsg())
              ->withInput();
      }

      //驗證密碼
      $is_password_correct = Hash::check($input['password'], $Manage->password);

      if(!$is_password_correct) {
          return redirect($this->loginLocation)
              ->withErrors($this->getErrorMsg())
              ->withInput();
      }

      session()->put('manage_id',$Manage->id);

      return view('Manage.index',['name' => $Manage->name]);

    }

    public function register()
    {
        $input = request()->all();

        $rules = [
          'name' => [
              'required',
              'max:50',
          ],
          'nickname' => [
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
          'phone' => [
              'required',
              'max:10',
              'regex:/(09)[0-9]{8}/',//09開頭後面有八個數字
              'size:10',
          ],
        ];


        $validator = Validator::make($input,$rules);

        if($validator->fails()) {
            return redirect('/manage/register')->withErrors($validator);
        }
        $input['password'] = Hash::make($input['password']);

  //check repeat account or nickname{
        $manageCheck = $this->getUserData($input['nickname'],'nickname');

        if (!$manageCheck == null) {
          $errorCardIdMsg = [
            'error_regist_nickname' => ['綽號有人使用了！',],
          ];
          return redirect($this->registerLocation)
                ->withErrors($errorCardIdMsg)
                ->withInput();
        }

        $manageCheck = $this->getUserData($input['email'],'email');

        if (!$manageCheck == null) {
          $errorCardIdMsg = [
            'error_regist_email' => ['這個Email已經有人註冊了！',],
          ];
          return redirect($this->registerLocation)
                ->withErrors($errorCardIdMsg)
                ->withInput();
        }
  //}

        $Manage = Manage::create($input);
        return redirect('/manage/login');
    }

    public function logout()
    {
      session()->forget('user_id');
      return redirect('/');
    }

    public function getUserData($input,$getName) {
        return Manage::where($getName, $input)->first();
    }
    public function getErrorMsg() {
          $error_message = [
            'error_msg' => ['帳號或密碼驗證錯誤請重新輸入',],
          ];
          return $error_message;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
