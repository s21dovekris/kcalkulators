<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/js/bootstrap.min.js"></script>
</head>


@extends('layout')

@section('content')
    <div class="container">
        <h4 class="m-2">{{ $recipe->nosaukums }}</h4>
        <p>{{ $recipe->apraksts }}</p>

        <table class="table">
            <thead class="table-light">
                <tr>
                    <th>Nosaukums</th>
                    <th>Svars/Daudzums, kg/l</th>
                    <th>Kaloritāte</th>
                    <th>Kalorijas</th>
                </tr>
            </thead>
            <tbody>
                @php
                $totalCalories = 0;
                @endphp
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->nosaukums }}</td>
                        <td>{{ $product->pivot->svars }}</td>
                        <td>{{ $product->kaloritate }}</td>
                        <td>{{ $product->kaloritate * $product->pivot->svars }}</td>
                        @php
                            $totalCalories += $product->kaloritate * $product->pivot->svars;
                        @endphp
                    </tr>
                @endforeach
                <tr>
                    <td colspan="3" class="text-end"><strong>Kopējās kalorijas:</strong></td>
                    <td>{{ $totalCalories }}</td>
                </tr>
            </tbody>
        </table>
        <a href="{{ route('receptes.index', $recipe->id) }}" class="btn btn-secondary">Atpakaļ uz receptēm</a>
        @auth
        <a href="{{ route('receptes.edit', $recipe->id) }}" class="btn btn-success">Labot recepti</a>
        <a href="{{ route('receptes.delete', $recipe->id) }}"
            class="btn btn-danger"
            onclick="event.preventDefault();
                     if (confirm('Vai tiešām vēlaties dzēst šo ēdienu?')) {
                         document.getElementById('delete-form').submit();
                     }">
            Dzēst
         </a>
         <form id="delete-form" action="{{ route('receptes.delete', $recipe->id) }}" method="POST" style="display: none;">
             @csrf
             @method('DELETE')
         </form>
        @endauth
    </div>
@endsection

</html>