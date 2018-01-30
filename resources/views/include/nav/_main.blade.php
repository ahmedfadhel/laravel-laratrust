<nav class="navbar">
  <div class="navbar-brand">
    <a class="navbar-item" href="https://bulma.io">
      <img src="https://bulma.io/images/bulma-logo.png" alt="Bulma: a modern CSS framework based on Flexbox" width="112" height="28">
    </a>

    <button class="button navbar-burger">
      <span></span>
      <span></span>
      <span></span>
    </button>
  </div>
  <div class="navbar-end">
    @if (Auth::guest())
      <a class="navbar-item" href="{{ route('login') }}">Login</a>
      <a class="navbar-item" href="{{ route('register') }}">Register</a>
    @else 
    <div class="navbar-item is-hoverable" id="">
        <a href="#" class="navbar-link " >
            {{ Auth::user()->name }}
        </a>
      <div class="navbar-dropdown">
        <!-- Other navbar items -->
        <a class="navbar-item" href="{{ route('logout') }}"
          onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
          Logout
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
      {{--  </div>  --}}
    </div>
    @endif
  </div>
</nav>