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

Route::group('', function () {
    Route::group('api', function () {
        Route::group('cms', function () {
            // 后台登录
            Route::post('login', 'api/cms.Admin/login');
            // 新增管理员
            Route::post('register', 'api/cms.Admin/register');

            // 菜单管理
            Route::group('power', function () {
                // 菜单列表
                Route::get('', 'api/cms.Power/index');
                // 新增菜单
                Route::post('', 'api/cms.Power/create');
            });

            // 角色管理
            Route::group('role', function () {
                // 新增角色
                Route::post('', 'api/cms.Role/create');
            });
        });
        Route::group('v1', function () {
            // 上传
            Route::post('upload', 'api/v1.Upload/upload');
        });
    })->middleware('Auth');
});
