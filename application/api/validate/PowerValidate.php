<?php

/**
 * Created by PhpStorm
 * User: 陈志洪
 * Date: 2020/5/5
 * Time: 12:23 下午
 */

namespace app\api\validate;

class PowerValidate extends BaseValidate
{
    protected $rule = [
        'name|菜单名称' => 'require|length:2,30|unique:power,name',
        'pid|上级菜单' => 'require|number',
        'route|路由' => 'require|unique:power,route',
        'element|组件' => 'require',
//        'icon|图标' => 'require',
        'status|菜单类型' => 'require|number|in:0,1,2', // 0=目录,1=菜单,2=功能
    ];
}
