//
// This code and all components (c) Copyright 2006 - 2016, Wowza Media Systems, LLC. All rights reserved.
// This code is licensed pursuant to the Wowza Public License version 1.0, available at www.wowza.com/legal.
//
<?php
require_once("../include/config.php");

// Create settings
$settings = new \com\wowza\entities\application\helpers\Settings();

$sf = new com\wowza\StreamTarget($settings, "live");
$response = $sf->remove("ppsource");
// $response = $sf->create("myStream","ppsource","rtmp","locahost",null, null,"myStream");
// $response = $sf->getAll();

// $response = $sf->remove();


var_dump($response);
