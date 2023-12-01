<?php

namespace App\Http\Controllers;

use App\Services\UserService;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $service;

    public function __construct(UserService $userService)
    {
        $this->service = $userService;
    }

    /**
     * @OA\Post(
     *      path="/api/users/create",
     *      operationId="createUser",
     *      tags={"Users"},
     *      summary="Cria um novo usuário",
     *      description="Cria um novo usuário com o nome e e-mail fornecidos",
     *      @OA\RequestBody(
     *          required=true,
     *          description="Dados do novo usuário",
     *          @OA\JsonContent(
     *              @OA\Property(property="name", type="string", example="Nome do Novo Usuário"),
     *              @OA\Property(property="email", type="string", format="email", example="novo@email.com")
     *          )
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Usuário criado com sucesso",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Usuário criado com sucesso")
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
        return $this->service->createUser($request);
    }

    /**
     * @OA\Get(
     *      path="/api/users/list",
     *      operationId="listUser",
     *      tags={"Users"},
     *      summary="Lista todos os vendedores",
     *      description="Retorna uma lista de todos os vendedores cadastrados",
     *      @OA\Response(
     *          response=200,
     *          description="Lista de vendedores",
     *          @OA\JsonContent(
     *              type="array",
     *              @OA\Items(
     *                  @OA\Property(property="id", type="number", example=1),
     *                  @OA\Property(property="name", type="string", example="example name"),
     *                  @OA\Property(property="email", type="string", example="example@email.com"),
     *                  @OA\Property(property="updated_at", type="string", example="2021-12-11T09:25:53.000000Z"),
     *                  @OA\Property(property="created_at", type="string", example="2021-12-11T09:25:53.000000Z"),
     *              )
     *          )
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Nenhum vendedor encontrado",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Nenhum vendedor encontrado")
     *          )
     *      )
     * )
     */

    public function list()
    {
        return $this->service->listUsers();
    }

    /**
     * @OA\Put(
     *      path="/api/users/update/{id}",
     *      operationId="updateUser",
     *      tags={"Users"},
     *      summary="Atualiza um vendedor",
     *      description="Atualiza informações de um vendedor pelo ID",
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *          description="ID do vendedor a ser atualizado",
     *          @OA\Schema(type="integer")
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          description="Dados a serem atualizados",
     *          @OA\JsonContent(
     *              @OA\Property(property="name", type="string", example="Novo Nome"),
     *              @OA\Property(property="email", type="string", format="email", example="novo@email.com")
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Vendedor atualizado com sucesso",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Vendedor atualizado com sucesso")
     *          )
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Vendedor não encontrado",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Vendedor não encontrado")
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
     *
     */

    public function update(Request $request)
    {
        return $this->service->updateUser($request);
    }

    /**
     * @OA\Delete(
     *      path="/api/users/delete/{id}",
     *      operationId="deleteUser",
     *      tags={"Users"},
     *      summary="Exclui um vendedor",
     *      description="Exclui um vendedor com base no ID fornecido",
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *          description="ID do vendedor a ser excluído",
     *          @OA\Schema(type="integer")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Vendedor excluído com sucesso",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Vendedor excluído com sucesso")
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

    public function delete(Request $request)
    {
        return $this->service->deleteUser($request);
    }
}