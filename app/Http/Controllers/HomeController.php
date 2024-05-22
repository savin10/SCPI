<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use App\Models\Plainte;
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
            $usersCount = DB::table('users')->where('role', 1)->count();
            $agentCount = DB::table('users')->where('role', 2)->count();
            $plainteCount = DB::table('plaintes')->count();
            return view('dashbordadmin.accueil',compact('usersCount','agentCount','plainteCount'));
        }else if(auth()->user()->role=="1"){
            $agentCount = DB::table('users')->where('role', 2)->count();
            $plainteCount = DB::table('plaintes')->count();
            return view('dashbordcommissaire.dashbordcommissaire',compact('agentCount','plainteCount'));
        }else if(auth()->user()->role=="2"){
            return view('dashbordagent.informationmoto');
        }
        
    }
    public function accueil()
    {
        
        if(auth()->user()->role == "0") {
            
            $usersCount = DB::table('users')->where('role', 1)->count();
            $agentCount = DB::table('users')->where('role', 2)->count();
            $plainteCount = DB::table('plaintes')->count();
            return view('dashbordadmin.accueil',compact('usersCount','agentCount','plainteCount'));

        } else if(auth()->user()->role == "1") {

            $registered_user_id = Auth::id();
            $all_user = User::where('role', '=', '2')
            ->where('registered_by', '=', $registered_user_id)->count();
            
            $plainteCount = DB::table('plaintes')->count();
            return view('dashbordcommissaire.dashbordcommissaire',compact('all_user','plainteCount'));
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
        $all_plainte = Plainte::all();
       
        return view('/dashbordcommissaire.enregistreragent');
    }
    public function plainte()
    {
        return view('/dashbordagent.plainte');
    }
    public function localiser()
    {
        return view('/dashbordcommissaire.localiser');
    }

    public function listeplainte()
    {
        $all_plainte = Plainte::all();
        return view('dashbordcommissaire.Plaintesenregistrer',compact('all_plainte'));
    }
    public function listplainte()
    {
        $plainte = Plainte::all();
        return view('dashbordagent.listplainte',compact('plainte'));
    }
}
