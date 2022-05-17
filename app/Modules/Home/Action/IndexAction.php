<?php
declare(strict_types=1);
namespace App\Modules\Home\Action;

use Framework\Annotation\Controller;
use Framework\Annotation\RequestMapping;
use Framework\Http\HttpRequest;
use Illuminate\Support\Str;

#[Controller(name: "首页")]
class IndexAction
{
    #[RequestMapping(path: '/',name: '首页',method: ["GET"])]
    public function index(HttpRequest $request):string
    {
        return "hello world";
    }
}
