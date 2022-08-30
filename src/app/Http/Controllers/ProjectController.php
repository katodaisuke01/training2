<?php

namespace App\Http\Controllers;

class ProjectController extends Controller
{
  public function index()
  {
    return view('project/index');
  }
  public function single()
  {
    return view('project/single');
  }
}
