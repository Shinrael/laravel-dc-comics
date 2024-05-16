@extends('layout.main')

@section('content')

<div class="container">
    <h1>{{ $comic->title }}</h1>

    <div class="my-5">
        <p>{{ $comic->description }}</p>
    </div>
    <div class="my-5">
        <p>Prezzo: $ {{ $comic->price }}</p>
    </div>
    <div class="my-5">
        <p>Serie: {{ $comic->series }}</p>
    </div>
    <div class="my-5">
        <p>Data di Uscita: {{ $comic->sale_date }}</p>
    </div>
    <div class="my-5">
        <p>Tipo di Fumetto: {{ $comic->type }}</p>
    </div>
    <div class="my-5">
        <p>Disegnatori: {{ implode(', ', json_decode($comic->artists)) }}.</p>
    </div>
    <div class="my-5">
        <p>Scrittori: {{ implode(', ', json_decode($comic->writers)) }}.</p>
    </div>
    <div class="my-5">
        <a href=" {{ route('comics.index') }} " class="btn btn-primary" >Torna ai fumetti</a>
    </div>
</div>


@endsection
