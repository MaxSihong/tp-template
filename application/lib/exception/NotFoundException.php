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
    public $httpStatusCode = 404;
}