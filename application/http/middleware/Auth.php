<?php

namespace app\http\middleware;

class Auth
{
    /**
     * 权限中间件
     * @param $request
     * @param \Closure $next
     * @return mixed
     * @throws \ReflectionException
     * @throws \app\lib\exception\ForbiddenException
     */
    public function handle($request, \Closure $next)
    {
        $request->jwtData = (new \app\lib\auth\Auth())->check($request); // 检测是否需要校验权限

        return $next($request);
    }
}
