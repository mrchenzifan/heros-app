<?php
declare(strict_types=1);
/**
 * This file is part of monda-worker.
 * @contact  mondagroup_php@163.com
 */
namespace App\Middleware;

use Framework\Contract\MiddlewareInterface;
use Framework\Http\HttpRequest;

/**
 * 全局的中间件
 */
class GlobalMiddleware implements MiddlewareInterface
{
    public function process(HttpRequest $request, callable $handler): mixed
    {
        return $handler($request);
    }
}
