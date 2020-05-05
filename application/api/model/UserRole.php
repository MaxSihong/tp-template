<?php

/**
 * Created by PhpStorm
 * User: 陈志洪
 * Date: 2020/5/5
 * Time: 5:04 下午
 */

namespace app\api\model;

use think\model\Pivot;

/**
 * 用户和角色组中间表
 * Class UserRole
 * @package app\api\model
 */
class UserRole extends Pivot
{
    // 设置主键名
    protected $pk = 'user_role_id';
}
