<?php
/**
 * Created by PhpStorm
 * User: 陈志洪
 * Date: 2020/4/17
 * Time: 13:56
 */

namespace app\lib\enum;

class AuthEnum
{
    // 普通用户
    const USER_SCOPE = 2;

    // 微信管理员
    const WECHAT_ADMIN_SCOPE = 8;

    // CMS管理员
    const CMS_ADMIN_SCOPE = 16;
}
