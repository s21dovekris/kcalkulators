<!DOCTYPE html>
<html lang="en">
<div class="container-fluid">
<div class="w-auto h-auto p-3 mb-2 bg-light text-dark">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kcalkulators</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Kcalkulators</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Produkts</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Ēdieni</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Sazinies ar mani!</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Atsauksmes un ieteikumi</a>
      </li>
      </ul>
      
  </div>
</nav>
  </head>

    <body>




        <div class="p-3 mb-2 bg-light text-dark">
          <div class="container-sm text-center">

                <p class="lead">Kcalkulators, tā ir tava iespēja sekot līdzi savām uzņemtajām kalorijām no produktu vai ēdienu lietošanas uzturā un ne tikai! Saglabā sevis veidotos ēdienus un izmanto šo aplikāciju arī kā recepšu grāmatu!</p>
                
                <div class="d-grid gap-2 col-4 mx-auto">

                    <button class="btn btn-secondary" type="submit" onclick="location.href='/produkti';">Produktu saraksts</button>
                    <button class="btn btn-secondary" type="submit" onclick="location.href='/edieni';">Ēdieni</button>

                </div>
                <div class="google-btn">
                  <div class="google-icon-wrapper">
                    <a href="{{ route('google-auth') }}">
                      <img class="google-icon" width="50" height="60"src="https://upload.wikimedia.org/wikipedia/commons/5/53/Google_%22G%22_Logo.svg"/>
                    </a>
                  </div>
                <p class="lead"><b>Pieslēdzies</b></p>
                </div>
          </div>
        </div>
    </body>
    <footer class="bg-light text-center text-lg-start">
  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2023 Copyright Kristaps Doveiks
  </div>
  <!-- Copyright -->
</footer>
</div>   
</div> 
</html>
