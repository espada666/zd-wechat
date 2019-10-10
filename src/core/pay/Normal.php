<?php
/**
 * 微信支付 - 境内普通商户平台
 * 
 * @author espada 369850596@qq.com
 * @license MIT
 */
namespace Zd\wechat\core\pay;

use Zd\wechat\core\BaseWechat;

use Zd\wechat\core\Config;

use Zd\wechat\request\Curl;

class Normal extends BaseWechat
{

    /**
     * 统一下单
     *
     * @param array $params
     * @return void
     */
    public function unifiedOrder($params = [])
    {
        if (!isset($params['out_trade_no']) && !isset($params['transaction_id'])) {
            throw new \Exception('退款申请接口中，out_trade_no、transaction_id至少填一个！', 0);
        }

        if (!isset($params['out_refund_no'])) {
            throw new \Exception('退款申请接口中，缺少必填参数out_refund_no！', 0);
        }

        if (!isset($params['total_fee'])) {
            throw new \Exception('退款申请接口中，缺少必填参数total_fee！', 0);
        }

        if (!isset($params['refund_fee'])) {
            throw new \Exception('退款申请接口中，缺少必填参数refund_fee！', 0);
        }
        
        //var_dump($this->config);
    }

    /**
     * 申请退款
     *
     * @param array $params
     * @return void
     */
    public function refund($params = [])
    {

    }

    
    
}