<?php
declare(strict_types=1);
/**
 * This file is part of monda-worker.
 * @contact  mondagroup_php@163.com
 */
return [
    'default' => [
        'host' => 'redis://' . env_config('redis_host') . ':' . env_config('redis_port', 6379),
        'options' => [
            'auth' => env_config('redis_password'),     // 密码，可选参数
            'db' => env_config('redis_db'),      // 数据库
            'max_attempts' => 10, // 消费失败后，重试次数
            'retry_seconds' => 5, // 重试间隔，单位秒
        ],
    ],
];
