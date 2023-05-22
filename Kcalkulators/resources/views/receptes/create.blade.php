@extends('layout')

@section('content')
    <div class="container">
        <h1>Create Recipe</h1>

        <form method="POST" action="{{ route('receptes.store') }}">
            @csrf

            <div class="form-group">
                <label for="name">Recipe Name:</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="guide">Cooking Guide:</label>
                <textarea name="guide" class="form-control" required></textarea>
            </div>

            <h2>Add Products</h2>

            <!-- Add code to display products and their weights -->

            <button type="submit" class="btn btn-primary">Create Recipe</button>
        </form>
    </div>
@endsection