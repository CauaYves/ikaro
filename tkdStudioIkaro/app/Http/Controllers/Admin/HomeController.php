<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class HomeController extends Controller
{
    public function index()
    {
      if (Auth::user()->access == 1) {
          return '/';
        } else {
          return view ('admin.home.index');
        }
    }
}
