# PHP REST Library for Wowza Streaming Engine
Wowza Streaming Engine [media server software](https://www.wowza.com/products/streaming-engine) includes a REST API that you can wrap with a PHP library to configure, manage, and monitor your streaming media server through PHP requests.

## Prerequisites
Wowza Streaming Engine™ 4.0.0 or later is required.
[composer](https://getcomposer.org/) is highly recommended.

## Composer Setup

1. Please [install composer](https://getcomposer.org/doc/00-intro.md)

2. Create a composer.json file in the root directory of your project or as appropriate.

composer.json example contents -

```
{
  "repositories": [
    {
      "type":"vcs",
      "url": "https://github.com/WowzaMediaSystems/wse-rest-library-php.git"
    }
  ],
  "require": {
    "wowza/wse-rest-library-php": "dev-master"
  },
  "minimum-stability": "dev",
  "prefer-stable": true
}
```

## Installing wse-rest-library-php

`composer install` is the command you would run after composer is installed. This command must be ran in the same directory that the composer.json file is stored. Please see the composer site for issues with their product. Wowza Media Systems, LLC is not responsible for nor does it provide support for composer.

## Example Configuration

index.php

```
<?php
//index.php

require_once(__DIR__.'/../vendor/autoload.php');

// This is for a framework if you use one.
//$framework = new Project\Framework();
//$framework->registerDebugHandlers();
//$framework->processHttpSapiRequest();

require_once("../config.php"); // make sure this exists and is similar to the below - move it where it needs to be
```

config.php

```
<?php
// config.php
define("WOWZA_HOST","http://111.111.123.123:8087/v2");
define("WOWZA_SERVER_INSTANCE", "_defaultServer_");
define("WOWZA_VHOST_INSTANCE", "_defaultVHost_");
define("WOWZA_USERNAME", "my_secret_username");
define("WOWZA_PASSWORD", "my_super_cool_password");

// It is simple to create a setup object for transporting our settings
$setup = new Com\Wowza\Entities\Application\Helpers\Settings();
$setup->setHost(WOWZA_HOST);
$setup->setUsername(WOWZA_USERNAME);
$setup->setPassword(WOWZA_PASSWORD);

// Connect to the server or deal with statistics NOTICE THE CAPS IN COM AND WOWZA
$server = new Com\Wowza\Server($setup);
$sf = new Com\Wowza\Statistics($setup);
$response = $sf->getServerStatistics($server);
var_dump($response);
```

## Packagist

Work is being done to make this repository available through packagist.

## Usage
To learn the basics of how to query the Wowza Streaming Engine REST service using PHP, see [How to use PHP to make requests to the Wowza Streaming Engine REST API](https://www.wowza.com/forums/content.php?918-How-to-use-PHP-to-make-requests-to-the-Wowza-Streaming-Engine-REST-API). For examples on how to leverage this PHP library, see [REST API Query Examples (PHP)](https://www.wowza.com/forums/content.php?889-wowza-streaming-engine-rest-api-query-examples-%28php%29).

## More resources
Wowza Media Systems™ provides developers with a platform to create streaming applications and solutions. See [Wowza Developer Tools](https://www.wowza.com/resources/developers) to learn more about our APIs and SDK.

## Contact
[Wowza Media Systems, LLC](https://www.wowza.com/contact)

## License
This code is distributed under the [Wowza Public License](https://github.com/WowzaMediaSystems/rest-library-php/blob/master/LICENSE.txt).

![alt tag](http://wowzalogs.com/stats/githubimage.php?plugin=rest-library-php)
