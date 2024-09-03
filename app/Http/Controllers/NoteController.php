<?php

namespace App\Http\Controllers;

use App\Models\Note; // Importe le modèle Note
use Illuminate\Http\Request;

class NoteController extends Controller
{
    // Obtenir toutes les notes
    public function index()
    {
        return Note::all(); // Retourne toutes les notes
    }

    // Créer une nouvelle note
    public function store(Request $request)
    {
        // Valider les données si nécessaire
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // Créer une nouvelle note en utilisant la méthode create
        $note = Note::create($validatedData);

        // Retourner une réponse (exemple)
        return response()->json($note, 201);
    }

    // Obtenir une note spécifique
    public function show($id)
    {
        return Note::findOrFail($id); // Trouve la note par son ID ou renvoie une erreur 404
    }

    // Mettre à jour une note
    public function update(Request $request, $id)
    {
        $note = Note::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $note->update($request->all()); // Met à jour la note avec les nouvelles données

        return $note; // Retourne la note mise à jour
    }

    // Supprimer une note
    public function destroy($id)
    {
        $note = Note::findOrFail($id);
        $note->delete(); // Supprime la note

        return response()->noContent(); // Retourne une réponse vide avec le statut 204
    }
}
