<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Artisan;

class EmailController extends Controller
{

    public function SendEmail(){

        Artisan::call('app:send-report');

        return 'E-mail enviado com sucesso!';
    }
}
