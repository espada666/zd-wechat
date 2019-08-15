<?php
/**
 * initialize the wechat extension
 * 
 * @author espadas 369850596@qq.com
 * @license MIT
 */

namespace Plus\wechat;

/**
 * Class Factory.
 * @property \Plus\wechat\core\Applet $applet
 * @method static \Plus\wechat\App init($config)
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
        return new \Plus\wechat\Engine($config);
    }

}