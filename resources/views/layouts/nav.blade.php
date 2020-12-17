<div class="container-fluid bg-dark fixed-top ">
<nav class="navbar navbar-expand-lg navbar-light container">
  <div>
  <span><img src="<?php echo URL_ROOT ."assets/img/logo.jpg"?>" alt="" height="30" width="30" class="rounded">
  </span>
  <span class="text-white ml-3">Navbar</span>
  </div>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse mr-auto" id="navbarNavDropdown">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link text-white english" href="{{URL_ROOT}}">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white english" href="{{URL_ROOT}}cart">Cart <span class="position-relative badge badge-danger rounded" style="top: -10px;" id="card-count">0</span><span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white english" href="<?php echo URL_ROOT . 'admin' ?>">Admin <span class="sr-only">(current)</span></a>
      </li>

      <li class="nav-item dropdown">
      @if(\App\Classes\Auth::check())
        <a class="nav-link dropdown-toggle text-white english" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{\App\Classes\Auth::user()->name }}
        </a>
      @else
      <a class="nav-link dropdown-toggle text-white english" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Member
        </a>
      @endif

        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
        @if(\App\Classes\Auth::check())
          <a class="dropdown-item" href="{{URL_ROOT}}user/logout">Logout</a>
        @else
          <a class="dropdown-item" href="{{URL_ROOT}}user/register">Register</a>
          <a class="dropdown-item" href="{{URL_ROOT}}user/login">Login</a>
        @endif
        </div>
      </li>
    </ul>
  </div>
</nav>
</div>