<?php
/**
 * Created by PhpStorm
 * User: 陈志洪
 * Date: 2020/4/17
 * Time: 10:11
 */

namespace app\lib\auth;

use app\facade\DocParser;
use app\facade\JwtToken;
use app\lib\exception\ForbiddenException;

class Auth
{
    /**
     * 主方法，拿到当前接口的权限内容，判断当前请求用户是否拥有这个权限。接口无权限标识或超级管理员直接通过
     * @param $request
     * @return \app\lib\JwtToken|bool
     * @throws ForbiddenException
     * @throws \ReflectionException
     */
    public function check($request)
    {
        $annotation = $this->getDoc($request); // 获取注释内容

        // 没有权限注释，或没有 auth，则直接通过
        if (empty($annotation) || !array_key_exists('auth', $annotation)) {
            return true;
        }

        // 验证JWT
        $jwtResult = JwtToken::checkToken();

        // 验证JWT内的权限，是否属于该方法的权限
        $authResult = (new AuthScope())->checkJwtScope($jwtResult, $annotation['auth']);
        if (!$authResult) {
            throw new ForbiddenException(10004);
        }

        return $jwtResult;
    }

    /**
     * 获取注释内容
     * @param $request
     * @return \app\lib\DocParser
     * @throws \ReflectionException
     */
    private function getDoc($request)
    {
        // 控制层下有一级目录
//        $reflection = new \ReflectionClass('app\api\controller\\' . $request->controller());
//        $classDoc = $reflection->getDocComment(); // 类的注释
//
//        $methods = $reflection->getMethod($request->action());
//        $methodsDoc = $methods->getDocComment(); // 方法的注释
//        return DocParser::parse($methodsDoc); // 格式化

        // 控制层下有二级目录，需要解析下。如controller/cms/Admin，获取到的是Cms.Admin
        $controllerPath = explode('.', $request->controller());
        // 反射获取当前请求的控制器类
        $reflection = new \ReflectionClass(
            'app\api\controller\\' .
            strtolower($controllerPath[0]) .
            '\\' . $controllerPath[1]
        );

        // 类的注释
        $classDoc = $reflection->getDocComment();
        $methods = $reflection->getMethod($request->action());
        $methodsDoc = $methods->getDocComment(); // 方法的注释

        // 格式化
        return DocParser::parse($methodsDoc);
    }
}
