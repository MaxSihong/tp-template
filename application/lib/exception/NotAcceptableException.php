<?php
/**
 * Created by PhpStorm
 * User: 陈志洪
 * Date: 2020/3/25
 * Time: 15:00
 */

namespace app\lib\exception;


class NotAcceptableException extends BaseException
{
    public $httpStatusCode = 406;
}