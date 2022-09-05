<?php

namespace App\Http\Resources;


use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReleaseCarResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'message' => sprintf('Пользователь %s перестал арендовать автомобиль %s с номером %s',
                $this['user']->name,
                $this['car']->name,
                $this['car']->number,
            ),
        ];
    }
}
