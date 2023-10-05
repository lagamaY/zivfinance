<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Personne;
use App\TypePersonne;

class PersonneController extends Controller
{
    public function index()
    {
        $personnes = Personne::all();
        return view('personnes.index', compact('personnes'));
    }

    public function create()
    {
        $typesPersonne = TypePersonne::all();
        
        return view('personnes.create', compact('typesPersonne'));
    }

    public function store(Request $request)
    {
        $personne = new Personne;
        $personne->idtypepersonne = $request->input('type_personne');
        $personne->nom = $request->input('nom');
        $personne->prenom = $request->input('prenom');
        $personne->sexe = $request->input('sexe');
        $personne->datenaissance = $request->input('date_naissance');

        if ($request->hasFile('photo')) {
            $photoName = time() . '.' . $request->file('photo')->getClientOriginalExtension();
            $request->file('photo')->move(public_path('photos'), $photoName);
            $personne->photo = $photoName;
        }
        else{
            $personne->photo = 'etudiant_photo';
        }
        $personne->save();

        return redirect()->route('personnes.index')->with('success', 'Personne ajoutée avec succès.');
    }

    public function destroy($id)
    {
        
        $personne = Personne::findOrFail($id);
        $personne->delete();

        // return redirect()->back();
    }
}
