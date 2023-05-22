<!DOCTYPE html>
<html lang="en">
  <head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/js/bootstrap.min.js"></script>
  </head>
  @extends('layout')

  @section('content')
    <body>

        <div class="container-sm text-left">
        
                <h4 class="m-2">Produktu saraksts</h4>
        
                <div class="container-sm mb-2">
                        <div class="search">
                            <input type="search" name="search" id="search" class="form-control" placeholder="Meklēt produktu..">
                        </div>
                </div>
                
               
                <table class="table">
                    
                <thead class="table-light">
                    <tr>
                        <th scope="col">Nosaukums</th>
                        <th scope="col">Kategorija</th>
                        <th scope="col">Kaloritāte</th>
                        <th scope="col">Papildu</th>
                    </tr>
                </thead>
                <tbody id="Content">
                        @foreach($produkts as $produkt)
                        <tr >
                            <td>{{$produkt->nosaukums}}</td>
                            <td>{{$produkt->kategorija}}</td>
                            <td>{{$produkt->kaloritate}}</td>
                            <td><a href="{{ route('produkts.info', $produkt->id) }}">Atvērt</a></td>
                        </tr>

                        @endforeach
                        </tbody>
                    
                </table>
        

         <a href="{{ route('produkts.jaunsprodukts') }}" class="btn btn-success active mb-2">Pievienot produktu</a>  
         </div>

       
        

        <script type="text/javascript">
            $('#search').on('keyup', function() {
    
            $value=$(this).val();

            $.ajax({
                type:'get',
                url:'{{URL::to('search')}}',
                data:{search:$value},

                success:function(data) {
                    console.log(data);
                    $('#Content').html(data);
                
                },
                error: function(xhr) {
                console.log(xhr.responseText);
                }
            });
            })
        </script>


        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/js/bootstrap.min.js"></script>
        <script>
            function openProdukt(produktId) {
            window.location.href = '/index/' + produktId;
            }
        </script>
    </body>
  @stop
</html>
