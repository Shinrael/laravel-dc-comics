@extends('layout.main')

@section('content')

<div class="container">
    <!-- Titolo del fumetto e pulsante per modificare -->
    <h1>{{ $comic->title }} <a class="btn btn-warning" href="{{ route('comics.edit', $comic) }}"><i class="fa-solid fa-pencil"></i></a> </h1>

    <!-- Descrizione del fumetto -->
    <div class="my-5">
        <p>{{ $comic->description }}</p>
    </div>

    <!-- Prezzo del fumetto -->
    <div class="my-5">
        <p>Prezzo: $ {{ $comic->price }}</p>
    </div>

    <!-- Serie del fumetto -->
    <div class="my-5">
        <p>Serie: {{ $comic->series }}</p>
    </div>

    <!-- Data di uscita del fumetto -->
    <div class="my-5">
        <p>Data di Uscita: {{ $comic->sale_date }}</p>
    </div>

    <!-- Tipo di fumetto -->
    <div class="my-5">
        <p>Tipo di Fumetto: {{ $comic->type }}</p>
    </div>

    <!-- Disegnatori del fumetto, convertiti da JSON ad array e poi a stringa -->
    <div class="my-5">
        <p>Disegnatori: {{ implode(', ', json_decode($comic->artists)) }}.</p>
    </div>

    <!-- Scrittori del fumetto, convertiti da JSON ad array e poi a stringa -->
    <div class="my-5">
        <p>Scrittori: {{ implode(', ', json_decode($comic->writers)) }}.</p>
    </div>

    <!-- Pulsante per tornare alla lista dei fumetti -->
    <div class="my-5">
        <a href=" {{ route('comics.index') }} " class="btn btn-primary" >Torna ai fumetti</a>
    </div>
</div>

@endsection

