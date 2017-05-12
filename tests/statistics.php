<?php
//
// This code and all components (c) Copyright 2006 - 2016, Wowza Media Systems, LLC. All rights reserved.
// This code is licensed pursuant to the Wowza Public License version 1.0, available at www.wowza.com/legal.
//
require_once("../include/config.php");

$sf = new com\wowza\Statistics();

// get stats per application
$wowzaApplication = new com\wowza\Application("vod");

// get total server stats
$server = new com\wowza\Server("http://localhost:8087/v2");
$response = $sf->getServerStatistics($server);

// get stats historical for given application
// $response = $sf->getApplicationStatisticsHistory($wowzaApplication);

// $response = $sf->getApplicationStatistics($wowzaApplication);

// get incoming stream stats for given application
// $response = $sf->getIncomingApplicationStatistics($wowzaApplication,"sample.mp4");


var_dump($response);
