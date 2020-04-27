<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

use think\facade\Route;

/*
 * 有个缺点，目录结构必须有在controller/.../内
 * 如 app/api/controller/v1/... 或 app/api/controller/cms/...
 */
Route::group('', function () {
    Route::group('api', function () {
        Route::group('cms', function () {
        });
        Route::group('v1', function () {
        });
    })->middleware('Auth');
});
