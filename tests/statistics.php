<?php
//
// This code and all components (c) Copyright 2006 - 2018, Wowza Media Systems, LLC. All rights reserved.
// This code is licensed pursuant to the Wowza Public License version 1.0, available at www.wowza.com/legal.
//

// Create settings
$settings = new \com\wowza\entities\application\helpers\Settings();

$sf = new com\wowza\Statistics($settings);

// get stats per application
$wowzaApplication = new com\wowza\Application($settings, 'vod');

// get total server stats
$server = new com\wowza\Server($settings, 'http://localhost:8087/v2');
$response = $sf->getServerStatistics($server);

// get stats historical for given application
// $response = $sf->getApplicationStatisticsHistory($wowzaApplication);

// $response = $sf->getApplicationStatistics($wowzaApplication);

// get incoming stream stats for given application
// $response = $sf->getIncomingApplicationStatistics($wowzaApplication,"sample.mp4");


var_dump($response);
