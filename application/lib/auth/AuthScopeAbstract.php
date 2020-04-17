<?php
/**
 * Created by PhpStorm
 * User: 陈志洪
 * Date: 2020/4/17
 * Time: 16:38
 */

namespace app\lib\auth;


use think\Request;

abstract class AuthScopeAbstract
{
    protected $jwtData;

    public function __construct($jwtData)
    {
        $this->jwtData = $jwtData;
    }

    abstract public function check();
}