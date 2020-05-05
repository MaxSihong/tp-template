<?php

/**
 * Created by PhpStorm
 * User: 陈志洪
 * Date: 2020/5/5
 * Time: 9:59 上午
 */

namespace app\api\service;

use app\api\model\Admin as AdminModel;
use think\facade\Request;

class CmsService
{
    // 后台新增管理员（注册）
    public function adminRegister()
    {
        $data = Request::post();

        $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);

        return AdminModel::create($data, true);
    }
}
