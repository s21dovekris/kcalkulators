<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/js/bootstrap.min.js"></script>
</head>

@extends('layout')

@section('content')
<body>
    <div class="p-3 mb-2 bg-light text-dark">
        <div class="container text-center">

            <p class="lead">Kcalkulators, tā ir tava iespēja sekot līdzi savām uzņemtajām kalorijām no produktu vai ēdienu lietošanas uzturā un ne tikai! Saglabā sevis veidotos ēdienus un izmanto šo aplikāciju arī kā recepšu grāmatu!</p>

            <div class="d-grid gap-2 col-4 mx-auto">
                <button class="btn btn-secondary" type="submit" onclick="location.href='/produkts/';">Produktu saraksts</button>
                <button class="btn btn-secondary" type="submit" onclick="location.href='/receptes/';">Ēdieni</button>
            </div>

            <div class="m-2">
                @auth
                <p class="lead">Sveicināti, {{ Auth::user()->name }}!</p>
                @else
                <div class="google-btn">
                    <div class="google-icon-wrapper">
                        <a href="{{ route('google-auth') }}">
                            <img class="google-icon" width="50" height="60"
                                src="https://upload.wikimedia.org/wikipedia/commons/5/53/Google_%22G%22_Logo.svg" />
                        </a>
                    </div>
                    <p class="lead"><b>Pieslēdzies</b></p>
                </div>
                @endauth
            </div>

        </div>
    </div>
</body>

@stop

</html>
