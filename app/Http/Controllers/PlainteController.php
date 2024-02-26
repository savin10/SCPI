<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Plainte;
use App\Models\User;



class PlainteController extends Controller
{
    //
    public function index()
    {
        //
    }

    public function plainte()
    {
        return view('/dashbordagent.plainte');
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
            'moto_model' => ['required'],
            'color' => ['required', 'string', 'max:255'],
            'num_plaque' => ['required', 'string'],
            'description' => ['required', 'string', 'max:255'],
        ]);
      
        $plainte = Plainte::create([
            'nomdeposeur' => strtoupper($request->nomdeposeur),
            'moto_model' => $request->moto_model,
            'color' => $request->color,
            'num_plaque' => $request->num_plaque,
            'description' =>$request->description
        ]);
       $plainte->save();
       


    return redirect()->route('plainte')->with('success','Plainte enrégistrer avec success');
    

    }
    public function user()
    {
        $all_user = User::where ('role', '=', '2')->get();
        return view('dashbordagent.plainte',compact('all_user'));
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    /*public function destroy()
    {
       
    }*/
}
