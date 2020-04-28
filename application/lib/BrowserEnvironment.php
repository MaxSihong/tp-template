<?php

/**
 * Created by PhpStorm
 * User: 陈志洪
 * Date: 2020/4/28
 * Time: 4:31 下午
 */

namespace app\lib;

use app\lib\exception\ForbiddenException;

/**
 * 浏览器环境
 * Class BrowserEnvironment
 * @package app\lib
 */
class BrowserEnvironment
{
    public static function check($request, $key)
    {
        switch ($key) {
            case 'wechat': // 判断当前浏览器环境是否在微信
                if (!preg_match('~micromessenger~i', $request->header('user-agent'))) {
                    throw new ForbiddenException(10006);
                }
                break;
        }

        return true;
    }
}
