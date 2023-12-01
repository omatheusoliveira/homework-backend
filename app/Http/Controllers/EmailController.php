<?php

namespace App\Http\Controllers;

use App\Services\ReportService;
use \DateTime;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class EmailController extends Controller
{

    private $service;

    public function __construct(ReportService $reportService)
    {
        $this->service = $reportService;
    }

    public function SendEmail(){

        $salesToday = $this->service->getDailySalesReport();

        $today = new DateTime();

        $today = $today->format('d/m/Y');

        $to = 'matheus2001513@gmail.com';
        $subject = 'Assunto do E-mail';
        $data = array(
            'messages' => $salesToday,
            'today' => $today
        );

        Mail::send('emails.email', $data, function ($messages) use ($to, $subject) {
            $messages->to($to)->subject($subject);
        });

        return 'E-mail enviado com sucesso!';
    }
}
