<?php
/**
 * Created by PhpStorm
 * User: 陈志洪
 * Date: 2020/3/19
 * Time: 14:46
 */

namespace app\api\validate;

use app\lib\exception\ParameterException;
use think\facade\Request;
use think\Validate;

class BaseValidate extends Validate
{
    public function goCheck()
    {
        $result = $this->check(Request::param());

        if (!$result) {
            throw new ParameterException(10001, $this->error);
        }

        return true;
    }

    // 验证是否为正整数
    protected function isPositiveInteger($value, $rule = '', $data = '', $field = '')
    {
        if (is_numeric($value) && is_int($value + 0) && ($value + 0) > 0) {
            return true;
        } else {
            return $field . '必须是正整数';
        }
    }
}
