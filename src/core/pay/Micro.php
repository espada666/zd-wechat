<?php
/**
 * 微信支付 - 小微商户
 * 
 * @author espada 369850596@qq.com
 * @license MIT
 */
namespace Zd\wechat\core\pay;

use Zd\wechat\core\Pay;

class Micro extends Pay
{

    /**
     * 入驻申请
     * @param array $params
     * @return object
     */
    public function apply($params = [])
    {

    }

    /**
     * 申请状态
     * @param array $params
     * @return object
     */
    public function getState($params = [])
    {

    }

    /**
     * 申请升级
     *
     * @return void
     */
    public function upgrade($params = [])
    {

    }

    /**
     * 获取升级状态
     *
     * @return void
     */
    public function getUpgradeState($params = [])
    {

    }

    /**
     * 修改联系人信息
     *
     * @return void
     */
    public function modifyContactInfo($params = [])
    {

    }

    /**
     * api 相关配置（支付目录API， APPID关联API）
     *
     * @return void
     */
    public function addDevConfig($params = [])
    {

    }

    /**
     * 小微商户开发配置查询API
     *
     * @param array $params
     * @return void
     */
    public function queryDevConfig($params = [])
    {

    }
}