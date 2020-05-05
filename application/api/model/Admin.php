<?php

/**
 * Created by PhpStorm
 * User: 陈志洪
 * Date: 2020/5/5
 * Time: 8:54 上午
 */

namespace app\api\model;

use think\facade\Request;
use think\Model;

/**
 * 后台管理员
 * Class Admin
 * @package app\api\model
 */
class Admin extends Model
{
    // 设置主键名
    protected $pk = 'admin_id';

    // 自动时间戳
    protected $autoWriteTimestamp = true;

    // 拼接头像路径
    public function getAvatarAttr($value)
    {
        return Request::domain() . $value;
    }

    public static function updateDataByID($id, $data)
    {
        return self::update($data, ['admin_id' => $id]);
    }
}
