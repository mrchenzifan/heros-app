<?php
declare(strict_types=1);
/**
 * This file is part of monda-worker.
 * @contact  mondagroup_php@163.com
 */
namespace App\Util;

use Framework\Util\ResultCode;

/**
 * Class ResultCode.
 */
class Code extends ResultCode
{
    public const AUTHENTICATION_ERROR = ['code' => '002', 'message' => '请先登录!'];
}
