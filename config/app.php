<?php
declare(strict_types=1);
/**
 * This file is part of monda-worker.
 * @contact  mondagroup_php@163.com
 */
return [
    'version' => '2.2',
    'app_name' => env_config('app_name', 'zy-web'),
    'debug' => env_config('debug', false),
    'default_timezone' => env_config('timezone', 'Asia/Shanghai'),
];
