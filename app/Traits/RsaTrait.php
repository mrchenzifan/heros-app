<?php
declare(strict_types=1);
/**
 * This file is part of monda-worker.
 * @contact  mondagroup_php@163.com
 */
namespace App\Traits;

use App\Exception\BizException;
use Monda\Utils\Crypt\RSACrypt;

/**
 * Trait RsaTrait
 * @package app\traits
 * RSA
 */
trait RsaTrait
{
    /**
     * 检查密码
     * @param string $passwd
     * @param string $rePasswd
     * @return string
     */
    private function chkPassword(string $passwd, string $rePasswd): string
    {
        $rsa = new RSACrypt();
        $privateKey = config('rsa.private_key');
        try {
            $password = $rsa->decryptByPrivateKey($passwd, $privateKey);
            $rePassword = $rsa->decryptByPrivateKey($rePasswd, $privateKey);
        } catch (\Exception) {
            throw new BizException('请检查密码和确认密码是否一致!');
        }
        if (empty($password) || empty($rePassword) || $password !== $rePassword) {
            throw new BizException('请检查密码和确认密码是否一致!');
        }
        return $password;
    }

    /**
     * 解密密码
     * @param string $password
     * @return string
     */
    private function decryptPassword(string $password): string
    {
        $privateKey = config('rsa.private_key');
        try {
            $password = (new RSACrypt())->decryptByPrivateKey($password, $privateKey);
        } catch (\Exception $exception) {
            throw new BizException('密码错误,请检查密码是否填写正确!');
        }
        return $password;
    }
}
