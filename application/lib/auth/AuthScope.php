<?php
/**
 * Created by PhpStorm
 * User: 陈志洪
 * Date: 2020/4/17
 * Time: 16:42
 */

namespace app\lib\auth;

class AuthScope
{
    public function checkJwtScope($jwtData, $key)
    {
        $authScope = null;

        switch ($key) {
            case 'user':
                $authScope = new UserAuthScope($jwtData);
                break;
            case 'cms':
                $authScope = new CmsAuthScope($jwtData);
                break;
        }

        return $authScope->check();
    }
}
