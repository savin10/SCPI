<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LossReport;

class LossReportController extends Controller
{
    public function create()
{
    return view('perte');
}

public function store(Request $request)
{
    $request->validate([
        'numplaque' => 'required|string',
        'telephone' => 'required|string',
        'nom_victime' => 'required|string',
        'description' => 'nullable|string',
    ]);

    $lossReport = new LossReport();
    $lossReport->numplaque = $request->numplaque;
    $lossReport->telephone = $request->telephone;
    $lossReport->nom_victime = $request->nom_victime;
    $lossReport->description = $request->description;
    $lossReport->code_de_suivi = LossReport::generateTrackingCode();
    $lossReport->status = 'en_attente';
    $lossReport->save();

    // Pass the tracking code directly back to the form view
    return view('perte')->with('success', 'Déclaration enregistrée avec succès. Votre code de suivi est : ' . $lossReport->code_de_suivi);
}


public function showTrackForm()
{
    return view('trackform');
}

public function track(Request $request)
{
    $request->validate([
        'code_de_suivi' => 'required|string',
    ]);

    $lossReport = LossReport::where('code_de_suivi', $request->code_de_suivi)->first();

    if (!$lossReport) {
        return back()->withErrors(['code_de_suivi' => 'Déclaration non trouvée']);
    }

    return view('status', compact('lossReport'));
}


}
