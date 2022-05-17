<?php
declare(strict_types=1);
/**
 * This file is part of monda-worker.
 * @contact  mondagroup_php@163.com
 */

use Framework\Console\Command;

const BASE_PATH = __DIR__;
require_once BASE_PATH."/bin/include.php";

$bootStrapFiles = config('bootstrap', []);
foreach ($bootStrapFiles ?? [] as $className) {
    $className::start(null);
}
$cli = new Command();
$cli->setName('heros-worker cli');
$cli->installInternalCommands();
if (is_dir($commandPath = app_path() . '/Command')) {
    $cli->installCommands($commandPath);
}
try {
    $cli->run();
} catch (Exception $e) {
    echo $e;
}
