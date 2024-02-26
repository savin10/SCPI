<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use user;
use App\Mail\Contact;


class MailController extends Controller
{
    public function index(Request $request)
    {
        $name= $request->input('username');
        $password= $request->input('password');
        $mailData=[
            'title'=>'Cher utilisateur',
            'body'=>'Vous avez été inscrire sur la plateforme de la police républicaine , utilisé le username et le mot de passe suivant pour vous connecter',

        ];
        Mail::to($request->input('email'))->send(new Contact($request->input('email'),$password,$mailData));
       
    }
}
