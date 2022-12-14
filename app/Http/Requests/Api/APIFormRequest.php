<?php

namespace App\Http\Requests\Api;


use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Validation\ValidationException;


class APIFormRequest extends FormRequest
{
    /**
     * Формат вывода ошибок валидации для API
     *
     * @param Validator $validator
     * @throws ValidationException
     */
    protected function failedValidation(Validator $validator)
    {
        if (!str_starts_with($this->path(), 'api/')) {
            parent::failedValidation($validator);
        }

        throw new HttpResponseException(
            response()->json(
                [
                    'errors' => [
                        'fields' => $validator->errors(),
                    ],
                ],
                Response::HTTP_UNPROCESSABLE_ENTITY,
                [],
                App::environment(['local']) ? JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES : null,
            )
        );
    }
}
