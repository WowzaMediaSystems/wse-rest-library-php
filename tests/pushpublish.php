<?php
//
// This code and all components (c) Copyright 2006 - 2016, Wowza Media Systems, LLC. All rights reserved.
// This code is licensed pursuant to the Wowza Public License version 1.0, available at www.wowza.com/legal.
//
require_once("../include/config.php");

$sf = new com\wowza\StreamTarget("live");
$response = $sf->remove("ppsource");
// $response = $sf->create("myStream","ppsource","rtmp","locahost",null, null,"myStream");
// $response = $sf->getAll();

// $response = $sf->remove();


var_dump($response);
