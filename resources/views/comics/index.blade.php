@extends('layout.main')

@section('content')

<!-- Titolo della pagina -->
<h1 class="text-white">Elenco Fumetti</h1>

<!-- Messaggio di successo dopo la cancellazione di un fumetto -->
@if (session('deleted'))
    <div class="alert alert-success" role="alert">
        {{ session('deleted') }}
    </div>
@endif

<!-- Tabella per visualizzare l'elenco dei fumetti -->
<table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Titolo</th>
        <th scope="col">Serie</th>
        <th scope="col">Data d'uscita</th>
        <th scope="col">Azioni</th>
      </tr>
    </thead>
    <tbody>
        <!-- Ciclo per iterare sui fumetti -->
        @forelse ($comics as $comic)
        <tr>
            <!-- Colonna ID del fumetto -->
            <td>{{ $comic->id }}</td>
            <!-- Colonna Titolo del fumetto -->
            <td>{{ $comic->title }}</td>
            <!-- Colonna Serie del fumetto -->
            <td>{{ $comic->series }}</td>
            <!-- Colonna Data di uscita del fumetto -->
            <td>{{ $comic->sale_date }}</td>
            <!-- Colonna delle azioni: visualizza, modifica, elimina -->
            <td>
                <!-- Pulsante per visualizzare il fumetto -->
                <a class="btn btn-success" href="{{ route('comics.show', $comic) }}"><i class="fa-regular fa-eye"></i></a>
                <!-- Pulsante per modificare il fumetto -->
                <a class="btn btn-warning" href="{{ route('comics.edit', $comic) }}"><i class="fa-solid fa-pencil"></i></a>
                <!-- Form per eliminare il fumetto -->
                <form action="{{ route('comics.destroy', $comic) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Sei sicuro di voler cancellare {{ $comic->title }} dalla collezione?')" >
                    @csrf
                    @method('DELETE')
                    <!-- Pulsante per confermare l'eliminazione -->
                    <button class="btn btn-danger" type="submit"><i class="fa-solid fa-trash-can"></i></button>
                </form>
            </td>
        </tr>
        <!-- Messaggio in caso non ci siano fumetti da mostrare -->
        @empty
            <h2>Nessun Prodotto da Mostrare</h2>
        @endforelse
    </tbody>
</table>

@endsection


