<!DOCTYPE html>
<html lang="en">
  <head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>      
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
                    </tr>
                </thead>
                    <tbody>
                        @foreach($produkts as $produkts)
                        <tr >
                            <td>{{$produkts->nosaukums}}</td>
                            <td>{{$produkts->kategorija}}</td>
                            <td>{{$produkts->kaloritate}}</td>
                            <td><a href="{{ route('produkts.show', $produkts->id) }}">View Details</a></td>
                        </tr>

                        @endforeach
                        <tbody id="Content"></tbody>
                    </tbody>
                </table>
        
        

         
         </div>

         <div class="container-sm text-center">
         <a href="#" class="btn btn-success active mb-2" role="button" aria-pressed="true">Pievienot produktu</a>  
        </div>

        <script type="text/javascript">
            $('search').on('keyup', function() {
    
            $value=$(this).val();
                alert(search);
            $.ajax({
                type:'get',
                url:'{{URL::to('search')}}',
                data:{'search':$value},

                success:function(data) {
                    console.log(data);
                    $('#Content').html(data);
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
