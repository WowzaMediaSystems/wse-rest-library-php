# PHP REST Library
A php library that wraps the Wowza REST API.

## Prerequisites
Wowza Streaming Engine 4.0.0 or later is required.

## Usage
Several examples of usage within the tests folder. To setup the library to point to your server, you can modify the include/constants.php file and modify the following lines:

```PHP
define("BASE_DIR", dirname(dirname(__FILE__)));
define("WOWZA_HOST","http://localhost:8087/v2");
define("WOWZA_SERVER_INSTANCE", "_defaultServer_");
define("WOWZA_VHOST_INSTANCE", "_defaultVHost_");
define("WOWZA_USERNAME", "admin");
define("WOWZA_PASSWORD", "admin");
```

## More resources
[Wowza Streaming Engine Server-Side API Reference](https://www.wowza.com/resources/WowzaStreamingEngine_ServerSideAPI.pdf)

[How to extend Wowza Streaming Engine using the Wowza IDE](https://www.wowza.com/forums/content.php?759-How-to-extend-Wowza-Streaming-Engine-using-the-Wowza-IDE)

Wowza Media Systems™ provides developers with a platform to create streaming applications and solutions. See [Wowza Developer Tools](https://www.wowza.com/resources/developers) to learn more about our APIs and SDK.

For examples on how to leverage this library, check out [How to use PHP to make requests to the Wowza REST API](https://www.wowza.com/forums/content.php?872-How-to-use-PHP-to-make-requests-to-the-Wowza-REST-API).

## Contact
[Wowza Media Systems, LLC](https://www.wowza.com/contact)

## License
This code is distributed under the [Wowza Public License](https://github.com/WowzaMediaSystems/rest-library-php/blob/master/LICENSE.txt).

![alt tag](http://wowzalogs.com/stats/githubimage.php?plugin=rest-library-php)
