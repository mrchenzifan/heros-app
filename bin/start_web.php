<?php
declare(strict_types=1);

/**
 * This file is part of monda-worker.
 * @contact  mondagroup_php@163.com
 */
use Framework\Application;

! defined('BASE_PATH') && define('BASE_PATH', dirname(__DIR__));

//opcache加速
\Workerman\Worker::$onMasterReload = function () {
    if (function_exists('opcache_get_status') && function_exists('opcache_invalidate')) {
        if ($status = opcache_get_status()) {
            if (isset($status['scripts']) && $scripts = $status['scripts']) {
                foreach (array_keys($scripts) as $file) {
                    opcache_invalidate($file, true);
                }
            }
        }
    }
};

(function () {
    (new Application())->run();
})();

// Windows does not support custom processes.
if (\DIRECTORY_SEPARATOR === '/') {
    foreach (config('process', []) as $processName => $config) {
        if (! ($config['enable'] ?? false)) {
            continue;
        }
        worker_start($processName, $config);
    }
}
