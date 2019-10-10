<?php
/**
 * 支付部分
 * @author espada 369850596@qq.com
 * @license MIT
 */
namespace Zd\wechat\core;

use Zd\wechat\core\BaseWechat;

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
     * @return void
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
        $string = http_build_query($params);
        $sign = strtoupper(md5($string));
        return $sign;
    }

    
}
?>