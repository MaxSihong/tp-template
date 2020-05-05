<?php

/**
 * Created by PhpStorm
 * User: 陈志洪
 * Date: 2020/5/5
 * Time: 12:18 下午
 */

namespace app\api\model;

use think\Model;

/**
 * 菜单权限
 * Class Power
 * @package app\api\model
 */
class Power extends Model
{
    // 设置主键名
    protected $pk = 'power_id';

    // 自动时间戳
    protected $autoWriteTimestamp = true;
}
