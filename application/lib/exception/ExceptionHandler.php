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
    public function render(Exception $e)
    {
        if ($e instanceof BaseException) { // 如果是自定义的异常
            $code = $e->code;
            // 如果自定义错误异常，则返回自定义的错误异常
            if (!empty($e->getMessage())) {
                $message = $e->getMessage();
            } else {
                $message = config('error_code.' . $e->code);
            }
            $httpStatusCode = $e->httpStatusCode;
        } else {
            if (config('app.app_debug')) {
                return parent::render($e);
            }

            $code = 9999;
            $message = '服务器内部错误';
            $httpStatusCode = 500;
            $this->recordErrorLog($e);
        }

        $result = [
            'error_code' => $code,
            'message' => $message,
            'request_url' => Request::url(),
        ];
        return json($result, $httpStatusCode);
    }

    private function recordErrorLog(Exception $e)
    {
        Log::write($e->getMessage(), 'error');
        return true;
    }
}
