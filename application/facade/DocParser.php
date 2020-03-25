<?php
/**
 * Created by PhpStorm
 * User: 陈志洪
 * Date: 2020/3/25
 * Time: 11:00
 */

namespace app\facade;


use think\Facade;

/**
 * 注释解释器
 * @see \app\lib\DocParser
 * @mixin \app\lib\DocParser
 * @method \app\lib\DocParser parse(string $doc) static 解析注释
 */
class DocParser extends Facade
{
    /**
     * 获取当前Facade对应类名（或者已经绑定的容器对象标识）
     * @access protected
     * @return string
     */
    protected static function getFacadeClass()
    {
        return '\app\lib\DocParser';
    }
}