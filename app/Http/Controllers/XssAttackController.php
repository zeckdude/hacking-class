<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

class XssAttackController extends Controller
{
  public function findUsers(Request $request) {
    $name = $request->query('name');

    //var_dump($name);

    // Safe approach (using unnamed parameters)
    $query = 'SELECT name FROM users WHERE name LIKE ?';
    $foundUsers = DB::select($query, [$name]);

    return view('xss-attack', [
      'found_users' => $foundUsers,
      'old_name' => $name,
    ]);
  }

  public function getCookie(Request $request) {
    $cookie = $request->query('cookie');

    return view('hackers-site', [
      'cookie' => $cookie,
    ]);
  }
}
