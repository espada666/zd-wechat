<?php
/**
 * curl库
 * 
 * @license MIT
 * @author espada 369850596@qq.com
 */
namespace Zd\wechat\request;

class Curl
{

    /**
     * curl get
     *
     * @param string $url
     * @param array $options
     * @return mixed
     */
    public static function get($url, $options = [])
    {
        $ch = \curl_init();
        curl_setopt($ch, CURLOPT_TIMEOUT, 30); // 设置超时时间
		curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        if ($options) {
            foreach ($options as $key => $value) {
                curl_setopt($ch, $key, $value);
            }
        }

        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }

    /**
     * curl post
     *
     * @param string $url
     * @param array $options
     * @return mixed
     */
    public static function post($url, $data, $options = [])
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_TIMEOUT, 30); // 设置超时时间
		curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_POST, 1);
        if ($options) {
            foreach ($options as $key => $value) {
                curl_setopt($ch, $key, $value);
            }
        }

        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        /* curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data)
        )); */
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }
}