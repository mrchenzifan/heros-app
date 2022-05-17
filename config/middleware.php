<?php
declare(strict_types=1);
/**
 * This file is part of monda-worker.
 * @contact  mondagroup_php@163.com
 */
use App\Middleware\GlobalMiddleware;

return [
    'global' => [
        GlobalMiddleware::class,
    ],
];
