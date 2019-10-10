<?php
/**
 * 小程序用户授权信息部分
 * 
 * @author espada 369850596@qq.com
 * @license MIT
 */
namespace Zd\wechat\core\applet;

use Zd\wechat\core\Applet;

use Zd\wechat\core\Config;

use Zd\wechat\request\Curl;

class Auth extends Applet
{

    /**
     * 获取access_token
     *
     * @return string
     */
    public function getAccessToken()
    {
        $result = Curl::get(Config::CREDENTIAL_ACCESS_TOKEN_URL . '&appid=' . $this->config['app_id'] . '&secret=' . $this->config['app_secret']);
        $result = json_decode($result);
        if (isset($result->access_token)) {
            return $result->access_token;
        }

        return false;
    }

    /**
     * 获取session_key
     *
     * @param string $code
     * @return object
     */
    public function getSessionKey($code)
    {
        $result = Curl::get(Config::SESSION_KEY_URL . '?appid=' . $this->config['app_id'] . '&secret=' . 
        $this->config['app_secret'] . '&js_code=' . $code);
        $result = json_decode($result);
        return $result;
    }

    /**
     * 解出用户对应数据
     *
     * @param string $sessionKey
     * @param string $encryptedData
     * @param string $iv
     * @return array
     */
    public function decryptData($sessionKey, $encryptedData, $iv)
    {
        if (strlen($sessionKey) != 24) {
            throw new \Exception('encodingAesKey无效', 0);
        }

        $aesKey = base64_decode($sessionKey);
        if (strlen($iv) != 24) {
            throw new \Exception('密钥有误', 0);
        }

        $aesIv = base64_decode($iv);
        $aesCipher = base64_decode($encryptedData);
        $result = openssl_decrypt($aesCipher, "AES-128-CBC", $aesKey, 1, $aesIv);
        $dataObj = json_decode($result, true);
        if (!$dataObj) {
            throw new \Exception('解释数据有误，请稍后重试', 0);
        }

        if ($dataObj['watermark']['appid'] != $this->config['app_id']) {
            throw new \Exception('app_id校验失败', 0);
        }

        return $dataObj;

    }

    /**
     * 使用code获取session
     *
     * @param string $code
     * @return void
     */
    public function codeToSession($code)
    {
        if (empty($code)) {
            return false;
        }

        $result = Curl::get(Config::CODE_TO_SESSION_URL . '?appid=' . $this->config['app_id'] . '&secret=' . $this->config['app_secret'] . 
        '&js_code=' . $code . '&grant_type=authorization_code');
        $result = json_encode($result);
        return $result;

    }

    
}