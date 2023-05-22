<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/js/bootstrap.min.js"></script>
</head>


@extends('layout')

@section('content')
    <div class="container-sm text-left">
        <h3 class="m-2">Pievienot produktu</h3>

        <form action="{{ route('produkts.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="nosaukums">Nosaukums</label>
                <input type="text" name="nosaukums" id="nosaukums" class="form-control" value="{{ old('nosaukums') }}">
            </div>

            <!-- Add more input fields for other attributes -->

            <button type="submit" class="btn btn-secondary m-2">Pievienot</button>
        </form>
    </div>
@endsection

</html>