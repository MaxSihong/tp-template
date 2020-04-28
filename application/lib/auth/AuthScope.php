<?php
/**
 * Created by PhpStorm
 * User: 陈志洪
 * Date: 2020/4/17
 * Time: 16:42
 */

namespace app\lib\auth;

use app\lib\BrowserEnvironment;

class AuthScope
{
    public function checkJwtScope($request, $jwtData, $key)
    {
        $authScope = null;

        switch ($key) {
            case 'user':
                BrowserEnvironment::check($request, 'wechat'); // 判断当前浏览器环境是否在微信
                $authScope = new UserAuthScope($jwtData); // 校验权限
                break;
            case 'cms':
                $authScope = new CmsAuthScope($jwtData);
                break;
        }

        return $authScope->check();
    }
}
