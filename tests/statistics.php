<?php
require_once("../include/config.php"); 

$sf = new com\wowza\Statistics();

// get stats per application
$wowzaApplication = new com\wowza\Application("vod");
$response = $sf->getApplicationStatistics($wowzaApplication);

// get incoming stream stats for given application
// $response = $sf->getIncomingApplicationStatistics($wowzaApplication,"sample.mp4");

// get stats historical for given application
// $response = $sf->getApplicationStatisticsHistory($wowzaApplication);

// get total server stats
// $server = new com\wowza\Server();
// $response = $sf->getServerStatistics($server);

var_dump($response);