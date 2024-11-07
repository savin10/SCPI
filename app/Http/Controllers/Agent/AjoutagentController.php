<?php

namespace App\Http\Controllers\Agent;
use Illuminate\Support\Str;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\EnvoyerMail;
use Illuminate\Support\Facades\Auth;

class AjoutagentController extends Controller
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
    public function store(Request $request)
    {
        $registered_user_id = Auth::id();
    
        $request->validate([
            'username' => ['required', 'string', 'max:255'],
            'phone' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'role' => ['sometimes', 'integer'],
        ]);
    
        if (DB::table('users')->where('email', $request->email)->exists()) {
            return redirect()->back()->withErrors(['email' => 'Cet email a déjà été utilisé.']);
        }
    
        $generatedPassword = Str::random(5) . rand(100, 999);
    
        try {
            $user = User::create([
                'username' => strtoupper($request->username),
                'phone' => $request->phone,
                'email' => $request->email,
                'role' => $request->role ?? 0,
                'password' => Hash::make($generatedPassword),
                'registered_by' => $registered_user_id,
            ]);
    
            Mail::to($user->email)->send(new EnvoyerMail($user, $generatedPassword));
    
            return redirect()->route('enregistreragent')->with('success', 'Agent enregistré avec succès');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue lors de l\'enregistrement.');
        }
    }

    
    public function user()

    {
        $registered_user_id = Auth::id();
        $all_user = User::where('role', '=', '2')
            ->where('registered_by', '=', $registered_user_id)->get();
        return view('dashbordcommissaire.listagent', compact('all_user'));
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
        return view('dashbordagent.profile', compact('user'));
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

        $user->save();
    // Ajoutez d'autres champs à mettre à jour selon vos besoins

        

    return redirect()->route('profile')->with('success', 'Profil mis à jour avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::delete('delete from users where id=?', [$id]);
        return redirect()->route('enregistagent')->with('success-suppression', 'Commissaire  supprimé');
    }
}
