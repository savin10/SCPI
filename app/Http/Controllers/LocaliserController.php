<?php

namespace App\Http\Controllers;

use App\Models\Localiser;
use Illuminate\Http\Request;

class LocaliserController extends Controller
{
    public function localiserMoto(Request $request)
    {
        $numchasis = $request->input('chasis');
        $localiser = Localiser::where('chasis', $numchasis)->first();

        return view('dashbordcommissaire.localiser', compact('localiser'));
    }
}
