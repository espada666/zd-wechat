<?php
/**
 * 微信支付 - 服务商平台
 * 
 * @author espada 369850596@qq.com
 * @license MIT
 */
namespace Zd\wechat\core\pay;

use Zd\wechat\core\Pay;

use Zd\wechat\core\Config;

class Provider extends Pay
{

    /**
     * 统一下单
     *
     * @param array $params
     * @return array
     * @throws Exception
     */
    public function unifiedOrder($params = [])
    {
        $params['spbill_create_ip'] = $this->getClientIp();
        $result = $this->request(Config::UNIFIED_ORDER_URL, $params);
        if ($result['return_code'] == 'FAIL') {
            throw new \Exception($result['return_msg'], 0);
        }
        // 对返回参数进行签名校验
        if(!$this->checkSign($result, $this->config['key'])) {
            throw new \Exception('响应的参数签名有误', 0);
        }

        return $result;
    }

    /**
     * 申请退款
     *
     * @param array $params
     * @return void
     */
    public function refund($params = [])
    {
        return $this->request(Config::REFUND_URL, $params);
    }

    /**
     * 查询订单
     *
     * @param array $params
     * @return array
     */
    public function orderQuery($params = [])
    {
        return $this->request(Config::REFUND_URL, $params);
    }

    /**
     * 关闭订单
     *
     * @param array $params
     * @return array
     */
    public function closeOrder($params = [])
    {
        return $this->request(Config::CLOSE_ORDER_URL, $params);
    }

    /**
     * 查询退款
     * @param array $params
     * @return array
     */
    public function refundQuery($params = [])
    {
        return $this->request(Config::REFUND_QUERY_URL, $params);
    }
    
}