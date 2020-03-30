[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/WowzaMediaSystems/wse-rest-library-php/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/WowzaMediaSystems/wse-rest-library-php/?branch=master)

# PHP REST Library for Wowza Streaming Engine
Wowza Streaming Engine [media server software](https://www.wowza.com/products/streaming-engine) includes a REST API that you can wrap with a PHP library to configure, manage, and monitor your streaming media server through PHP requests.

## Prerequisites
Wowza Streaming Engine™ 4.0.0 or later is required.

[PHP 5.5.9|PHP 7.0.8](http://php.net/downloads.php) or later is required.

[Composer](https://getcomposer.org/) is highly recommended.

## Composer Setup

1. Please [install composer](https://getcomposer.org/doc/00-intro.md)

2. `$ composer require "wowza/wse-rest-library-php:dev-master"`

Wowza Media Systems, LLC is not responsible for nor does it provide support for composer.

## Example Configuration

config.yaml

```
Host: "http://111.111.123.123:8087/v2"
ServerInstance: "_defaultServer_"
VHostInstance: "_defaultVHost_"
UserName: "my_secret_username"
Password: "my_super_cool_password"
useDigest: false
```

index.php
```
<?php
require 'vendor/autoload.php';

$configPath = __DIR__.'<path_to_config_file>';

// It is simple to create a setup object for transporting our settings
$setup = new Com\Wowza\Entities\Application\Helpers\Settings($configPath);

// Connect to the server or deal with statistics NOTICE THE CAPS IN COM AND WOWZA
$server = new Com\Wowza\Server($setup);
$sf = new Com\Wowza\Statistics($setup);
$response = $sf->getServerStatistics($server);
var_dump($response);
```

## Packagist

A development branch is available through Packagist at [the packagist website.](https://packagist.org/packages/wowza/wse-rest-library-php#dev-master)

## Usage
To learn the basics of how to query the Wowza Streaming Engine REST service using PHP, see [How to use PHP to make requests to the Wowza Streaming Engine REST API](https://www.wowza.com/forums/content.php?918-How-to-use-PHP-to-make-requests-to-the-Wowza-Streaming-Engine-REST-API). For examples on how to leverage this PHP library, see [REST API Query Examples (PHP)](https://www.wowza.com/forums/content.php?889-wowza-streaming-engine-rest-api-query-examples-%28php%29).

## More resources
Wowza Media Systems™ provides developers with a platform to create streaming applications and solutions. See [Wowza Developer Tools](https://www.wowza.com/resources/developers) to learn more about our APIs and SDK.

## Contact
[Wowza Media Systems, LLC](https://www.wowza.com/contact)

## License
This code is distributed under the [Wowza Public License](https://github.com/WowzaMediaSystems/rest-library-php/blob/master/LICENSE.txt).

![alt tag](http://wowzalogs.com/stats/githubimage.php?plugin=rest-library-php)
