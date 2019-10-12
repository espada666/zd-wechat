<?php
/**
 * 配置信息
 * @author espada 369850596@qq.com
 * @license MIT
 */
namespace Zd\wechat\core;

class Config
{
    /**
     * 获取access_token的地址
     */
    const ACCESS_TOKEN_URL = 'https://api.weixin.qq.com/sns/oauth2/access_token';
    /**
     * 使用证书获取的access_token地址
     */
    const CREDENTIAL_ACCESS_TOKEN_URL = 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential';
    /**
     * 获取授权后的用户信息地址
     */
    const USER_INFO_URL = 'https://api.weixin.qq.com/sns/userinfo';
    /**
     * 获取授权地址
     */
    const OAUTH_URL ='https://open.weixin.qq.com/connect/oauth2/authorize';
    /**
     * session_key地址
     */
    const SESSION_KEY_URL = 'https://api.weixin.qq.com/sns/jscode2session';
    /**
     * 获取用户基本信息(UnionID机制)
     */
    const UNIONID_USER_INFO_URL = 'https://api.weixin.qq.com/cgi-bin/user/info';
    /**
     * 不受限制的生成小程序二维码请求连接
     */
    const WXACODEUNLIMIT_URL = 'https://api.weixin.qq.com/wxa/getwxacodeunlimit';

    /**
     * 永久有效，有数量限制
     */
    const WXQRCODE_URL = 'https://api.weixin.qq.com/cgi-bin/wxaapp/createwxaqrcode';
    /**
     * 模板推送
     */
    const TEMPLATE_PUSH_URL = 'https://api.weixin.qq.com/cgi-bin/message/template/send';

    /**
     * code换取session
     */
    const CODE_TO_SESSION_URL = 'https://api.weixin.qq.com/sns/jscode2session';


    /*-----------------------------------小程序数据分析-----------------------------------*/

    /**
     * 访问月留存
     */
    const MONTHLY_RETAIN_URL = 'https://api.weixin.qq.com/datacube/getweanalysisappidmonthlyretaininfo';

    /**
     * 访问周留存
     */
    const WEEKLY_RETAIN_URL = 'https://api.weixin.qq.com/datacube/getweanalysisappidweeklyretaininfo';

    /**
     * 访问日留存
     */
    const DAILY_RETAIN_URL = 'https://api.weixin.qq.com/datacube/getweanalysisappiddailyretaininfo';

    /**
     * 月趋势
     */
    const MONTHLY_VISIT_URL = 'https://api.weixin.qq.com/datacube/getweanalysisappidmonthlyvisittrend';

    /**
     * 周趋势
     */
    const WEEKLY_VISIT_URL = 'https://api.weixin.qq.com/datacube/getweanalysisappidweeklyvisittrend';

    /**
     * 日趋势
     */
    const DAILY_VISIT_URL = 'https://api.weixin.qq.com/datacube/getweanalysisappiddailyvisittrend';

    /**
     * 用户画像
     */
    const USER_PORTRAIT_URL = 'https://api.weixin.qq.com/datacube/getweanalysisappiduserportrait';

    /**
     * 小程序访问分布
     */
    const VISIT_DISTRIBUTION_URL = 'https://api.weixin.qq.com/datacube/getweanalysisappidvisitdistribution';

    /**
     * 访问页面
     */
    const VISIT_PAGE_URL = 'https://api.weixin.qq.com/datacube/getweanalysisappidvisitpage';

    /**
     * 小程序数据概况
     */
    const DAILY_SUMMARY_URL = 'https://api.weixin.qq.com/datacube/getweanalysisappiddailysummarytrend';

    /*------------------------------------------ 微信支付 ------------------------------------------------*/

    /**
     * 统一下单的请求地址
     */
    const UNIFIED_ORDER_URL = 'https://api.mch.weixin.qq.com/pay/unifiedorder';

    /**
     * 订单查询请求地址
     */
    const ORDER_QUERY_URL = 'https://api.mch.weixin.qq.com/pay/orderquery';

    /**
     * 退款的请求地址
     */
    const REFUND_URL = 'https://api.mch.weixin.qq.com/secapi/pay/refund';

    /**
     * 关闭订单请求地址
     */
    const CLOSE_ORDER_URL = 'https://api.mch.weixin.qq.com/pay/closeorder';

    /**
     * 退款查询
     */
    const REFUND_QUERY_URL = 'https://api.mch.weixin.qq.com/pay/refundquery';


    /*------------------------------- 小微商户 -----------------------------------*/

    /**
     * 申请入驻请求地址
     */
    const MICRO_SUBMIT_URL = 'https://api.mch.weixin.qq.com/applyment/micro/submit';

    /**
     * 查询申请状态
     */
    const MICRO_GETSTATE_URL = 'https://api.mch.weixin.qq.com/applyment/micro/getstate';

    /**
     * 小微商户提交升级
     */
    const MICRO_UPGRADE_URL = 'https://api.mch.weixin.qq.com/applyment/micro/submitupgrade';

    /**
     * 查询升级状态
     */
    const MICRO_GETUPGRADESTATE_URL = 'https://api.mch.weixin.qq.com/applyment/micro/getupgradestate';

    /**
     * 修改联系信息
     */
    const MICRO_MODIFYCONTACTINFO_URL = 'https://api.mch.weixin.qq.com/applyment/micro/modifycontactinfo';

}