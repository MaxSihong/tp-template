<?php
/**
 * Created by PhpStorm
 * User: 陈志洪
 * Date: 2020/4/17
 * Time: 16:44
 */

namespace app\lib\auth;

use app\lib\enum\AuthEnum;

/**
 * 微信管理员权限，检测jwt令牌是否属于微信管理员
 * Class WeChatAuthScope
 * @package app\lib\auth
 */
class WeChatAuthScope extends AuthScopeAbstract
{
    public function check()
    {
        if ($this->jwtData['scope'] != AuthEnum::WECHAT_ADMIN_SCOPE) {
            return false;
        }

        return true;
    }
}
