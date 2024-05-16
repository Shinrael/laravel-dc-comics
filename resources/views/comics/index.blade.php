@extends('layout.main')

@section('content')

<h1>Elenco Fumetti</h1>
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
                <a class="btn btn-success" href="{{ route('comics.show', $comic->id) }}"><i class="fa-regular fa-eye"></i></a>
                <button class="btn btn-warning" href=""><i class="fa-solid fa-pencil"></i></button>
                <button class="btn btn-danger" href=""><i class="fa-solid fa-trash-can"></i></button>
            </td>
        </tr>
        @empty
            <h2>Nessun Prodotto da Mostrare</h2>
        @endforelse
    </tbody>
  </table>

@endsection
