# PHP REST Library for Wowza Streaming Engine
Wowza Streaming Engine [media server software](https://www.wowza.com/products/streaming-engine) includes a REST API that you can wrap with a PHP library to configure, manage, and monitor your streaming media server through PHP requests.

## Prerequisites
Wowza Streaming Engine™ 4.0.0 or later is required.

## Usage
To set up the PHP library to point to your streaming media server, modify the following lines in **include/constants.php**:
```PHP
define("BASE_DIR", dirname(dirname(__FILE__)));
define("WOWZA_HOST","http://localhost:8087/v2");
define("WOWZA_SERVER_INSTANCE", "_defaultServer_");
define("WOWZA_VHOST_INSTANCE", "_defaultVHost_");
define("WOWZA_USERNAME", "admin");
define("WOWZA_PASSWORD", "admin");
```
See several examples of usage in the **tests** folder.

To learn the basics of how to query the Wowza Streaming Engine REST service using PHP, see [How to use PHP to make requests to the Wowza Streaming Engine REST API](https://www.wowza.com/forums/content.php?918-How-to-use-PHP-to-make-requests-to-the-Wowza-Streaming-Engine-REST-API). For examples on how to leverage this PHP library, see [REST API Query Examples (PHP)](https://www.wowza.com/forums/content.php?889-wowza-streaming-engine-rest-api-query-examples-%28php%29).

## More resources
Wowza Media Systems™ provides developers with a platform to create streaming applications and solutions. See [Wowza Developer Tools](https://www.wowza.com/resources/developers) to learn more about our APIs and SDK.

## Contact
[Wowza Media Systems, LLC](https://www.wowza.com/contact)

## License
This code is distributed under the [Wowza Public License](https://github.com/WowzaMediaSystems/rest-library-php/blob/master/LICENSE.txt).

![alt tag](http://wowzalogs.com/stats/githubimage.php?plugin=rest-library-php)
