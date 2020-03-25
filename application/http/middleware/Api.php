<?php

namespace app\http\middleware;

use app\lib\exception\NotAcceptableException;

class Api
{
    public function handle($request, \Closure $next)
    {
        // 检测是否在微信端调用
        if (!preg_match('~micromessenger~i', $request->header('user-agent'))) {
            throw new NotAcceptableException(10006);
        }

        return $next($request);
    }
}
