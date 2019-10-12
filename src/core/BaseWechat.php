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
class BaseWechat extends AbstractWechat
{

    protected $config = [];
    
    private static $instance = null;

    /**
     * 禁止实例化的类
     *
     * @var array
     */
    protected $illegalClass = [];

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
        if (in_array($name, $this->illegalClass)) {
            throw new \Exception('invalid class', 0);
        }

        $className = '\\' . ucfirst(strtolower(get_class($this))) . '\\' . ucwords($name);
        if (self::$instance == null) {
            self::$instance = new $className($this->config);
        }

        return self::$instance;
    }

    /**
     * 禁止clone
     *
     * @return void
     */
    private function __clone()
    {
        
    }

    

  
}