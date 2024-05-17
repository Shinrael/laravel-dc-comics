@extends('layout.main')

@section('content')

<h1>Elenco Fumetti</h1>

@if (session('deleted'))
    <div class="alert alert-danger" role="alert">
        {{ session('deleted') }}
    </div>
@endif



<table class="table">
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
        @forelse ($comics as $comic)
        <tr>
            <td>{{ $comic->id }}</td>
            <td>{{ $comic->title }}</td>
            <td>{{ $comic->series }}</td>
            <td>{{ $comic->sale_date }}</td>
            <td>
                <a class="btn btn-success" href="{{ route('comics.show', $comic) }}"><i class="fa-regular fa-eye"></i></a>
                <a class="btn btn-warning" href="{{ route('comics.edit', $comic) }}"><i class="fa-solid fa-pencil"></i></a>
                <form action="{{ route('comics.destroy', $comic) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Sei sicuro di voler cancellare {{ $comic->title }} dalla collezione?')" >
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit" ><i class="fa-solid fa-trash-can"></i></button>
                </form>
            </td>
        </tr>
        @empty
            <h2>Nessun Prodotto da Mostrare</h2>
        @endforelse
    </tbody>
  </table>

@endsection
