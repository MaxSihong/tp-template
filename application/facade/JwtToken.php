<?php
/**
 * Created by PhpStorm
 * User: 陈志洪
 * Date: 2020/3/24
 * Time: 12:11
 */

namespace app\facade;


use think\Facade;

/**
 * JWT
 * @see \app\lib\JwtToken
 * @mixin \app\lib\JwtToken
 * @method \app\lib\JwtToken getToken(array $data) static 生成JwtToken
 * @method \app\lib\JwtToken checkToken() static 校验JwtToken
 */
class JwtToken extends Facade
{
    /**
     * 获取当前Facade对应类名（或者已经绑定的容器对象标识）
     * @access protected
     * @return string
     */
    protected static function getFacadeClass()
    {
        return '\app\lib\JwtToken';
    }
}