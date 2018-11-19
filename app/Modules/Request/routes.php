<?php

return [
    [
        'route' => '/lead',
        'target' => [\Modules\Request\Controllers\RequestController::class, 'lead'],
        'name' => 'lead'
    ],
    [
        'route' => '/recall',
        'target' => [\Modules\Request\Controllers\RequestController::class, 'recall'],
        'name' => 'recall'
    ],
];