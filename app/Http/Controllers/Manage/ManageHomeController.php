<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManageHomeController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
      $this->middleware('manage.auth');
  }

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      return 'ok';
  }
}
