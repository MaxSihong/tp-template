<?php
/**
 * Created by PhpStorm
 * User: 陈志洪
 * Date: 2020/3/16
 * Time: 16:57
 */

namespace app\lib\exception;


class NotFoundException extends BaseException
{
    /**
     * @var int 自定义的错误码
     */
    public $code;

    /**
     * @var int HTTP状态码
     */
    public $httpStatusCode = 404;
}