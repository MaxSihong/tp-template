<?php
/**
 * Created by PhpStorm
 * User: 陈志洪
 * Date: 2020/3/18
 * Time: 15:17
 */

namespace app\lib\exception;


class BadRequestException extends BaseException
{
    public $code;

    public $httpStatusCode = 400;
}