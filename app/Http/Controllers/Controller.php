<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

/**
 * @OA\Info(
 *      version="1",
 *      title="123Milhas API",
 *      description="123Milhas API docs",
 * )
 *
 * @OA\Server(
 *      description="123Milhas",
 *      url=SWAGGER_LUME_CONST_HOST,
 * )
 *
 * @OA\SecurityScheme(
 *      securityScheme="bearerAuth",
 *      in="header",
 *      name="bearerAuth",
 *      type="http",
 *      scheme="bearer",
 *      bearerFormat="JWT",
 * )
 *
 * @OA\Schema(
 *     schema="flights",
 *     type="array",
 *     @OA\Items(
 *          @OA\Property(
 *              property="id",
 *              type="int",
 *              example="1",
 *          ),
 *          @OA\Property(
 *             property="cia",
 *             type="string",
 *             example="GOL",
 *          ),
 *          @OA\Property(
 *             property="fare",
 *             type="string",
 *             example="1AF",
 *          ),
 *          @OA\Property(
 *             property="flightNumber",
 *             type="string",
 *             example="G3-1701",
 *          ),
 *          @OA\Property(
 *             property="origin",
 *             type="string",
 *             example="CNF",
 *          ),
 *          @OA\Property(
 *             property="destination",
 *             type="string",
 *             example="BSB",
 *          ),
 *          @OA\Property(
 *             property="departureDate",
 *             type="string",
 *             example="29/01/2021",
 *         ),
 *         @OA\Property(
 *             property="arrivalDate",
 *             type="string",
 *             example="29/01/2021",
 *         ),
 *         @OA\Property(
 *             property="departureTime",
 *             type="string",
 *             example="07:40",
 *         ),
 *         @OA\Property(
 *             property="arrivalTime",
 *             type="string",
 *             example="09:00",
 *         ),
 *         @OA\Property(
 *             property="classService",
 *             type="int",
 *             example=1,
 *         ),
 *         @OA\Property(
 *             property="price",
 *             type="float",
 *             example="987.54",
 *         ),
 *         @OA\Property(
 *             property="tax",
 *             type="float",
 *             example="12.45",
 *         ),
 *         @OA\Property(
 *             property="outbound",
 *             type="int",
 *             example="1",
 *         ),
 *         @OA\Property(
 *             property="inbound",
 *             type="int",
 *             example="0",
 *         ),
 *         @OA\Property(
 *             property="duration",
 *             type="string",
 *             example="05:40",
 *         )
 *     )
 * )
 *
 * @OA\Schema(
 *     schema="groups",
 *     type="array",
 *     @OA\Items(
 *         @OA\Property(
 *             property="uniqueId",
 *             type="string",
 *             example="asdf764asd89a7982ihgikhjagt",
 *         ),
 *         @OA\Property(
 *             property="totalPrice",
 *             type="float",
 *             example="987.78",
 *         ),
 *         @OA\Property(
 *              property="inbound",
 *              type="array",
 *              example="[123456789, 456789123]",
 *              @OA\Items(
 *                  type="int",
 *              ),
 *         ),
 *         @OA\Property(
 *              property="outbound",
 *              type="array",
 *              example="[987321654, 654987321]",
 *              @OA\Items(
 *                  type="int",
 *              ),
 *         ),
 *     ),
 * )
 */
class Controller extends BaseController
{
    //
}
