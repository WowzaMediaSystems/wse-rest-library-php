<?php
//
// This code and all components (c) Copyright 2006 - 2016, Wowza Media Systems, LLC. All rights reserved.
// This code is licensed pursuant to the Wowza Public License version 1.0, available at www.wowza.com/legal.
//
require_once("../include/config.php");

$sf = new com\wowza\StreamFile("live", "matt123");
// $response = $sf->get();

$response = $sf->create(array("uri"=>"rtsp://localhost/vod/mp4:BigBuckBunny_115k.mov","streamTimeout"=>1200,"rtspSessionTimeout"=>800), "rtp");

// Complete an update on the stream file
// $response = $sf->update(array("uri"=>"rtsp://184.72.239.149/vod/mp4:BigBuckBunny_115k.mov","streamTimeout"=>"1100","rtspSessionTimeout"=>"600"));

// Connect to the stream identified in the file
// $response = $sf->connect();

// 	$response = $sf->disconnect();

// Remove the stream file
// $response = $sf->remove();

var_dump($response);
