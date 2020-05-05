<?php

/**
 * Created by PhpStorm
 * User: 陈志洪
 * Date: 2020/5/5
 * Time: 10:24 上午
 */

namespace app\api\validate;

class AdminLoginValidate extends BaseValidate
{
    protected $rule = [
        'account|账号' => 'require',
        'password|密码' => 'require',
    ];
}
