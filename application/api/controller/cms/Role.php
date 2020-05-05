<?php

/**
 * Created by PhpStorm
 * User: 陈志洪
 * Date: 2020/5/5
 * Time: 3:23 下午
 */

namespace app\api\controller\cms;

use app\api\model\Role as RoleModel;
use app\api\validate\RoleValidate;
use app\lib\exception\ParameterException;
use think\Db;
use think\Exception;
use think\facade\Request;

class Role
{
    /**
     * 新增角色组
     * @return \think\response\Json
     * @throws ParameterException
     */
    public function create()
    {
        (new RoleValidate())->goCheck();

        $request = Request::post();

        Db::startTrans();
        try {
            $res = RoleModel::create($request, true);
            // 关联新增中间表数据
            $res->power()->saveAll($request['power']);
            Db::commit();
        } catch (Exception $exception) {
            Db::rollback();
            throw new ParameterException(10008, $exception->getMessage());
        }

        return writeJson(201, '', '新增角色成功');
    }
}
