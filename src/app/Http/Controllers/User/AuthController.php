<?php

namespace App\Http\Controllers\User;

class AuthController extends Controller
{
  public function login(){return view('auth/login');
  }
  public function reset(){return view('auth/reset');
  }
  public function sent(){return view('auth/sent');
  }
  public function register(){return view('auth/register');
  }
  public function confirm(){return view('auth/confirm');
  }
  public function complete(){return view('auth/complete');
  }
}