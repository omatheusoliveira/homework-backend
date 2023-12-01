<?php

namespace App\Services;

use App\Models\Sale;

use \DateTime;

use Illuminate\Http\Response;

use Exception;

class ReportService
{
    public function getDailySalesReport()
    {
        try {

            $today = new DateTime();

            $today = $today->format('Y-m-d');

            $sales = Sale::with('user')->where('sale_date', $today)->get();

            $formattedSales = $sales->map(function ($sale) {
                $sale['sale_date'] = (new DateTime($sale['sale_date']))->format('d/m/Y');
                return $sale;
            });
            
            // echo $formattedSales;
            // exit;
            
            return $sales;

        } catch (Exception $ex) {
            return response()->json($ex, Response::HTTP_INTERNAL_SERVER_ERROR);
        }

    }

}