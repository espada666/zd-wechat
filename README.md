# zd-wechat
一个简单的微信扩展包

### 安装

- 使用composer 方式（推荐）

```sh

composer require zd/wechat

```


### 入门使用

```php

use Zd\wechat\App;

$config = [
    'app_id' => '微信的appid',
    'app_secret' => '微信的app_secret'
];

$wechat = App::init($config);

// 获取小程序的access_token 
$token = $wechat->applet->getAccessToken();

```

### 结构

coming soon...

