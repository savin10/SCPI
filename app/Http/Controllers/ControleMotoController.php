<?php

namespace App\Http\Controllers;
use App\Models\Moto;
use Illuminate\Http\Request;

class ControleMotoController extends Controller
{
    public function rechercheMoto(Request $request)
    {
        $numPlaque = $request->input('idMoto');
        $moto = Moto::where('numplaque', $numPlaque)->first();

        return view('dashbordadmin.controlermoto', compact('moto'));
    }

    public function infomoto(Request $request)
    {
        $numPlaque = $request->input('idMoto');
        $moto = Moto::where('numplaque', $numPlaque)->first();

        return view('dashbordcommissaire.infomoto', compact('moto'));
    }
    public function informationmoto(Request $request)
    {
        $numPlaque = $request->input('idMoto');
        $moto = Moto::where('numplaque', $numPlaque)->first();

        return view('dashbordagent.informationmoto', compact('moto'));
    }

    /*public function controlermoto()
    {
        return view('dashbordadmin.controlermoto');
    }*/

    
}
