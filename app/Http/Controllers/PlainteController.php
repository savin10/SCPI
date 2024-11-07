<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Plainte;
use App\Models\User;
use Illuminate\Support\Facades\Auth;



class PlainteController extends Controller
{
    //
    public function index()
    {
        //
    }

    public function plainte()
    {
        return view('dashbordagent.plainte');
    }

    public function plaintes()
    {
        return view('dashbordcommissaire.plainte');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    
        $request->validate([
            'nomdeposeur' => ['required', 'string', 'max:255'],

            'tel' => ['required'],
            'lieu' => ['required', 'string', 'max:255'],
            'objet' => ['required', 'string'],
            'description' => ['required', 'string', 'max:255'],
        ]);
      
        $plainte = Plainte::create([
            'nomdeposeur' => strtoupper($request->nomdeposeur),

            'tel' => $request->tel,
            'lieu' => $request->lieu,
            'objet' => $request->objet,
            'description' =>$request->description
        ]);
       $plainte->save();
       


    return redirect()->route('plainte')->with('success','Plainte enrégistrer avec success');
    

    }
    


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $plainte = Plainte::findOrFail($id);
           
            $users = User::where('role', '=', '2')->get();
            return view('dashbordagent.edit' , compact( 'plainte' , 'users'));
    

        $plainte = Plainte::find($id);


        return view('dashbordagent.edit' , compact( 'plainte'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $plainte = Plainte::findOrFail($id);


    $plainte = Plainte::findOrFail($id);


    // Mettez à jour les propriétés de l'événement en fonction des données du formulaire
    $plainte->nomdeposeur = $request->input('nomdeposeur');
    $plainte->tel = $request->input('tel');
    $plainte->lieu = $request->input('lieu');
    $plainte->objet = $request->input('objet');
    $plainte->description = $request->input('description');
    // Ajoutez d'autres champs si nécessaire...

    $plainte->save();

    // Redirigez l'utilisateur vers une page de confirmation ou une autre page après la mise à jour
    return redirect()->route('listplainte', ['id' => $plainte->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    /*public function destroy()
    {
       
    }*/
}
