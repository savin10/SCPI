<?php

namespace App\Mail;

use App\Models\LossReport;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LossReportNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $lossReport;

    /**
     * Create a new message instance.
     *
     * @param LossReport $lossReport
     * @return void
     */
    public function __construct(LossReport $lossReport)
    {
        $this->lossReport = $lossReport;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Votre déclaration de perte et code de suivi')
                    ->view('email.loss_report')
                    ->with([
                        'name' => $this->lossReport->nom_victime,
                        'trackingCode' => $this->lossReport->code_de_suivi,
                    ]);
    }
}
