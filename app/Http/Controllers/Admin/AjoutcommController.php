<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\EnvoyerMail;
use Illuminate\Support\Facades\Auth;

class AjoutcommController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'username' => ['required', 'string', 'max:255'],
            'phone' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'role' => ['sometimes', 'integer'],
            'password' => ['required', 'string', 'max:255'],
        ]);
       
        if(DB::table('users')->where('email',$request->email)->exists())
        {
        
            return redirect()->back()->withErrors(['email'=>'Cet email a deja été utilisé.']);
        }
      
        $pass = $request->password;
        $user = User::create([
            'username' => strtoupper($request->username),
            'phone' => $request->phone,
            'email' => $request->email,
            'role' => $request->role,
            'password' =>Hash::make($request['password'])
        ]);

        Mail::to($user->email)->send(new EnvoyerMail($user,$pass));
     
       $user->save();
      

    return redirect()->route('ajoutercommissaire')->with('success','Commissaire enrégistrer avec success');
    
        // Vérifier si l'email existe déjà
        if (DB::table('users')->where('email', $request->email)->exists()) {
            return redirect()->back()->withErrors(['email' => 'Cet email a déjà été utilisé.'])->with('error', 'Erreur lors de l\'enregistrement.');
        }
    
        try {
            // Créer l'utilisateur
            $user = User::create([
                'username' => strtoupper($request->username),
                'phone' => $request->phone,
                'email' => $request->email,
                'role' => $request->role ?? 0, // Valeur par défaut si `role` est absent
                'password' => Hash::make($request->password),
            ]);
    
            Mail::to($user->email)->send(new EnvoyerMail($user, $request->password));
    
            return redirect()->route('profiles')->with('success', 'Utilisateur enregistré avec succès.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue lors de l\'enregistrement.');
        }
    }
    
    
    public function user()
    {
        $all_user = User::where ('role', '=', '1')->get();
        return view('dashbordadmin.listecommissaire',compact('all_user'));
    }
    public function agent()
    {
        $all_user = User::where ('role', '=', '2')->get();
        return view('dashbordadmin.listecommissaire',compact('all_user'));
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
    public function edit()
    {
        $user = Auth::user();
        return view('dashbordcommissaire.profile', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $user = Auth::user();
        $user->username = $request->input('username');
        $user->phone = $request->input('phone');
        $user->email = $request->input('email');
        $user->role = $request->input('role');
        $user->password = $request->input('password');
        
    // Ajoutez d'autres champs à mettre à jour selon vos besoins

        $user->save();

    return redirect()->route('profile')->with('success', 'Profil mis à jour avec succès !');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::delete('delete from users where id=?',[$id]);
        return redirect()->route('listecommissaire')->with('success-suppression','Commissaire  supprimé');
    }
}
