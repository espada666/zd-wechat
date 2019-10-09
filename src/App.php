<?php
/**
 * initialize the wechat extension
 * 
 * @author espadas 369850596@qq.com
 * @license MIT
 */

namespace Zd\wechat;

/**
 * Class Factory.
 * @property \Zd\wechat\core\Applet $applet
 * @property \Zd\wechat\core\AppletAnalysis $appletAnalysis
 * @method static \Zd\wechat\App init($config)
 */
class App
{

    /**
     * init static method
     *
     * @param array $config
     * @return object
     */
    public static function init($config = [])
    {
        return new \Zd\wechat\Engine($config);
    }

}