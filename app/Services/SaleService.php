<?php

namespace App\Services;

use App\Models\Sale;
use App\Models\User;

use Illuminate\Http\Response;
use Illuminate\Http\Request;

use Exception;

class SaleService
{

    public function createSale(Request $request)
    {
        try {
            $sale = new Sale();

            $commission = 8.5 / 100;
            $valueCommission = $commission * $request->sale_value;
            

            $sale->user_id = $request->user_id;
            $sale->commission = $valueCommission;
            $sale->sale_value = $request->sale_value;
            $sale->sale_date = $request->sale_date;

            $sale->save();

            return response()->json($sale, Response::HTTP_OK);
        } catch (Exception $ex) {
            return response()->json($ex, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function listSales(Request $request)
    {
        try {

            $idSeller = $request->id;

            $sales = Sale::with('user')->where('user_id', $idSeller)->get();
            
            return response()->json($sales, Response::HTTP_OK);

        } catch (Exception $ex) {
            return response()->json($ex, Response::HTTP_INTERNAL_SERVER_ERROR);
        }

    }

}