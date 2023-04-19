<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
    <body>
        <div class="container-fluid text-center">
                <h1>Kcalkulators</h1>
                <p>Kcalkulators, tā ir tava iespēja sekot līdzi savām uzņemtajām kalorijām no produktu vai ēdienu lietošanas uzturā un ne tikai! Saglabā sevis veidotos ēdienus un izmanto šo aplikāciju arī kā recepšu grāmatu!</p>
                
                <div class="d-grid gap-2 col-6 mx-auto">

                    <button class="btn btn-primary" type="submit" onclick="location.href='/produkti';">Produktu saraksts</button>
                    <button class="btn btn-primary" type="submit" onclick="location.href='/edieni';">Ēdieni</button>

                </div>
        </div>
    </body>
</html>
