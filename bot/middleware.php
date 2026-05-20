<?php

use Bot\Middlewares\AuthMiddleware;
use Bot\Middlewares\UpdateLoggerMiddleware;

return [
    // Middleware global (se aplica a TODOS los tipos de updates)
    'global' => [
        UpdateLoggerMiddleware::class
    ],

    // Middleware por TIPO de update
    'types' => [
        'message' => [

        ],
        'command' => [

        ],
        'callback_query' => [

        ],
        'inline_query' => [

        ],
    ],

    // Middleware por COMANDO específico (sin /)
    'commands' => [
        'broadcast' => AuthMiddleware::class
    ],
];