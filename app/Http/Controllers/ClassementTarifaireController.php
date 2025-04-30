<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassementTarifaire;

class ClassementTarifaireController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        $circulaires = ClassementTarifaire::where('file_nom', 'like', "%$query%")
            ->orWhere('code_tarifaire', 'like', "%$query%")
            ->orWhere('conclusion', 'like', "%$query%")
            ->get();

        return view('classement_tarifaire.search', compact('circulaires', 'query'));
    }


    public function index()
    {
        $circulaires = ClassementTarifaire::all();
        return view('classement_tarifaire.index', compact('circulaires'));
    }

    public function edit($id)
    {
        $circulaire = ClassementTarifaire::findOrFail($id);
        return view('classement_tarifaire.edit', compact('circulaire'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'file_nom' => 'required|string|max:255',
            'code_tarifaire' => 'required|string|max:255',
            'conclusion' => 'nullable|string',
        ]);


        $circulaire = ClassementTarifaire::findOrFail($id);


        $circulaire->update([
            'file_nom' => $request->file_nom,
            'code_tarifaire' => $request->code_tarifaire,
            'conclusion' => $request->conclusion,
        ]);

        return redirect()->route('classement_tarifaire.search')->with('success', 'La circulaire a été mise à jour avec succès.');
    }


    public function destroy($id)
    {

        $circulaire = ClassementTarifaire::findOrFail($id);
        $circulaire->delete();
        return redirect()->route('classement_tarifaire.index')->with('success', 'Circulaire supprimée.');
    }

    public function copy($id)
    {

        $original = ClassementTarifaire::findOrFail($id);
        $copie = $original->replicate();
        $copie->file_nom = $original->file_nom . '_copie';
        $copie->save();
        return redirect()->route('classement_tarifaire.search')->with('success', 'Copie de la circulaire créée avec succès.');
    }

    public function storeCopy(Request $request, $id)
    {

        $request->validate([
            'file_nom' => 'required|string|max:255',
            'code_tarifaire' => 'required|string|max:20',
            'conclusion' => 'nullable|string',
            'date_decision' => 'nullable|date',
            'date_diffusion' => 'nullable|date',
            'date_validite' => 'nullable|date',
            'decision' => 'nullable|string',
            'designation' => 'nullable|string',
            'statut' => 'required|string|max:10',
        ]);


        $original = ClassementTarifaire::findOrFail($id);


        $copie = new ClassementTarifaire($request->all());
        $copie->file_nom = $original->file_nom . '_copie';
        $copie->save();


        return redirect()->route('classement_tarifaire.index')->with('success', 'Copie créée.');
    }

}
