<?php
declare(strict_types=1);
/**
 * This file is part of monda-worker.
 * @contact  mondagroup_php@163.com
 */
return [
    'default' => [
        'driver' => env_config('db_default_driver', 'mysql'),
        'host' => env_config('db_default_host', '127.0.0.1'),
        'port' => env_config('db_default_port', '3306'),
        'database' => env_config('db_default_database', 'test'),
        'username' => env_config('db_default_username', 'root'),
        'password' => env_config('db_default_password', '12345678'),
        'charset' => 'utf8mb4',
        'collation' => 'utf8mb4_unicode_ci',
        'prefix' => '',
    ],
];
