<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }

    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height : 80vh}

    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }
    .well-sm {
      margin: 10px;
      padding:9px;
      border-radius:3px
    }
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }

    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;}
    }
  </style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">Home</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      @if(Auth::check())
      <ul class="nav navbar-nav">
        <!-- <li class="active"><a href="#">Home</a></li> -->
        <li><a href="/profile" class="nav-link">Profile</a></li>
        <li><a href="/board" class="nav-link">Forum</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
                <li class=""><a href="#">Hi {{Auth::user()->email}}</a></li>
        <li><a href="/logout"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
      </ul>
      @else
      <ul class="nav navbar-nav">
        <li><a href="/board" class="nav-link">Forum</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="/signup" class="nav-link">Sign Up</a></li>
        <li><a href="/"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
      @endif
    </div>
  </div>
</nav>

<div class="container-fluid text-center">
  <div class="row content">
    <div class="col-sm-2 sidenav">
    </div>
    <div class="col-sm-8 text-left">
      @yield('main')
    </div>
    <div class="col-sm-2 sidenav">
    </div>
  </div>
</div>
<footer class="container-fluid text-center">
  <p>contact info:jaejunmi@usc.edu</p>
</footer>
</body>
</html>
