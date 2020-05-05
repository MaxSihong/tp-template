<?php

/**
 * Created by PhpStorm
 * User: 陈志洪
 * Date: 2020/5/5
 * Time: 9:22 上午
 */

namespace app\api\service;

use app\api\model\Admin as AdminModel;
use app\facade\JwtToken;
use app\lib\enum\AdminEnum;
use app\lib\enum\AuthEnum;
use app\lib\exception\ParameterException;
use think\facade\Request;

class LoginService
{
    /**
     * 后台登录业务
     * @return \app\lib\JwtToken
     * @throws ParameterException
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function adminLogin()
    {
        $res = Request::post();

        // 验证是否符合登录条件
        $user_info = $this->checkAdmin($res);

        // 更新登录时间和IP
        $update_data = [
            'login_ip' => Request::ip(),
            'login_time' => time()
        ];
        AdminModel::updateDataByID($user_info['id'], $update_data);

        // 获取jwt令牌
        $data = [
            'uid' => $user_info['id'],
            'scope' => AuthEnum::CMS_ADMIN_SCOPE,
        ];
        return JwtToken::getToken($data);
    }

    /**
     * 验证是否符合登录条件
     * @param $data array
     * @return array|\PDOStatement|string|\think\Model|null
     * @throws ParameterException
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    private function checkAdmin($data)
    {
        $result = AdminModel::field('id,account,password,status')
            ->where('account', '=', $data['account'])
            ->find();
        if (!$result) {
            throw new ParameterException(20002);
        }

        if ($result['status'] == AdminEnum::PROHIBITION_USE) {
            throw new ParameterException(20003);
        }

        if (!password_verify($data['password'], $result['password'])) {
            throw new ParameterException(20004);
        }

        return $result;
    }
}
