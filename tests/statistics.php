<?php
require_once("../include/config.php"); 

$sf = new com\wowza\Statistics();

// get stats per application
$wowzaApplication = new com\wowza\Application("vod");

// get total server stats
$server = new com\wowza\Server("http://wowza.edgetrac.net:8087/v2");
$response = $sf->getServerStatistics($server);

// get stats historical for given application
// $response = $sf->getApplicationStatisticsHistory($wowzaApplication);

// $response = $sf->getApplicationStatistics($wowzaApplication);

// get incoming stream stats for given application
// $response = $sf->getIncomingApplicationStatistics($wowzaApplication,"sample.mp4");


var_dump($response);