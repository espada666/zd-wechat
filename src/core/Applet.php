<?php
/**
 * 小程序的库
 * 
 * @author espada 369850596@qq.com
 * @license MIT
 */
namespace Zd\wechat\core;

use Zd\wechat\core\AbstractWechat;

/**
 * class factory
 * @property \Zd\wechat\core\applet\Auth $auth
 * 
 */
class Applet extends AbstractWechat
{

    private $config = [];

    private static $instance = null;

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
     * magic
     *
     * @param string $name
     * @return void
     */
    public function __get($name)
    {
        $className = '\\Zd\\wechat\\core\\applet\\' . ucwords($name);
        if (self::$instance == null) {
            self::$instance = new $className($this->config);
        }

        return self::$instance;
    }

    /**
     * 私有化clone
     *
     * @return void
     */
    private function __clone()
    {
        
    }

    

  
}