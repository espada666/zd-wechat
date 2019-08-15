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
        return new $className($this->config);
    }
}