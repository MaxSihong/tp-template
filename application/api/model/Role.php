<?php

/**
 * Created by PhpStorm
 * User: 陈志洪
 * Date: 2020/5/5
 * Time: 3:21 下午
 */

namespace app\api\model;

use think\Model;

class Role extends Model
{
    // 设置主键名
    protected $pk = 'role_id';

    // 自动时间戳
    protected $autoWriteTimestamp = true;

    // 多对多关联权限
    public function power()
    {
        return $this->belongsToMany('Power', 'RolePower', 'power_id', 'role_id');
    }
}
