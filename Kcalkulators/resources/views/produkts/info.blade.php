<!DOCTYPE html>
<html lang="en">
  <head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/js/bootstrap.min.js"></script>
  </head>


@extends('layout')

@section('content')
    <div class="container-sm text-left">
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
        <h3 class="m-2">Informācija par produktu</h3>

        <div>
            <h5>{{ $produkts->nosaukums }}</h5>
            <p>Kategorija: {{ $produkts->kategorija }}</p>
            <p>Mērvienība: {{ $produkts->mervieniba }}</p>
            <p>Kaloritāte: {{ $produkts->kaloritate }}</p>
            <p>Alergēns: {{ $produkts->alergija }}</p>
            <p>Vai vegāns? @if ($produkts->vegan)
                    <span style="color: green">&#10004;</span>
                @else
                    <span style="color: red">&#10008;</span>
                @endif</p>
        </div>
       
        <a href="{{ route('produkts.index') }}" class="btn btn-secondary">Atpakaļ uz produktiem</a> 
         @auth
        <a href="{{ route('produkts.edit', $produkts->id) }}" class="btn btn-success">Labot</a>
        <a href="{{ route('produkts.delete', $produkts->id) }}"
            class="btn btn-danger"
            onclick="event.preventDefault();
                     if (confirm('Vai tiešām vēlaties dzēst šo produktu?')) {
                         document.getElementById('delete-form').submit();
                     }">
            Dzēst
         </a>
         <form id="delete-form" action="{{ route('produkts.delete', $produkts->id) }}" method="POST" style="display: none;">
             @csrf
             @method('DELETE')
         </form>
        @endauth
        
    </div>
   
    
@endsection

</html>