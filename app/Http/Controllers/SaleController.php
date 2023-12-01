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

    /**
     * @OA\Post(
     *      path="/api/sale/create",
     *      operationId="createSale",
     *      tags={"Sales"},
     *      summary="Cria uma nova venda",
     *      description="Cria uma nova venda com base nos dados fornecidos no corpo da solicitação",
     *      @OA\RequestBody(
     *          required=true,
     *          description="Dados da nova venda",
     *          @OA\JsonContent(
     *              @OA\Property(property="user_id", type="number", example=2),
     *              @OA\Property(property="sale_value", type="number", example=1000.00),
     *              @OA\Property(property="sale_date", type="string", example="2023-12-03")
     *          )
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Venda criada com sucesso",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Venda criada com sucesso")
     *          )
     *      ),
     *      @OA\Response(
     *          response=422,
     *          description="Erro de validação",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Erro de validação")
     *          )
     *      )
     * )
     */

    public function create(Request $request)
    {
        return $this->service->createSale($request);
    }

    /**
     * @OA\Get(
     *      path="/api/sale/list/{id}",
     *      operationId="listSale",
     *      tags={"Sales"},
     *      summary="Lista vendas filtradas por vendedor",
     *      description="Retorna uma lista de vendas filtradas por vendedor com base no ID fornecido",
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *          description="ID do vendedor para filtrar as vendas",
     *          @OA\Schema(type="integer")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Lista de vendas filtradas por vendedor",
     *          @OA\JsonContent(
     *              type="array",
     *              @OA\Items(
     *                  @OA\Property(property="id", type="number", example=6),
     *                  @OA\Property(property="user_id", type="number", example=4),
     *                  @OA\Property(property="commission", type="string", example="255.00"),
     *                  @OA\Property(property="sale_value", type="string", example="3000.00"),
     *                  @OA\Property(property="sale_date", type="string", example="2023-12-03"),
     *                  @OA\Property(property="created_at", type="string", example="2023-11-30T01:44:55.000000Z"),
     *                  @OA\Property(property="updated_at", type="string", example="2023-11-30T01:44:55.000000Z"),
     *                  @OA\Property(
     *                      property="user",
     *                      type="object",
     *                      @OA\Property(property="id", type="number", example=4),
     *                      @OA\Property(property="name", type="string", example="1231a23"),
     *                      @OA\Property(property="email", type="string", example="matheau2s@teste.com"),
     *                      @OA\Property(property="created_at", type="string", example="2023-11-30T01:44:41.000000Z"),
     *                      @OA\Property(property="updated_at", type="string", example="2023-11-30T01:44:41.000000Z"),
     *                  ),
     *              )
     *          )
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Vendedor não encontrado",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Vendedor não encontrado")
     *          )
     *      )
     * )
     */

    public function list(Request $request)
    {
        return $this->service->listSales($request);
    }
}