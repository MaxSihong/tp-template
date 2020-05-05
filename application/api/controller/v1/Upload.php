<?php

/**
 * Created by PhpStorm
 * User: 陈志洪
 * Date: 2020/5/5
 * Time: 9:42 上午
 */

namespace app\api\controller\v1;

use app\lib\exception\ParameterException;

class Upload
{
    /**
     * 上传图片
     * @return \think\response\Json
     * @throws ParameterException
     */
    public function upload()
    {
        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file('file');

        // 如果没有该目录则创建
        if (!is_dir('upload')) {
            mkdir('upload', 0777);
        }

        // 移动到框架应用根目录/uploads/ 目录下
        $info = $file->validate(['ext'=>'jpg,jpeg,png'])->move('upload');
        if ($info) {
            return writeJson(201, ['url' => '/upload/' . $info->getSaveName()], '上传成功');
        } else {
            // 上传失败获取错误信息
            throw new ParameterException(10007, $file->getError());
        }
    }
}
