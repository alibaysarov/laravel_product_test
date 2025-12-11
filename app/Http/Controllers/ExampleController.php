<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExampleController extends Controller
{

  public function hello()
  {
    return response()->json([
      'message' => 'Hello World!'
    ]);
  }
}
