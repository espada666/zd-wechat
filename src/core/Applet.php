<?php
/**
 * 小程序的库
 * 
 * @author espada 369850596@qq.com
 * @license MIT
 */
namespace Zd\wechat\core;

use Zd\wechat\core\BaseWechat;

/**
 * class factory
 * @property \Zd\wechat\core\applet\Auth $auth
 * @property \Zd\wechat\core\applet\Code $code
 * @property \Zd\wechat\core\applet\Analysis $analysis
 * 
 */
class Applet extends BaseWechat
{
    protected $accessToken = '';

    /**
     * 设置access_token
     *
     * @param [type] $accessToken
     * @return void
     */
    public function setAccessToken($accessToken)
    {
        $this->accessToken = $accessToken;
    }
}