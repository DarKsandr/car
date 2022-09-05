<?php

namespace App\Http\Resources;


use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RentCarResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'message' => sprintf('Пользователь %s арендовал автомобиль %s с номером %s',
                $this->users->first()->name,
                $this->name,
                $this->number,
            ),
        ];
    }
}
