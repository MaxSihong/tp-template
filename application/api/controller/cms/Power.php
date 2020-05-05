<?php

/**
 * Created by PhpStorm
 * User: 陈志洪
 * Date: 2020/5/5
 * Time: 12:23 下午
 */

namespace app\api\controller\cms;

use app\api\model\Power as PowerModel;
use app\api\validate\PowerValidate;
use app\lib\Tree;
use think\facade\Request;

class Power
{
    /**
     * 菜单列表
     * @return \think\response\Json
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function index()
    {
        $data = PowerModel::field('power_id,name,pid,icon,route,element,status')->select();

        // 递归分类
        $res = Tree::makeTree($data, [
            'primary_key' => 'power_id',
            'parent_key'  => 'pid'
        ]);
        return writeJson(200, $res, 'ok');
    }

    /**
     * 新增菜单
     * @return \think\response\Json
     * @throws \app\lib\exception\ParameterException
     */
    public function create()
    {
        (new PowerValidate())->goCheck();

        PowerModel::create(Request::post(), true);
        return writeJson(201, '', '新增菜单成功');
    }
}
