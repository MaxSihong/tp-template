<?php

namespace app\http\middleware;

class Auth
{
    public function handle($request, \Closure $next)
    {
        $request->jwtData = (new \app\lib\auth\Auth())->check($request); // 检测是否需要校验权限

        return $next($request);
    }
}
