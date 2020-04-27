<?php
/**
 * Created by PhpStorm
 * User: 陈志洪
 * Date: 2020/4/17
 * Time: 16:45
 */

namespace app\lib\auth;

use app\lib\enum\AuthEnum;

/**
 * CMS管理员权限，检测jwt令牌是否属于CMS管理员
 * Class CmsAuthScope
 * @package app\lib\auth
 */
class CmsAuthScope extends AuthScopeAbstract
{
    public function check()
    {
        if ($this->jwtData['scope'] != AuthEnum::CMS_ADMIN_SCOPE) {
            return false;
        }

        return true;
    }
}
