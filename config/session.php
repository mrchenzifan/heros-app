<?php
/**
 * This file is part of monda-worker.
 * @contact  mondagroup_php@163.com
 */
use Framework\Session\FileSessionHandler;
use Framework\Session\RedisSessionHandler;

return [
    'enable' => true,
    'handler' => RedisSessionHandler::class,
    'config' => [
        FileSessionHandler::class => [
            'save_path' => runtime_path() . '/sessions',
        ],
        RedisSessionHandler::class => [
            'host' => env_config('redis_host', '127.0.0.1'),
            'port' => env_config('redis_port', 6379),
            'auth' => env_config('redis_password', ''),
            'timeout' => 10,
            'database' => env_config('redis_db', 0),
            'prefix' => env_config('session_prefix', 'worker_demo_session_'),
        ],
    ],
    'session_name' => 'php_sid',
    'gc_maxlifetime' => 86400 * 7,
];
