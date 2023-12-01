<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use \DateTime;
use App\Models\Sale;
use Illuminate\Support\Facades\Mail;

class SendReport extends Command
{
    
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-report';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sending report with email';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $today = new DateTime();

        $today = $today->format('Y-m-d');

        $sales = Sale::with('user')->where('sale_date', $today)->get();

        $formattedSales = $sales->map(function ($sale) {
            $sale['sale_date'] = (new DateTime($sale['sale_date']))->format('d/m/Y');
            return $sale;
        });
                
        $today = new DateTime();

        $today = $today->format('d/m/Y');

        $to = 'matheus2001513@gmail.com';
        $subject = 'Assunto do E-mail';
        $data = array(
            'messages' => $sales,
            'today' => $today
        );

        Mail::send('emails.email', $data, function ($messages) use ($to, $subject) {
            $messages->to($to)->subject($subject);
        });

    }
}
