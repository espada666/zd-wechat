<?php
/**
 * 小程序的库
 * 
 * @author espada 369850596@qq.com
 * @license MIT
 */
namespace Zd\wechat\core;

use Zd\wechat\core\AbstractWechat;

use Zd\wechat\core\Config;

use Zd\wechat\request\Curl;

class Applet extends AbstractWechat
{

    public $config = [];

    /**
     * 构造函数
     *
     * @param array $config
     */
    public function __construct($config)
    {
        $this->config = $config;
    }

    /**
     * 获取access_token
     *
     * @return string
     */
    public function getAccessToken()
    {
        $result = Curl::get(Config::CREDENTIAL_ACCESS_TOKEN_URL . '&appid=' . $this->config['app_id'] . '&secret=' . $this->config['app_secret']);
        if (isset($result->access_token)) {
            return $result->access_token;
        }

        return false;
    }

    /**
     * 生成次数不限的二维码
     *
     * @param string $path
     * @param string $urlParams
     * @param integer $width
     * @return void
     */
    public function getWxacodeUnlimit($path, $urlParams = '', $width = 200)
    {
        
    }

    /**
     * 获取session_key
     *
     * @param string $code
     * @return object
     */
    public function getSessionKey($code)
    {
        $result = Curl::get(Config::SESSION_KEY_URL . '?appid=' . $this->config['app_id'] . '&secret=' . $this->config['app_secrect'] . '&js_code=' . $code);
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
     * 使用code获取session信息
     *
     * @param string $code
     * @return array
     */
    public function codeToSession($code)
    {
        $result = Curl::get(Config::CODE_TO_SESSION_URL . '?appid=' . $this->config['app_id'] . 
            '&secret=' . $this->config['app_secret'] . '&js_code=' . $code . '&grant_type=authorization_code');
        $result = json_decode($result, true);
        return $result;
    }
    
}