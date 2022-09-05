<?php

namespace Tests\Interfaces;


/**
 * Interface TestPaginateInterface
 * @package Tests\Interfaces
 */
interface TestPaginateInterface
{
    const PAGINATE_JSON_STRUCTURE = [
        'links' => [
            'first',
            'last',
            'prev',
            'next',
        ],
        'meta' => [
            'current_page',
            'from',
            'last_page',
            'links' => [
                '*' => [
                    'url',
                    'label',
                    'active',
                ]
            ]
        ]
    ];
}
