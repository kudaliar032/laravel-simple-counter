<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;
use Illuminate\Http\Request;

class CounterController extends Controller
{
  public function __invoke(Request $request)
  {
    $visits = Redis::get('visits');
    Redis::incr('visits');
    return view('counter', [
      'visits' => $visits,
      'ip' => $request->ip(),
    ]);
  }
}
