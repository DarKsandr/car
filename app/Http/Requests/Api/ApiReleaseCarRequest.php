<?php

namespace App\Http\Requests\Api;


class ApiReleaseCarRequest extends APIFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'car_id' => 'required|exists:App\Models\Car,id',
        ];
    }
}
