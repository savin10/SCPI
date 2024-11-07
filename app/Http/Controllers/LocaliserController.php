<?php

namespace App\Http\Controllers;

use App\Models\Localiser;
use Illuminate\Http\Request;

class LocaliserController extends Controller
{
    /*public function localiserMoto(Request $request)
    {
        $numchasis = $request->input('chasis');
        $localiser = Localiser::where('chasis', $numchasis)->first();

        return view('dashbordcommissaire.localiser', compact('localiser'));
    }*/

    // Méthode pour rechercher et afficher les localisations
    public function localiserMoto(Request $request)
    {
        // Validation du numéro de plaque
        $request->validate([
            'chasis' => 'required|string',
        ]);

        // Récupérer les localisations correspondant au numéro de plaque
        $localisations = Localiser::where('chasis', $request->chasis)->get();

        // Si aucune localisation trouvée
        if ($localisations->isEmpty()) {
            return redirect()->back()->with('error', 'Aucune localisation trouvée pour ce numéro de plaque');
        }

        // Passer les localisations à la vue de la carte
        return view('dashbordcommissaire.localiser', ['localisations' => $localisations]);
    }
}
