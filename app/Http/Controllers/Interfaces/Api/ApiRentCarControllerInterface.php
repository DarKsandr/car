<?php

namespace App\Http\Controllers\Interfaces\Api;


use App\Http\Requests\Api\ApiReleaseCarRequest;
use App\Http\Requests\Api\ApiRentCarRequest;
use App\Http\Resources\ReleaseCarResource;
use App\Http\Resources\RentCarResource;


interface ApiRentCarControllerInterface
{
    /**
     * @param ApiRentCarRequest $request
     * @return RentCarResource
     *
     * @OA\Get(
     *     path="/api/rent_car",
     *     tags={"rent_car"},
     *     summary="Регистрация аренды автомобиля пользователем, если это разрешено правилами",
     *     @OA\Parameter(
     *         name="car_id",
     *         in="query",
     *         description="Идентификатор автомобиля",
     *         required=true,
     *         example="1",
     *         @OA\Schema(
     *             type="integer",
     *         ),
     *     ),
     *     @OA\Parameter(
     *         name="user_id",
     *         in="query",
     *         description="Идентификатор пользователя",
     *         required=true,
     *         example="1",
     *         @OA\Schema(
     *             type="integer",
     *         ),
     *     ),
     *     @OA\Response(
     *          response="200",
     *          description="OK",
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(
     *                  @OA\Property(
     *                      property="data",
     *                      @OA\Property(
     *                          property="message",
     *                          type="string",
     *                      )
     *                  )
     *              )
     *          )
     *     ),
     *     @OA\Response(
     *          response="422",
     *          description="Unprocessable Entity",
     *     )
     * )
     *
     */
    public function rent_car(ApiRentCarRequest $request): RentCarResource;


    /**
     * @param ApiReleaseCarRequest $request
     * @return ReleaseCarResource
     *
     * @OA\Get(
     *     path="/api/release_car",
     *     tags={"rent_car"},
     *     summary="Прекращение аренды автомобиля",
     *     @OA\Parameter(
     *         name="car_id",
     *         in="query",
     *         description="Идентификатор автомобиля",
     *         required=true,
     *         example="1",
     *         @OA\Schema(
     *             type="integer",
     *         ),
     *     ),
     *     @OA\Response(
     *          response="200",
     *          description="OK",
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(
     *                  @OA\Property(
     *                      property="data",
     *                      @OA\Property(
     *                          property="message",
     *                          type="string",
     *                      )
     *                  )
     *              )
     *          )
     *     ),
     *     @OA\Response(
     *          response="422",
     *          description="Unprocessable Entity",
     *     )
     * )
     *
     */
    public function release_car(ApiReleaseCarRequest $request): ReleaseCarResource;
}
