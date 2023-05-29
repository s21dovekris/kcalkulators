<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/js/bootstrap.min.js"></script>
</head>

@extends('layout')

@section('content')
    <div class="container-sm text-left">
        <h3 class="m-2">Izmainīt produktu</h3>

        <form action="{{ route('produkts.update', $produkts->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nosaukums">Nosaukums</label>
                <input type="text" name="nosaukums" id="nosaukums" class="form-control" value="{{ $produkts->nosaukums }}" required>
                @error('nosaukums')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="kategorija">Kategorija</label>
                <select name="kategorija" id="kategorija" class="form-control">
                    @foreach(['Gaļa', 'Piens', 'Rieksti', 'Garšvielas', 'Dārzeņi', 'Bakaleja', 'Olas'] as $option)
                        <option value="{{ $option }}" @if($produkts->kategorija == $option) selected @endif>{{ $option }}</option>
                    @endforeach
                </select>
                @error('kategorija')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="mervieniba">Mērvienība</label>
                <select name="mervieniba" id="mervieniba" class="form-control">
                    @foreach(['l', 'kg', 'gb'] as $option)
                        <option value="{{ $option }}" @if($produkts->mervieniba == $option) selected @endif>{{ $option }}</option>
                    @endforeach
                </select>
                @error('mervieniba')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="kaloritate">Kaloritāte</label>
                <input type="text" name="kaloritate" id="kaloritate" class="form-control" value="{{ $produkts->kaloritate }}" required>
                @error('kaloritate')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="alergija">Alergēns</label>
                <select name="alergija" id="alergija" class="form-control">
                    @foreach(['Nav', 'Glutēns', 'Rieksti', 'Vēžveidīgie', 'Zivis', 'Soja', 'Olas', 'Selerija', 'Lupīna', 'Piens'] as $option)
                        <option value="{{ $option }}" @if($produkts->alergija == $option) selected @endif>{{ $option }}</option>
                    @endforeach
                </select>
                @error('alergija')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="vegan">Vai vegāns?</label>
                <select name="vegan" id="vegan" class="form-control">
                    <option value="1" @if($produkts->vegan) selected @endif>Jā</option>
                    <option value="0" @if(!$produkts->vegan) selected @endif>Nē</option>
                </select>
                @error('vegan')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-secondary m-2">Saglabāt</button>
        </form>
    </div>
@endsection
</html>