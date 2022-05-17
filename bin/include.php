<?php
declare(strict_types=1);

use Monda\Utils\Util\Config;
use Monda\Utils\Util\Env;

require_once BASE_PATH . '/vendor/autoload.php';

ini_set('display_errors', 'on');
ini_set('display_startup_errors', 'on');
ini_set('memory_limit', '2G');
error_reporting(E_ALL);

//默认是生产环境
$environment = 'prod';
if (file_exists(BASE_PATH . '/.env')) {
    $environment = trim(file_get_contents(BASE_PATH . '/.env'));
}

define('ENV', $environment);
$env = new Env(BASE_PATH . "/env_{$environment}");
Config::load(config_path(), []);
$defaultTimezone = \config('app.default_timezone', 'Asia/Shanghai');
date_default_timezone_set($defaultTimezone);
