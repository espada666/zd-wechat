<?php
/**
 * 小程序数据分析
 * 
 * @author espada 369850596@qq.com
 * @license MIT
 */
namespace Zd\wechat\core;

use Zd\wechat\core\AbstractWechat;

use Zd\wechat\core\Config;

use Zd\wechat\request\Curl;

class AppletAnalysis extends AbstractWechat
{

    public $config = [];

    /**
     * access_token
     *
     * @var string
     */
    private $accessToken = '';

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
     * 设置access_token
     *
     * @param [type] $accessToken
     * @return void
     */
    public function setAccessToken($accessToken)
    {
        $this->accessToken = $accessToken;
    }

    /**
     * 获取小程序访问的月留存
     *
     * @param string $beginDate
     * @param string $endDate
     * @return void
     */
    public function getMonthlyRetain($beginDate = '', $endDate = '')
    {
        $data = json_encode([
            'begin_date' => $beginDate,
            'end_date' => $endDate
        ]);
        $result = Curl::postJson(Config::MONTHLY_RETAIN_URL . '?access_token=' . $this->accessToken, $data);
        return $result;
    }
  
}