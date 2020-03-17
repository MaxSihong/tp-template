<?php
/**
 * Created by PhpStorm
 * User: 陈志洪
 * Date: 2020/3/15
 * Time: 14:26
 */

namespace app\lib\exception;


use Exception;
use think\exception\Handle;
use think\facade\Log;
use think\facade\Request;

class ExceptionHandler extends Handle
{
    /**
     * @var int 自定义错误码
     */
    private $code;

    /**
     * @var string 错误具体信息
     */
    private $message;

    /**
     * @var int HTTP状态码
     */
    private $httpStatusCode;

    // 还需要返回客户端当前请求的URL路径

    public function render(Exception $e)
    {
        if ($e instanceof BaseException) { // 如果是自定义的异常
            $this->code = $e->code;
            $this->message = $e->getMessage();
            $this->httpStatusCode = $e->httpStatusCode;
        } else {
            if (config('app.app_debug')) {
                return parent::render($e);
            }

            $this->code = 9999;
            $this->message = '服务器内部错误';
            $this->httpStatusCode = 500;
            $this->recordErrorLog($e);
        }

        $result = [
            'code' => $this->code,
            'message' => $this->message,
            'request_url' => Request::url(),
        ];
        return json($result, $this->httpStatusCode);
    }

    private function recordErrorLog(Exception $e)
    {
        Log::write($e->getMessage(), 'error');
        return true;
    }
}