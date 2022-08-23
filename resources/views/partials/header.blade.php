<nav class="navbar navbar-expand-lg navbar-light bg-white py-4">
    <div class="container">
      <a class="navbar-brand fw-bold text-uppercase" href="{{ route('home') }}">Blog</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ms-auto">
            @auth
                <a class="nav-link" href="{{ route('users', auth()->user()) }}">
                  <?php 
                    $firstName = auth()->user()->profile->first_name;
                    $lastName = auth()->user()->profile->last_name;
                  ?>

                  {{ $firstName && $lastName ? $firstName . ' ' . $lastName : 'Anonymous' }}

                </a>
                <form action="{{ route('logout') }}" method="POST" class="d-inline me-3">
                  @csrf
                  <button type="submit" class="nav-link bg-transparent border-0">Logout</button>
                </form>
            @endauth

            @guest
                <a class="nav-link" href="{{ route('login') }}">Login</a>
                <a class="nav-link" href="{{ route('register') }}">Register</a>
            @endguest
            <a class="nav-link bg-primary px-4 rounded text-white" href="{{ route('posts') }}">Post</a>
        </div>
      </div>
    </div>
</nav>