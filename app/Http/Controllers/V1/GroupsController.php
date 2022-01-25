<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Services\UmDoisTresMilhasService;
use Illuminate\Http\Client\RequestException;
use Illuminate\Http\JsonResponse;

class GroupsController extends Controller
{
    /**
     * @var UmDoisTresMilhasService
     */
    private $service;

    /**
     * @return void
     */
    public function __construct(UmDoisTresMilhasService $service)
    {
        $this->service = $service;
    }

    /**
     * @OA\Get(
     *      path="/v1/groups",
     *      tags={"groups"},
     *      operationId="index",
     *      summary="",
     *      description="",
     *      security={
     *          {"bearerAuth": {}}
     *      },
     *      @OA\Response(
     *          response=200,
     *          description="OK",@OA\JsonContent(
     *              type="array",
     *              @OA\Items(
     *                  @OA\Property(
     *                      property="totalFlights",
     *                      type="int",
     *                      example="25"
     *                  ),
     *                  @OA\Property(
     *                      property="totalGroups",
     *                      type="int",
     *                      example="5"
     *                  ),
     *                  @OA\Property(
     *                      property="cheapestPrice",
     *                      type="float",
     *                      example="987.87"
     *                  ),
     *                  @OA\Property(
     *                      property="cheapestGroup",
     *                      type="string",
     *                      example="asdf764asd89a7982ihgikhjagt"
     *                  ),
     *                  @OA\Property(
     *                    property="flights",
     *                     ref="#/components/schemas/flights"
     *                  ),
     *                  @OA\Property(
     *                      property="groups",
     *                      ref="#/components/schemas/groups"
     *                  ),
     *              ),
     *          ),
     *      ),
     * )
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        try {
            return response()->json($this->service->all());
        } catch (RequestException $e) {
            return response()->json($e->getMessage(), $e->getCode());
        }
    }
}
