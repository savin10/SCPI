<?php

namespace App\Http\Controllers\Agent;


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
            'email' => ['required', 'string', 'email', 'max:255',],
            'role' => ['sometimes', 'integer'],
            'password' => ['required', 'string', 'max:255'],
        ]);
        if (DB::table('users')->where('email', $request->email)->exists()) {
            return redirect()->back()->withErrors(['email' => 'Cet email a deja été utilisé.']);
        }
        $pass = $request->password;
        $user = User::create([
            'username' => strtoupper($request->username),
            'phone' => $request->phone,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request['password']),
            'registered_by' => $registered_user_id,
        ]);
        Mail::to($user->email)->send(new EnvoyerMail($user, $pass));
        //event(new save($personne));
        $user->save();
        //Auth::login($personne);


        return redirect()->route('enregistreragent')->with('success', 'Agent enrégistrer avec success');
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
        
    // Ajoutez d'autres champs à mettre à jour selon vos besoins

        $user->save();

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
