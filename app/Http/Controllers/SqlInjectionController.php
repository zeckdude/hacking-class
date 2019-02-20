<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

class SqlInjectionController extends Controller
{
  public function findUsers() {
    $inputs = Input::all();
    $query_input = $inputs['name'];
    $is_risky_search = isset($inputs['risky-search']) ? true : false;
    $is_safe_search = isset($inputs['safe-search']) ? true : false;

    if ($is_risky_search) {
      // Unsafe approach (using the input as is)
      $beginning_query = 'SELECT name FROM users WHERE name LIKE "';
      $end_query = '"';
      $query = $beginning_query . $query_input . $end_query;
      $foundUsers = DB::select($query);
    }

    if ($is_safe_search) {
      // Safe approach (using unnamed parameters)
      $query = 'SELECT name FROM users WHERE name LIKE ?';
      $foundUsers = DB::select($query, [$query_input]);
    }


    if (!isset($beginning_query) || !isset($end_query)) {
      $beginning_query = null;
      $end_query = null;
    }

    return view('sql-injection', [
      'found_users_beginning_query' => $beginning_query,
      'found_users_query_input' => $query_input,
      'found_users_end_query' => $end_query,
      'found_users_query' => $query,
      'found_users' => $foundUsers,
      'old_name' => $query_input,
    ]);

    return view('sql-injection', ['logged_in_user' => 'duuuuuude']);
  }
}
