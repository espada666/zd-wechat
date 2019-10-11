# 一个简单的微信扩展


### 安装

- 使用composer 方式（推荐）

```sh

composer require zd/wechat

```


### 快速入门

```php

use Zd\wechat\App;

$config = [
    'app_id' => '微信的appid',
    'app_secret' => '微信的app_secret'
];

$wechat = App::init($config);

// 获取小程序的access_token 
$token = $wechat->applet->auth->getAccessToken();

```

### 结构

> 小程序模块

&nbsp; __auth__   用户身份信息授权
```php
/**
 *  获取access_token
 * 
 *  @return string 
 */
getAccessToken()


/**
 * 获取session_key
 *
 * @param string $code
 * @return object
 */
getSessionKey($code)



```

&nbsp; __code__   小程序二维码处理

```php

```

&nbsp; __analysis__   小程序数据分析

```php

```


> 微信支付模块
    
        

