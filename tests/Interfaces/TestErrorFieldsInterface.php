<?php

namespace Tests\Interfaces;


interface TestErrorFieldsInterface
{
    const ERROR_FIELDS_JSON_STRUCTURE = [
        'errors' => [
            'fields' => [
                '*' => []
            ],
        ]
    ];
}
