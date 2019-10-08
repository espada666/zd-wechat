<?php
/**
 * engine!!
 * 
 * @author espadas 369850596@qq.com
 * @license MIT
 */

namespace Zd\wechat;

/**
 * Class Factory.
 * @property \Wechat\core\Applet $applet
 * @property \Wechat\core\AppletAnalysis $appletAnalysis
 */
class Engine
{

    /**
     * wechat config
     *
     * @var array
     */
    private $config = [];

    /**
     * 实例化的方法集合
     *
     * @var array
     */
    private static $classes = [];

    /**
     * initialize
     *
     * @param array $config
     */
    public function __construct($config = [])
    {
        $this->config = $config;
    }
    

    /**
     * magic 
     *
     * @param string $name
     * @return object
     */
    public function __get($name)
    {
        $className = '\\Zd\\wechat\\core\\' . ucwords($name);
        if (!isset(static::$classes[$className])) {
            static::$classes[$className] = new $className($this->config);
        }

        return static::$classes[$className];
        //return new $className($this->config);
    }
}