<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/js/bootstrap.min.js"></script>
</head>
@extends('layout')

@section('content')
    <div class="container-sm text-left">
        <h4 class="m-2">Atstāj atsauksmi vai ieteikumu!</h4>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('reviews.store') }}">
            @csrf

            <div class="form-group">
                <label for="name">Tavs vārds:</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="email">Tavs epasts:</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="message">Ziņa:</label>
                <textarea name="message" class="form-control" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary m-2">Nosūtīt</button>
        </form>
    </div>
@endsection
</html>