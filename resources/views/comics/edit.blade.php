@extends('layout.main')

@section('content')

<div class="container my-5">
    <!-- Titolo della pagina di modifica -->
    <h1>Modifica il tuo fumetto</h1>
    <div class="row">
        <div class="col-10">

            <!-- Form per modificare il fumetto esistente -->
            <form action="{{ route('comics.update', $comic) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Campo per il titolo del fumetto -->
                <div class="mb-3">
                  <label for="title" class="form-label">Titolo</label>
                  <input name="title" type="text" class="form-control" id="title" value="{{ $comic->title }}" >
                </div>

                <!-- Campo per la descrizione del fumetto -->
                <div class="mb-3">
                  <label for="description" class="form-label">Descrizione</label>
                  <textarea name="description" type="text" class="form-control" id="description">{{ $comic->description }}</textarea>
                </div>

                <!-- Campo per il prezzo del fumetto -->
                <div class="mb-3">
                  <label for="price" class="form-label">Prezzo</label>
                  <input name="price" type="text" class="form-control" id="price" value="{{ $comic->price }}" >
                </div>

                <!-- Campo per la serie del fumetto -->
                <div class="mb-3">
                  <label for="series" class="form-label">Serie</label>
                  <input name="series" type="text" class="form-control" id="series" value="{{ $comic->series }}">
                </div>

                <!-- Campo per la data di uscita del fumetto -->
                <div class="mb-3">
                  <label for="sale_date" class="form-label">Data Di Uscita</label>
                  <input name="sale_date" type="date" class="form-control" id="sale_date" value="{{ $comic->sale_date }}">
                </div>

                <!-- Campo per il tipo di fumetto -->
                <div class="mb-3">
                  <label for="type" class="form-label">Tipo</label>
                  <input name="type" type="text" class="form-control" id="type" value="{{ $comic->type }}">
                </div>

                <!-- Campo per i disegnatori del fumetto, convertiti da JSON ad array e poi a stringa -->
                <div class="mb-3">
                  <label for="artists" class="form-label">Disegnatore/i</label>
                  <input name="artists" type="text" class="form-control" id="artists" value="{{ implode(', ', json_decode($comic->artists, true)) }}">
                </div>

                <!-- Campo per gli scrittori del fumetto, convertiti da JSON ad array e poi a stringa -->
                <div class="mb-3">
                  <label for="writers" class="form-label">Scrittore/i</label>
                  <input name="writers" type="text" class="form-control" id="writers" value="{{ implode(', ', json_decode($comic->writers, true)) }}">
                </div>

                <!-- Pulsante per inviare il form e salvare le modifiche -->
                <button type="submit" class="btn btn-success">Salva le modifiche</button>
                <!-- Pulsante per resettare il form -->
                <button type="reset" class="btn btn-warning">Reset</button>
              </form>
        </div>
    </div>
</div>

@endsection
