<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LossReport;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\RequestOptions;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

use App\Mail\LossReportNotification;

class LossReportController extends Controller
{
    public function create()
    {
        return view('perte');
    }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'numplaque' => 'required|string',
    //         'telephone' => 'required|string',
    //         'nom_victime' => 'required|string',
    //         'description' => 'nullable|string',
    //     ]);

    //     $lossReport = new LossReport();
    //     $lossReport->numplaque = $request->numplaque;
    //     $lossReport->telephone = $request->telephone;
    //     $lossReport->nom_victime = $request->nom_victime;
    //     $lossReport->description = $request->description;
    //     $lossReport->code_de_suivi = LossReport::generateTrackingCode();
    //     $lossReport->status = 'en_attente';
    //     $lossReport->save();

    //     // Préparer le message pour l'utilisateur
    //     $message = 'Bonjour M./Mme ' . $lossReport->nom_victime . ', votre code pour suivre votre déclaration de perte est : ' . $lossReport->code_de_suivi;

    //     // Envoyer le SMS
    //     $this->sendSMS($lossReport->telephone, $message);

    //     return view('perte')->with('success', 'Déclaration enregistrée avec succès. Votre code de suivi est : ' . $lossReport->code_de_suivi);
    // }



    public function store(Request $request)
    {
        $request->validate([
            'numplaque' => 'required|string',
            'telephone' => 'required|string',
            'nom_victime' => 'required|string',
            'email' => 'required|email',
            'description' => 'nullable|string',
        ]);

        $lossReport = new LossReport();
        $lossReport->numplaque = $request->numplaque;
        $lossReport->telephone = $request->telephone;
        $lossReport->nom_victime = $request->nom_victime;
        $lossReport->description = $request->description;
        $lossReport->code_de_suivi = LossReport::generateTrackingCode();
        $lossReport->status = 'en_attente';
        $lossReport->save();

        // Préparer le message pour l'utilisateur
        $message = 'Bonjour M./Mme ' . $lossReport->nom_victime . ', votre code pour suivre votre déclaration de perte est : ' . $lossReport->code_de_suivi;

        // Envoyer le SMS
        $this->sendSMS($lossReport->telephone, $message);

        // Envoyer l'email avec le code de suivi
        Mail::to($request->email)->send(new LossReportNotification($lossReport));
        $this->makeCall($lossReport->telephone, $message);
        return view('perte')->with('success', 'Déclaration enregistrée avec succès. Votre code de suivi est : ' . $lossReport->code_de_suivi);
    }



    public function sendSMS($numero, $message)
    {
        $client = new Client([
            'base_uri' => 'https://8gyz6e.api.infobip.com/',
            'headers' => [
                'Authorization' => 'App ff4b92cd45527ec042c7ba4050e40554-b311af1f-e20d-44cd-a8f1-b9217603920d',
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ],
        ]);

        try {
            $response = $client->request(
                'POST',
                'sms/2/text/advanced',
                [
                    RequestOptions::JSON => [
                        'messages' => [
                            [
                                'from' => 'Police Republicaine',
                                'destinations' => [
                                    ['to' => '+229' . $numero],
                                ],
                                'text' => $message,
                            ],
                        ],
                    ],
                ]
            );

            // Logs pour confirmer l'envoi
            $responseBody = $response->getBody()->getContents();
            if ($responseBody) {
                Log::info('SMS envoyé avec succès : ' . $responseBody);
            }
        } catch (RequestException $e) {
            Log::error('Erreur lors de l\'envoi du SMS : ' . $e->getMessage());
        }
    }

    /**
     * Envoi d'un appel vocal via l'API Infobip
     */
    public function makeCall($numero, $message)
    {
        $client = new Client([
            'base_uri' => 'https://8gyz6e.api.infobip.com/calls/1/connect',
            'headers' => [
                'Authorization' => 'App ff4b92cd45527ec042c7ba4050e40554-b311af1f-e20d-44cd-a8f1-b9217603920d',
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ],
        ]);

        try {
            $response = $client->request(
                'POST',
                'voice/1/calls',
                [
                    RequestOptions::JSON => [
                        'from' => '+22912345678', 
                        'to' => '+229' . $numero,
                        'text' => $message,
                        'language' => 'fr',
                        'voice' => 'female',
                    ],
                ]
            );

            $responseBody = $response->getBody()->getContents();
            if ($responseBody) {
                Log::info('Appel vocal envoyé avec succès : ' . $responseBody);
            }
        } catch (RequestException $e) {
            Log::error('Erreur lors de l\'envoi de l\'appel vocal : ' . $e->getMessage());
        }
    }


    public function showTrackForm()
    {
        return view('trackform');
    }

    public function track(Request $request)
    {
        $request->validate([
            'code_de_suivi' => 'required|string',
        ]);

        $lossReport = LossReport::where('code_de_suivi', $request->code_de_suivi)->first();

        if (!$lossReport) {
            return back()->withErrors(['code_de_suivi' => 'Déclaration non trouvée']);
        }

        return view('status', compact('lossReport'));
    }
}
