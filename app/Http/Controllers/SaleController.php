<?php

namespace App\Http\Controllers;

use App\Services\SaleService;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    private $service;

    public function __construct(SaleService $saleService)
    {
        $this->service = $saleService;
    }

    public function create(Request $request)
    {
        return $this->service->createSale($request);
    }

    public function list(Request $request)
    {
        return $this->service->listSales($request);
    }
}