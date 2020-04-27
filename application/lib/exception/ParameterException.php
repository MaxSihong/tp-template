<?php
/**
 * Created by PhpStorm
 * User: 陈志洪
 * Date: 2020/3/18
 * Time: 15:17
 */

namespace app\lib\exception;

class ParameterException extends BaseException
{
    public $httpStatusCode = 400;
}
