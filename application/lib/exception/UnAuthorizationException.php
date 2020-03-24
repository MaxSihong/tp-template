<?php
/**
 * Created by PhpStorm
 * User: 陈志洪
 * Date: 2020/3/24
 * Time: 11:05
 */

namespace app\lib\exception;


class UnAuthorizationException extends BaseException
{
    public $code;

    public $httpStatusCode = 401;
}