<?php
/**
 * Created by PhpStorm
 * User: 陈志洪
 * Date: 2020/3/24
 * Time: 11:35
 */

namespace app\lib;

use app\lib\exception\UnAuthorizationException;
use Firebase\JWT\JWT;
use think\facade\Request;

/**
 * JWT
 * Class JwtToken
 * @package app\lib
 */
class JwtToken
{
    /**
     * @var string 签发者
     */
    private $author;

    /**
     * @var string key
     */
    private $key;

    public function __construct()
    {
        $this->author = config('jwt.author');
        $this->key = config('jwt.key');
    }

    /**
     * 生成JwtToken
     * iss (issuer)：签发人
     * exp (expiration time)：过期时间
     * iat (Issued At)：签发时间
     * @param $data array 需要写入jwt的数据
     * @return string
     */
    public function getToken($data)
    {
        $data = array(
            'iss' => $this->author,
            'iat' => time(),
            'exp' => time() + 60 * 60 * 2, // 延迟两小时过期
            'id' => $data['uid'], // 用户ID
            'scope' => $data['scope'], // 权限，查看 app\lib\enum\AuthEnum内的常量
        );

        return JWT::encode($data, $this->key);
    }

    /**
     * 校验JwtToken
     * @return array
     * @throws UnAuthorizationException
     */
    public function checkToken()
    {
        $bearerToken = Request::header('authorization');

        if (empty($bearerToken)) {
            throw new UnAuthorizationException(10003);
        }

        if (!explode($bearerToken, 'Bearer')) {
            throw new UnAuthorizationException(10003);
        }

        $token = trim(substr($bearerToken, strlen('Bearer')));

        try {
            $data = json_decode(json_encode(JWT::decode($token, $this->key, array('HS256'))), true);
        } catch (\Exception $e) {
            throw new UnAuthorizationException(10003);
        }

        if (!in_array($this->author, $data)) {
            throw new UnAuthorizationException(10003);
        }

        return $data;
    }
}