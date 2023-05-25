<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/js/bootstrap.min.js"></script>
</head>

@extends('layout')

@section('content')
    <div class="container-sm text-left">
        <h4 class="m-2">Ēdienu saraksts</h4>

        <div class="container-sm mb-2">
            <div class="search">
                <input type="search" name="search" id="search" class="form-control" placeholder="Meklēt ēdienu..">
            </div>
        </div>

        <table id="existingRecipesTable" class="table">
          <thead class="table-light">
              <tr>
                  <th>Nosaukums</th>
                  <th>Apraksts</th>
                  <th></th>
              </tr>
          </thead>
          <tbody>
              @foreach ($recipes as $recipe)
                  <tr>
                      <td>{{ $recipe->nosaukums }}</td>
                      <td>{{ $recipe->apraksts }}</td>
                      <td><a href="{{ route('receptes.show', $recipe->id) }}" class="btn btn-secondary">Atvērt</a></td>
                  </tr>
              @endforeach
          </tbody>
      </table>

        <div id="searchResults"></div>
        @auth
        <a href="{{ route('receptes.create') }}" class="btn btn-success">Pievienot ēdienu</a>
        @endauth
    </div>

    <script type="text/javascript">
      $('#search').on('keyup', function() {
          var $value = $(this).val();
  
          $.ajax({
              type: 'GET',
              url: '{{ route('receptes.search') }}',
              data: { search: $value },
              success: function(data) {
                  if (data.trim().length > 0) {
                      // Hide existing recipe table if search results found
                      $('#existingRecipesTable').hide();
                  } else {
                      // Show existing recipe table if no search results found
                      $('#existingRecipesTable').show();
                  }
                  $('#searchResults').html(data);
              },
              error: function(xhr) {
                  console.log(xhr.responseText);
              }
          });
      });
  </script>
    @stop
</html>