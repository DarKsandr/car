<?php

namespace App\Http\Controllers\Api;

use App\Models\Car;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\RentCarResource;
use App\Http\Resources\ReleaseCarResource;
use App\Http\Requests\Api\ApiRentCarRequest;
use App\Http\Requests\Api\ApiReleaseCarRequest;
use Illuminate\Http\Client\HttpClientException;
use App\Http\Controllers\Interfaces\Api\ApiRentCarControllerInterface;

class ApiRentCarController extends Controller implements ApiRentCarControllerInterface
{

    /**
     * Регистрация аренды автомобиля пользователем, если это разрешено правилами
     *
     * @throws HttpClientException
     */
    public function rent_car(ApiRentCarRequest $request): RentCarResource
    {
        $validated = $request->validated();

        $car = Car::find($validated['car_id']);
        $user = User::find($validated['user_id']);

        if ($car->users()->count() || $user->cars()->count())
            throw new HttpClientException('Невозможно арендовать автомобиль');

        $car->users()->attach($user);

        return new RentCarResource($car);
    }

    /**
     * Прекращение аренды автомобиля
     *
     * @throws HttpClientException
     */
    public function release_car(ApiReleaseCarRequest $request): ReleaseCarResource
    {
        $validated = $request->validated();

        $car = Car::find($validated['car_id']);

        if (!$car->users()->count())
            throw new HttpClientException(sprintf('Автомобиль с номером %s не арендуется', $car->number));

        $user = $car->users()->first();
        $car->users()->detach($user);

        return new ReleaseCarResource(['car' => $car, 'user' => $user]);
    }
}
