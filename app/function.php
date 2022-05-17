<?php
/**
 * This file is part of monda-worker.
 * @contact  mondagroup_php@163.com
 */

use Framework\Application;
use Framework\Core\Log;
use Monda\Utils\File\FileUtil;

if (!function_exists('makePassword')) {
    function makePassword(string $oriPwd): string
    {
        return md5(md5($oriPwd));
    }
}


if (!function_exists('getRemoteIp')) {
    function getRemoteIp(): string
    {
        return Application::$connection->getRemoteIp();
    }
}

/**
 * 下载远程图像
 * @param string $avatar
 * @return string
 */
if (!function_exists('curlAvatar')) {
    function curlAvatar(string $avatar): string
    {
        try {
            $header = [
                'User-Agent: Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:45.0) Gecko/20100101 Firefox/45.0',
                'Accept-Language: zh-CN,zh;q=0.8,en-US;q=0.5,en;q=0.3',
                'Accept-Encoding: gzip, deflate',];
            $url = $avatar;
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($curl, CURLOPT_ENCODING, 'gzip');
            curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
            $data = curl_exec($curl);
            $code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
            curl_close($curl);
            if ((int)$code !== 200) {//把URL格式图片转成base64_encode格式！
                return '';
            }
            $imgBase64Code = 'data:image/jpeg;base64,' . base64_encode($data);
            $imgContent = $imgBase64Code;//图片内容
            if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $imgContent, $result)) {
                $type = $result[2];//得到图片类型png?jpg?gif?
                FileUtil::makeFileDirs(runtime_path() . '/upload/wx/');
                $newFile = runtime_path() . '/upload/wx/' . date('YmdHis') . '.' . $type;
                if (file_put_contents($newFile, base64_decode(str_replace($result[1], '', $imgContent)))) {
                    return $newFile;
                }
            }
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }
        return '';
    }
}


