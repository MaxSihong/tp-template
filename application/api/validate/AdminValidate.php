<?php

/**
 * Created by PhpStorm
 * User: 陈志洪
 * Date: 2020/5/5
 * Time: 9:24 上午
 */

namespace app\api\validate;

class AdminValidate extends BaseValidate
{
    protected $rule = [
        'nickname|昵称' => 'require|unique:admin,nickname|length:3,50',
        'account|账号' => 'require|unique:admin,account|length:3,30',
        'password|密码' => 'require|length:6:30',
        'avatar|头像' => 'require',
        'status|使用状态' => 'require|number|in:0,1', // 0=禁止使用,1=正常使用
    ];
}
