<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(auth()->user()->role=="0")
        {
            return view('dashbordadmin.accueil');
        }else if(auth()->user()->role=="1"){
            return view('dashbordcommissaire.dashbordcommissaire');
        }else if(auth()->user()->role=="2"){
            return view('dashbordagent.informationmoto');
        }
        
    }
    public function accueil()
    {
        
        if(auth()->user()->role == "0") {
            return view('dashbordadmin.accueil');
        } else if(auth()->user()->role == "1") {
            return view('dashbordcommissaire.dashbordcommissaire');
        }else if(auth()->user()->role=="2"){
            return view('dashbordagent.informationmoto');
        }else {
            dd('Aucun cas n\'est rencontré'); // Ajoutez ceci pour vérifier si aucun cas n'est satisfait
        }
    }
    
    public function ajoutercommissaire()
    {
        return view('/dashbordadmin.ajoutercommissaire');
    }
    public function enregistagent()
    {
        return view('/dashbordcommissaire.enregistreragent');
    }
    public function plainte()
    {
        return view('/dashbordagent.plainte');
    }
}
