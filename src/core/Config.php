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
    const WXACODEUNLIMIT_URL = 'https://api.weixin.qq.com/wxa/getwxacode';
    /**
     * 模板推送
     */
    const TEMPLATE_PUSH_URL = 'https://api.weixin.qq.com/cgi-bin/message/template/send';

    /**
     * code获取session的地址
     */
    const CODE_TO_SESSION_URL = 'https://api.weixin.qq.com/sns/jscode2session';

}