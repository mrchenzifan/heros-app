<?php
declare(strict_types=1);
/**
 * This file is part of monda-worker.
 * @contact  mondagroup_php@163.com
 */
use Framework\Process\Monitor;

return [
    'zy-api-ps' => [
        'enable' => false,
        'handler' => Monitor::class,
        'reloadable' => true,
        'constructor' => [
            'monitor_dir' => [
                base_path() . '/app',
            ],
            'monitor_extensions' => [
                'php'
            ]
        ]
    ],
];
