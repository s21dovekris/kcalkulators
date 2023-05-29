<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/js/bootstrap.min.js"></script>
</head>

@extends('layout')

@section('content')
    <div class="container">
        <h4 class="m-2">Pievienot ēdienu</h4>

        <form id="recipeForm" method="POST" action="{{ route('receptes.store') }}">
            @csrf

            <div class="form-group">
                <label for="name">Ēdiena nosaukums:</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="guide">Ēdiena apraksts:</label>
                <textarea name="guide" class="form-control" required></textarea>
            </div>

            <div class="form-group">
                <label for="productSearch">Meklēt produktu:</label>
                <input type="text" id="productSearch" class="form-control" placeholder="Ievadiet nosaukumu">
            </div>

            <div id="selectedProducts" class="mb-3"></div>
        
            <table id="produktsTable" class="table">
                <thead class="table-light">
                    <tr>
                        <th>Nosaukums</th>
                        <th>Svars/Daudzums, kg/l</th>
                        <th>Kaloritāte</th>
                        <th>Kalorijas</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>

            <div id="errorBox" class="alert alert-danger" style="display: none;"></div>

            <button type="submit" class="btn btn-success m-2">Izveidot ēdienu</button>
            <a href="{{ route('receptes.index') }}" class="btn btn-secondary">Atpakaļ</a>
        </form>
    </div>

    <script>
        /**
         * 
         * Funkcija, kas pievieno izvēlēto produktu tabulai apstrādei front-endā.
         * 
        */
        function addProductToTable(product) {
            var tbody = $('#produktsTable tbody');
            var row = $('<tr>');
            row.append($('<td>').text(product.nosaukums));
            row.append($('<td>').append($('<input>').attr('type', 'number').attr('name', 'produkts[' + product.id + '][svars]').addClass('form-control').attr('min', '0').attr('max', '10.0').attr('step', '0.001').attr('required', true)));
            row.append($('<td>').text(product.kaloritate));
            row.append($('<td>').text(''));
            tbody.append(row);
        }

        /**
         * 
         * Produktu meklētājs izmantojot meklēšanas joslu.
         * 
        */
        $('#productSearch').on('keyup', function () {
            var searchValue = $(this).val();
            searchForProduct(searchValue);
        });

        /**
         * 
         * Produkta pievienotājs produktu sarakstam, atiestatot meklēšanu uz tukšu meklētāju.
         * 
        */
        $(document).on('click', '.product-item', function () {
            var id = $(this).data('id');
            var name = $(this).data('name');
            var kaloritate = $(this).data('kaloritate');
            var product = { id: id, nosaukums: name, kaloritate: kaloritate };
            addProductToTable(product);
            $('#selectedProducts').empty();
            $('#productSearch').val('');
        });

        /**
         * 
         * Produktu uzskaitītājs, pievienojot produktus ēdienam.
         * 
        */
        function displayProductSearchResults(results) {
            var selectedProducts = $('#selectedProducts');
            selectedProducts.empty();

            for (var i = 0; i < results.length; i++) {
                var product = results[i];
                var item = $('<div>').addClass('mb-2 product-item').data('id', product.id).data('name', product.nosaukums).data('kaloritate', product.kaloritate);
                item.append($('<span>').text(product.nosaukums));
                selectedProducts.append(item);
            }
        }

        /**
         * 
         * Funkcija produktu meklēšanai izmantojot AJAX vaicājumu, kas meklē produktus pēc ievadītās vērtības meklētājā
         * 
        **/

        function searchForProduct(searchValue) {
            $.ajax({
                type: 'GET',
                url: '{{ route('product.search') }}',
                data: { search: searchValue },
                success: function (data) {
                    displayProductSearchResults(data);
                },
                error: function (xhr) {
                    console.log(xhr.responseText);
                }
            });
        }

        /**
         * 
         * Receptes pievienošanas pārbaude, kas pārbauda, vai vismaz viens produkts ir pievienots ēdienam
         * 1. Produktu skaitīšana
         * 2. Ja produkti nav, tad izsauc kļūdu.
         * 
        */

        $('#recipeForm').on('submit', function(e) {
            e.preventDefault(); 

            var productCount = $('#produktsTable tbody tr').length; 

            if (productCount === 0) {
                $('#errorBox').text('Pievieno vismaz vienu produktu ēdienam.').show();
            } else {
                $('#errorBox').hide();
                this.submit();
            }
        });

        /**
         * 
         * Funkcija kaloriju skaitīšanai izmantojot norādīto produktu svaru un paņemto produkta kaloritāti
         * kalorijas = kaloritāte * 10 * svars; //Šādi daudzumi, jo produkta svari norādīti kilogramos un kaloritāte atbilst 100 gramiem.
         * 
        **/

        function calculateKalorijas(input) {
            var row = input.closest('tr');
            var kaloritāte = parseFloat(row.find('td:nth-child(3)').text());
            var svars = parseFloat(input.val());
            var kalorijas = kaloritāte * 10 * svars;

            row.find('td:nth-child(4)').text(kalorijas.toFixed(2));
        }

        /**
         * 
         * Kaloriju atjaunošana, sniedzot datus par produktu
         * 
         * 
        **/

        $(document).on('input', '#produktsTable input', function() {
            calculateKalorijas($(this));
        });
        
    </script>
@endsection

</html>