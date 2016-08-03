<?php
require_once("../include/config.php"); 

$wowzaApplication = new com\wowza\Application("live");
$sf = new com\wowza\StreamFile($wowzaApplication->getName(), "bolton_mass");
$response = $sf->create(array("uri"=>"rtsp://localhost/vod/mp4:BigBuckBunny_115k.mov","streamTimeout"=>1200,"rtspSessionTimeout"=>800), "rtp");

// Complete an update on the stream file
// $response = $sf->update(array("uri"=>"rtsp://184.72.239.149/vod/mp4:BigBuckBunny_115k.mov","streamTimeout"=>"1100","rtspSessionTimeout"=>"600"));

// Connect to the stream identified in the file
// $response = $sf->connect();

// 	$response = $sf->disconnect();

// Remove the stream file
// $response = $sf->remove();

var_dump($response);