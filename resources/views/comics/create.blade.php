@extends('layout.main')

@section('content')

<div class="container my-5 bg-white py-3">

    <!-- Se ci sono errori di validazione, mostra un'alert con la lista degli errori -->
    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Titolo della pagina -->
    <h1>Aggiungi un Fumetto al Database!</h1>
    <div class="row">
        <div class="col-10">
            <!-- Form per aggiungere un nuovo fumetto -->
            <form action="{{ route('comics.store') }}" method="POST">
                @csrf

                <!-- Campo per il titolo del fumetto -->
                <div class="mb-3">
                  <label for="title" class="form-label">Titolo (*)</label>
                  <input
                    name="title"
                    type="text"
                    class="form-control @error('title') is-invalid @enderror"
                    id="title"
                    value="{{ old('title') }}">
                    @error('title')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>

                <!-- Campo per la descrizione del fumetto -->
                <div class="mb-3">
                  <label for="description" class="form-label">Descrizione</label>
                    <textarea
                        name="description"
                        type="text"
                        class="form-control @error('description') is-invalid @enderror"
                        id="description"
                        value="{{ old('description') }}">
                    </textarea>
                  @error('description')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>

                <!-- Campo per il prezzo del fumetto -->
                <div class="mb-3">
                  <label for="price" class="form-label">Prezzo (*)</label>
                  <input
                    name="price"
                    type="text"
                    class="form-control @error('price') is-invalid @enderror"
                    id="price"
                    value="{{ old('price') }}">
                    @error('price')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>

                <!-- Campo per la serie del fumetto -->
                <div class="mb-3">
                  <label for="series" class="form-label">Serie (*)</label>
                  <input
                    name="series"
                    type="text"
                    class="form-control @error('series') is-invalid @enderror"
                    id="series"
                    value="{{ old('series') }}">
                    @error('series')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>

                <!-- Campo per la data di uscita del fumetto -->
                <div class="mb-3">
                  <label for="sale_date" class="form-label">Data Di Uscita</label>
                  <input
                    name="sale_date"
                    type="date"
                    class="form-control @error('sale_date') is-invalid @enderror"
                    id="sale_date"
                    value="{{ old('sale_date') }}">
                    @error('sale_date')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>

                <!-- Campo per il tipo di fumetto -->
                <div class="mb-3">
                  <label for="type" class="form-label">Tipo</label>
                  <input
                    name="type"
                    type="text"
                    class="form-control @error('type') is-invalid @enderror"
                    id="type"
                    value="{{ old('type') }}">
                    @error('type')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>

                <!-- Campo per i disegnatori del fumetto -->
                <div class="mb-3">
                  <label for="artists" class="form-label">Disegnatore/i (*)</label>
                  <input
                    name="artists"
                    type="text"
                    class="form-control @error('artists') is-invalid @enderror"
                    id="artists"
                    value="{{ old('artists') }}">
                    @error('artists')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>

                <!-- Campo per gli scrittori del fumetto -->
                <div class="mb-3">
                  <label for="writers" class="form-label">Scrittore/i (*)</label>
                  <input
                    name="writers"
                    type="text"
                    class="form-control @error('writers') is-invalid @enderror"
                    id="writers"
                    value="{{ old('writers') }}">
                    @error('writers')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>

                <!-- Pulsante per inviare il form e aggiungere il fumetto -->
                <button type="submit" class="btn btn-success">Aggiungi il nuovo Fumetto</button>
                <!-- Pulsante per resettare il form -->
                <button type="reset" class="btn btn-warning">Reset</button>
              </form>
        </div>
    </div>
</div>

@endsection
