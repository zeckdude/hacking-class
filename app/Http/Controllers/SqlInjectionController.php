<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

class SqlInjectionController extends Controller
{
  public function findUsers() {
    $input = Input::only('name');

    $query = 'select name from users where name LIKE "' . $input['name'] . '"';
    $foundUsers = DB::select($query);
    //$foundUsers = DB::select('select name from users where name LIKE "Chris" UNION SELECT schema_name AS name FROM information_schema.schemata WHERE "a"="a"');
    //var_dump($foundUsers);


    return view('sql-injection', [
      'found_users_query' => $query,
      'found_users' => $foundUsers,
      'old_name' => $input['name'],
    ]);

    return view('sql-injection', ['logged_in_user' => 'duuuuuude']);
  }
}
