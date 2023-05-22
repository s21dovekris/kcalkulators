@extends('layout')

@section('content')
    <div class="container">
        <h4>Nosūti man ziņu!</h4>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('contact.store') }}">
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