<?php
declare(strict_types=1);
/**
 * This file is part of monda-worker.
 * @contact  mondagroup_php@163.com
 */
namespace App\Exception;

use Framework\Core\ExceptionHandler;
use Framework\Http\HttpRequest;
use Framework\Util\Res;
use Throwable;

class Handler extends ExceptionHandler
{
    public array $dontReport = [
    ];

    /**
     * @param HttpRequest $request
     * @param Throwable $e
     * @return mixed
     */
    public function render(HttpRequest $request, Throwable $e): mixed
    {
        return Res::error()->message($e->getMessage());
    }
}
