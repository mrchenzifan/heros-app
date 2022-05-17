<?php
declare(strict_types=1);
/**
 * This file is part of monda-worker.
 * @contact  mondagroup_php@163.com
 */
return [
    //master
    'enable' => true,
    'name' => env_config('app_name', 'zy-api'),
    'pid_file' => runtime_path() . '/worker.pid',
    'reloadable' => true,
    'max_package_size' => 10 * 1024 * 1024,
    'upload_package_size' => 5 * 1024 * 1024,
    'stdout_file' => runtime_path() . '/log/' . date('Y-m-d') . '-stdout.log',
    'log_file' => runtime_path() . '/log/' . date('Y-m-d') . '-worker.log',
    'listen' => env_config('server_listen', 'http://127.0.0.1:8081'),
    'transport' => env_config('server_transport', 'tcp'),
    'context' => [],
    'count' => env_config('server_process_count', cpu_count() / 2),
    'user' => env_config('server_process_user', ''),
    'group' => env_config('server_process_group', ''),
    'max_request' => 10000,
];
