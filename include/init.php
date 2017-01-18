//
// This code and all components (c) Copyright 2006 - 2016, Wowza Media Systems, LLC. All rights reserved.
// This code is licensed pursuant to the Wowza Public License version 1.0, available at www.wowza.com/legal.
//
<?php
function __autoload($className)
{
    $arr = explode("\\", $className);
    $className = array_pop($arr);

    $dirs = [
        "src/com/wowza",
        "src/com/wowza/entities/application",
        "src/com/wowza/entities",
        "src/com/wowza/entities/application/helpers",
    ];

    foreach ($dirs as $dir) {
        $file = BASE_DIR . "/" . $dir . "/" . strtolower($className) . ".php";
        if (file_exists($file)) {
            require_once($file);
        }
    }
}

?>
