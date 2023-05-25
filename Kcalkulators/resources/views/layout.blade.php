<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kcalkulators</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/js/bootstrap.min.js"></script>
    
    <style>
        html,
        body {
            height: 100%;
        }

        body {
            background-color: lightgrey;
        }

        .wrapper {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .content {
            flex: 1;
        }
    </style>
</head>

<body class="bg-light">
  <div class="wrapper">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <a class="navbar-brand" href="/">Kcalkulators</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ml-auto mr-lg-auto">
                  <li class="nav-item">
                      <a class="nav-link" href="/produkts">Produkti</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="/receptes">Ēdieni</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="/contact">Sazinies ar mani!</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="https://ottohotel.lv/">OTTO</a>
                  </li>
              </ul>

              <ul class="navbar-nav ml-auto">
                  @auth
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();">
                          Izrakstīties
                      </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>
                  </li>
                  @endauth
              </ul>
          </div>
      </nav>

      <div class="content">
          @yield('content')
      </div>

      <footer class="bg-light text-center text-lg-start">
          <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
              © 2023 Copyright Kristaps Doveiks
          </div>
      </footer>
  </div>
</body>

</html>
