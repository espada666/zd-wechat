<?php
/**
 * 小程序二维码部分
 * 
 * @author espada 369850596@qq.com
 * @license MIT
 */
namespace Zd\wechat\core\applet;

use Zd\wechat\core\Applet;

use Zd\wechat\core\Config;

use Zd\wechat\request\Curl;

class Code extends Applet
{

    /**
     * 生成次数不限的二维码
     *
     * @param string $accessToken 微信获取的access_token
     * @param string $page 小程序对应页面
     * @param string $scene 场景参数
     * @param integer $width 宽度
     * @return string
     */
    public function getUnlimited($page, $scene = '', $width = 200)
    {
        if (!$this->accessToken) {
            throw new \Exception('accessToken无效', 0);
        }

        $data = json_encode([
            'scene' => $scene,
            'page' => $page,
            'width' => $width
        ]);
        $result = Curl::postJson(Config::WXACODEUNLIMIT_URL . '?access_token=' . $this->accessToken, $data);
        $resp = json_decode($result);
        if (isset($resp->errcode)) {
            throw new \Exception('生成错误' . $resp->errmsg, $resp->errcode);
        }

        return $result;

    }

    /**
     * 获取永久有效，有数量限制的小程序二维码
     *
     * @param string $path
     * @param string $width
     * @return string
     */
    public function createQRCode($path, $width)
    {
        $data = json_encode([
            'path' => $path,
            'width' => $width
        ]);

        $result = Curl::postJson(Config::WXQRCODE_URL . '?access_token=' . $this->accessToken, $data);
        $resp = json_decode($result);
        if (isset($resp->errcode)) {
            throw new \Exception('生成错误' . $resp->errmsg, $resp->errcode);
        }

        return $result;
    }
    
    
}