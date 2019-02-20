@extends('layouts.main')

@section('content')
  <div class="instruction">
    <p>A SQL Injection attack exploits sites that let users query the database, usually via a form field.
    The strategy is to intercept the query that gets run in order to add your own query. This can let you view and manipulate data in the database and can lead to disastrous consequences for the site, including exposing user data, altering data, or even deleting data.</p>
  </div>

  @php
    //if (isset($found_users)) {
    //  var_dump($found_users);
    //}
  @endphp

  <div class="directions">
    <h2>Exercise Directions</h2>
    <p>Below you will find a list of directions on a way to control a database by intercepting the query being sent, a.k.a SQL Injection</p>
    <p>Follow the steps below and if you need it, click on a hint to reveal it</p>
  </div>

  <div class="exercise-container">
    <div class="exercise">
      <h2>Find Users</h2>
      <form method="post" action="{{action('SqlInjectionController@findUsers')}}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" id="name" name="name" value="{{$old_name or null}}" placeholder="Enter Name">
        </div>
        <button type="submit" value="Search" class="button">sdfsdd</button>
      </form>

      @if(isset($found_users))
        <p class="query">
          Database query executed:
          <span>{{ $found_users_query }}</span>
        </p>

        <h3>Found Users</h3>
        <table>
          <tr>
            <th>Users</th>
          <tr>
          @forelse ($found_users as $user)
            <tr>
              <td>{{ $user->name }}</td>
            </tr>
          @empty
            <tr>
              <td>No users found</td>
            </tr>
          @endforelse
        </table>
      @endif
    </div>

    <div class="steps">
      <h2>Steps</h2>
      <ul>
        <li>
          <span class="step-title">1. Check if the query is possibly vulnerable to a SQL injection</span>
          <span class="step-hint hidden">Hint: <span>Add a character that could interrupt the SQL statement</span></span>
          <span class="step-hint hidden">Hint: <span>Put this in the search field: <code>"</code></span></span>
        </li>
      </ul>
    </div>
  </div>

@endsection
