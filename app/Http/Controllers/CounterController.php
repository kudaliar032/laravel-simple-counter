<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CounterController extends Controller
{
  public function __invoke(Request $request)
  {
    $visits = Redis::get('visits');
    Redis::incr('visits');
    return view('counter', [
      'date' => Carbon::now()->isoFormat('MMMM Do YYYY, h:mm:ss a'),
      'hostname' => gethostname(),
      'visits' => $visits == 0 ? 'First visit' : $visits,
      'ip' => $request->ip(),
      'render_time' => microtime(true) - LARAVEL_START
    ]);
  }
}
