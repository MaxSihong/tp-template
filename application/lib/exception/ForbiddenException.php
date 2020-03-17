<?php
/**
 * Created by PhpStorm
 * User: 陈志洪
 * Date: 2020/3/17
 * Time: 09:00
 */

namespace app\lib\exception;


class ForbiddenException extends BaseException
{
    public $code;

    public $httpStatusCode = 403;
}