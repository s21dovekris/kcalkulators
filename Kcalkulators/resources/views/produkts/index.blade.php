<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/js/bootstrap.min.js"></script>
</head>

@extends('layout')

@section('content')
    <div class="container-sm text-left">
        <h4 class="m-2">Produktu saraksts</h4>

        <div class="container-sm mb-2">
            <div class="search">
                <input type="search" name="search" id="search" class="form-control" placeholder="Meklēt produktu..">
            </div>
        </div>
        
        <table id="existingProductsTable" class="table">
            <thead class="table-light">
                <tr>
                    <th>Nosaukums</th>
                    <th>Kategorija</th>
                    <th>Kaloritāte</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produkts as $produkt)
                    <tr>
                        <td>{{ $produkt->nosaukums }}</td>
                        <td>{{ $produkt->kategorija }}</td>
                        <td>{{ $produkt->kaloritate }}</td>
                        <td><a href="{{ route('produkts.info', $produkt->id) }}" class="btn btn-secondary">Atvērt</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div id="searchResults"></div>
        @auth
        <a href="{{ route('produkts.create') }}" class="btn btn-success">Pievienot produktu</a>
        @endauth
    </div>

    <script type="text/javascript">
        $('#search').on('keyup', function() {
            var $value = $(this).val();
    
            $.ajax({
                type: 'GET',
                url: '{{ route('produkts.search') }}',
                data: { search: $value },
                success: function(data) {
                    if (data.trim().length > 0) {
                        // Hide existing products table if search results found
                        $('#existingProductsTable').hide();
                    } else {
                        // Show existing products table if no search results found
                        $('#existingProductsTable').show();
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