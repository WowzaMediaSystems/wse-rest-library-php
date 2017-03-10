<?php
//
// This code and all components (c) Copyright 2006 - 2016, Wowza Media Systems, LLC. All rights reserved.
// This code is licensed pursuant to the Wowza Public License version 1.0, available at www.wowza.com/legal.
//
use com\wowza\DvrClipExtraction;
require_once("../include/config.php");

$sf = new com\wowza\DvrClipExtraction("ndvr");
$response = $sf->clearCache();
// $response = $sf->debugConversions("tmp127");
// $sf->convertByDurationWithEndTimeTime("tmp123", time(), 5000);
// $response = $sf->convertByDurationWithStartTime("tmp123", strtotime("-1 hour"), 5000);

// $response = $sf->convert("tmp127", time());

// $response = $sf->convertGroup(array("tmp123","tmp124"));
// $response = $sf->convert("tmp123");

// $response = $sf->getItem("tmp123");

// $response = $sf->getAll();




var_dump($response);
