<?php

/**
 * Created by PhpStorm
 * User: 陈志洪
 * Date: 2020/5/5
 * Time: 9:08 上午
 */

namespace app\api\controller\cms;

use app\api\service\CmsService;
use app\api\service\LoginService;
use app\api\validate\AdminLoginValidate;
use app\api\validate\AdminValidate;
use app\lib\exception\ParameterException;

class Admin
{
    /**
     * 后台登录
     * @return \think\response\Json
     * @throws ParameterException
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function login()
    {
        (new AdminLoginValidate())->goCheck();

        // 登录
        $jwt_token = (new LoginService())->adminLogin();

        return writeJson(200, ['token' => $jwt_token], '登录成功');
    }

    /**
     * 新增管理员
     * @return \think\response\Json
     * @throws ParameterException
     */
    public function register()
    {
        (new AdminValidate())->goCheck();

        $result = (new CmsService())->adminRegister();
        if (!$result) {
            throw new ParameterException(20001);
        }

        return writeJson(201, '', '新增管理员成功');
    }
}
