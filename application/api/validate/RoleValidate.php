<?php

/**
 * Created by PhpStorm
 * User: 陈志洪
 * Date: 2020/5/5
 * Time: 3:24 下午
 */

namespace app\api\validate;

class RoleValidate extends BaseValidate
{
    protected $rule = [
        'name|名称' => 'require|unique:role,name|length:2,50',
        'pid|父级ID' => 'require|number',
        'power|权限' => 'require|array',
    ];
}
