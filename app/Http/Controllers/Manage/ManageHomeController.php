<?php

namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
use App\Manage;
use Auth;
use App\Http\Controllers\Controller;

class ManageHomeController extends Controller
{
    public function index() {
        return 'test';
    }
}
