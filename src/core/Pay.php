<?php
/**
 * 支付部分
 * @author espada 369850596@qq.com
 * @license MIT
 */
namespace Zd\wechat\core;

use Zd\wechat\core\BaseWechat;

use Zd\wechat\request\Curl;

/**
 * class factory
 * @property \Zd\wechat\core\pay\Provider $provider
 * @property \Zd\wechat\core\pay\Normal $normal
 * 
 */
class Pay extends BaseWechat
{

    /**
     * 构造函数
     *
     * @param array $config
     */
    public function __construct($config)
    {
        parent::__construct($config);

        // 校验必须的配置项
        if (!isset($config['app_id']) || empty($config['app_id'])) {
            throw new \Exception('缺少app_id', 0);
        }

        if (!isset($config['mch_id']) || empty($config['mch_id'])) {
            throw new \Exception('缺少mch_id', 0);
        }

    }

    /**
     * 生成签名
     *
     * @param array $params
     * @param string $key
     * @return string
     */
    public function makeSign($params, $key)
    {
        if (!$params) {
            throw new \Exception('参数有误', 0);
        }

        if (isset($params['sign'])) {
            unset($params['sign']);
        }

        ksort($params);
        $params['key'] = $key; // 后面加入key
        $string = urldecode(http_build_query($params));
        $sign = strtoupper(md5($string));
        return $sign;
    }

    /**
     * 签名校验
     *
     * @param array $params
     * @param string $key
     * @return boole
     */
    public function checkSign($params, $key)
    {
        if (!isset($params['sign'])) {
            return false;
        }

        $sign = $this->makeSign($params, $key);
        if ($sign == $params['sign']) {
            return true;
        }

        return false;
    }

    /**
     * 获取随机串
     *
     * @param int $length
     * @return string
     */
    public function getNonceStr($length = 32)
    {
        $chars = 'abcdefghijklmnopqrstuvwxyz0123456789';
        $len = strlen($chars)-1;
        $str = '';
        for ($i = 0; $i < $length; $i++) {
            $str .= substr($chars, mt_rand(0, $len), 1);
        }
        return $str;
    }

    /**
     * 获取客户端的ip
     * TODO swoole环境下？
     *
     * @return string
     */
    public function getClientIp()
    {
        return $_SERVER['REMOTE_ADDR'];
    }

    /**
     * 把数组转为xml
     * @param array $params
     * @return string
     * @throws Exception
     */
    public function arrayToXml($params)
    {
        if (!is_array($params) || !$params) {
            throw new \Exception('要组装的参数有误', 0);
        }

        $xml = "<xml>";
        foreach ($params as $key => $val) {
            if (is_numeric($val)) {
                $xml .= "<" . $key . ">" . $val . "</" . $key . ">";
            }else{
                $xml .= "<" . $key . "><![CDATA[" . $val . "]]></" . $key . ">";
                //$xml .= "<" . $key . ">" . $val . "</" . $key . ">";
            }
        }
        $xml .= "</xml>";
        return $xml;
    }

    /**
     * 进行请求
     *
     * @param string $url
     * @param array $params
     * @return array
     */
    protected function request($url, &$params)
    {
        // 必要参数
        $params['appid'] = $this->config['app_id'];
        $params['mch_id'] = $this->config['mch_id'];
        $params['nonce_str'] = $this->getNonceStr();
        $params['sign'] = $this->makeSign($params, $this->config['key']);
        $xml = $this->arrayToXml($params);
        $result = Curl::postXml($url, $xml);
        return $result;
    }

    
}
?>