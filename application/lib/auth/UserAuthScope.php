<?php
/**
 * Created by PhpStorm
 * User: 陈志洪
 * Date: 2020/4/17
 * Time: 16:38
 */

namespace app\lib\auth;


use app\lib\enum\AuthEnum;

/**
 * 用户权限，检测jwt令牌是否属于用户
 * Class UserAuthScope
 * @package app\lib\auth
 */
class UserAuthScope extends AuthScopeAbstract
{
    public function check()
    {
        if ($this->jwtData['scope'] != AuthEnum::USER_SCOPE) {
            return false;
        }

        return true;
    }
}