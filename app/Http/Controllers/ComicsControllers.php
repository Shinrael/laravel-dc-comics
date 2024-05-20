<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comic;
use App\Functions\Helper;

class ComicsControllers extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Recupera tutti i fumetti dal database
        $comics = Comic::all();

        // Ritorna la vista 'comics.index' con i dati dei fumetti
        return view('comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Ritorna la vista per creare un nuovo fumetto
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Recupera tutti i dati dal form di richiesta
        $form_data = $request->all();

        // Trasforma le stringhe di artisti e scrittori in array
        $array_artists = explode(',', $form_data['artists']);
        $array_writers = explode(',', $form_data['writers']);

        // Converte gli array in JSON
        $form_data['artists'] = json_encode($array_artists);
        $form_data['writers'] = json_encode($array_writers);

        // Genera lo slug per il titolo del fumetto
        $form_data['slug'] = Helper::generateSlug($form_data['title'], new Comic());

        // Crea una nuova istanza di Comic e riempie con i dati del form
        $new_comic = new Comic();
        $new_comic->fill($form_data);

        // Salva il nuovo fumetto nel database
        $new_comic->save();

        // Reindirizza alla vista del fumetto appena creato
        return redirect()->route('comics.show', $new_comic);
    }

    /**
     * Display the specified resource.
     */
    public function show(Comic $comic)
    {
        // Ritorna la vista del singolo fumetto con i dati specifici
        return view('comics.show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comic $comic)
    {
        // Ritorna la vista per modificare il fumetto esistente
        return view('comics.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comic $comic)
    {
        // Recupera tutti i dati dal form di richiesta
        $form_data = $request->all();

        // Trasforma le stringhe di artisti e scrittori in array
        $array_artists = explode(',', $form_data['artists']);
        $array_writers = explode(',', $form_data['writers']);

        // Converte gli array in JSON
        $form_data['artists'] = json_encode($array_artists);
        $form_data['writers'] = json_encode($array_writers);

        // Verifica se il titolo è cambiato e genera un nuovo slug se necessario
        if ($form_data['title'] === $comic->title) {
            $form_data['slug'] = $comic->slug;
        } else {
            $form_data['slug'] = Helper::generateSlug($form_data['title'], new Comic);
        }

        // Aggiorna i dati del fumetto esistente nel database
        $comic->update($form_data);

        // Reindirizza alla vista del fumetto aggiornato
        return redirect()->route('comics.show', $comic);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comic $comic)
    {
        // Elimina il fumetto dal database
        $comic->delete();

        // Reindirizza alla lista dei fumetti con un messaggio di successo
        return redirect()->route('comics.index')->with('deleted', 'Il fumetto ' .$comic->title . ' è stato eliminato correttamente.');
    }
}
