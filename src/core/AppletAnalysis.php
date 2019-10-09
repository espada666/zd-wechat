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
     * @return object
     */
    public function getMonthlyRetain($beginDate, $endDate)
    {
        $data = json_encode([
            'begin_date' => $beginDate,
            'end_date' => $endDate
        ]);
        $result = Curl::postJson(Config::MONTHLY_RETAIN_URL . '?access_token=' . $this->accessToken, $data);
        return json_decode($result);
    }

    /**
     * 获取访问的周留存
     *
     * @param string $beginDate
     * @param string $endDate
     * @return object
     */
    public function getWeeklyRetain($beginDate, $endDate)
    {
        $data = json_encode([
            'begin_date' => $beginDate,
            'end_date' => $endDate
        ]);
        $result = Curl::postJson(Config::WEEKLY_RETAIN_URL . '?access_token=' . $this->accessToken, $data);
        return json_decode($result);
    }
    
    /**
     * 获取日留存
     *
     * @param string $beginDate
     * @param string $endDate
     * @return object
     */
    public function getDailyRetain($beginDate, $endDate)
    {
        $data = json_encode([
            'begin_date' => $beginDate,
            'end_date' => $endDate
        ]);
        $result = Curl::postJson(Config::DAILY_RETAIN_URL . '?access_token=' . $this->accessToken, $data);
        return json_decode($result);
    }

    /**
     * 获取月访问趋势
     *
     * @param string $beginDate
     * @param string $endDate
     * @return object
     */
    public function getMonthlyVisitTrend($beginDate, $endDate)
    {
        $data = json_encode([
            'begin_date' => $beginDate,
            'end_date' => $endDate
        ]);
        $result = Curl::postJson(Config::MONTHLY_VISIT_URL . '?access_token=' . $this->accessToken, $data);
        return json_decode($result);
    }

    /**
     * 获取周访问趋势
     *
     * @param string $beginDate
     * @param string $endDate
     * @return object
     */
    public function getWeeklyVisitTrend($beginDate, $endDate)
    {
        $data = json_encode([
            'begin_date' => $beginDate,
            'end_date' => $endDate
        ]);
        $result = Curl::postJson(Config::WEEKLY_VISIT_URL . '?access_token=' . $this->accessToken, $data);
        return json_decode($result);
    }

    /**
     * 获取日访问趋势
     *
     * @param string $beginDate
     * @param string $endDate
     * @return object
     */
    public function getDailyVisitTrend($beginDate, $endDate)
    {
        $data = json_encode([
            'begin_date' => $beginDate,
            'end_date' => $endDate
        ]);
        $result = Curl::postJson(Config::DAILY_VISIT_URL . '?access_token=' . $this->accessToken, $data);
        return json_decode($result);
    }

    /**
     * 用户画像
     *
     * @param string $beginDate
     * @param string $endDate
     * @return object
     */
    public function getUserPortrait($beginDate, $endDate)
    {
        $data = json_encode([
            'begin_date' => $beginDate,
            'end_date' => $endDate
        ]);
        $result = Curl::postJson(Config::USER_PORTRAIT_URL . '?access_token=' . $this->accessToken, $data);
        return json_decode($result);
    }
    
    /**
     * 访问分布数据
     *
     * @param string $beginDate
     * @param string $endDate
     * @return object
     */
    public function getVisitDistribution($beginDate, $endDate)
    {
        $data = json_encode([
            'begin_date' => $beginDate,
            'end_date' => $endDate
        ]);
        $result = Curl::postJson(Config::VISIT_DISTRIBUTION_URL . '?access_token=' . $this->accessToken, $data);
        return json_decode($result);
    }

    /**
     * 访问页面数据
     *
     * @param string $beginDate
     * @param string $endDate
     * @return object
     */
    public function getVisitPage($beginDate, $endDate)
    {
        $data = json_encode([
            'begin_date' => $beginDate,
            'end_date' => $endDate
        ]);
        $result = Curl::postJson(Config::VISIT_PAGE_URL . '?access_token=' . $this->accessToken, $data);
        return json_decode($result);
    }

    /**
     * 用户访问小程序数据
     *
     * @param string $beginDate
     * @param string $endDate
     * @return object
     */
    public function getDailySummary($beginDate, $endDate)
    {
        $data = json_encode([
            'begin_date' => $beginDate,
            'end_date' => $endDate
        ]);
        $result = Curl::postJson(Config::DAILY_SUMMARY_URL . '?access_token=' . $this->accessToken, $data);
        return json_decode($result);
    }
  
}