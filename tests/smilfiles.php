<?php
//
// This code and all components (c) Copyright 2006 - 2016, Wowza Media Systems, LLC. All rights reserved.
// This code is licensed pursuant to the Wowza Public License version 1.0, available at www.wowza.com/legal.
//
require_once("../include/config.php");
 /*
  * [
         {
            "systemLanguage": "en",
            "src": "myfile_750.mp4",
            "systemBitrate": "50000",
            "type": "video",
            "audioBitrate": "44100",
            "videoBitrate": "750000",
            "restURI": "http://localhost:8087/v2/servers/_defaultServer_/vhosts/_defaultVHost_/applications/live/smilfiles/mytestsmil",
            "width": "640",
            "height": "360"
        },
        {
            "systemLanguage": "en",
            "src": "myfile_1100.mp4",
            "systemBitrate": "50000",
            "type": "video",
            "audioBitrate": "44100",
            "videoBitrate": "1100000",
            "restURI": "http://localhost:8087/v2/servers/_defaultServer_/vhosts/_defaultVHost_/applications/live/smilfiles/mytestsmil",
            "width": "640",
            "height": "360"
        }
  */
// $stream0 = new stdClass();
// $stream0->systemLanguage = "en";
// $stream0->systemBitrate = "50000";
// $stream0->src = "myfile_750.mp4";
// $stream0->type = "video";
// $stream0->audioBitrate = "44100";
// $stream0->videoBitrate = "750000";
// $stream0->width = 640;
// $stream0->height = 360;

// $stream1 = new stdClass();
// $stream1->systemLanguage = "en";
// $stream1->systemBitrate = "50000";
// $stream0->src = "myfile_1100.mp4";
// $stream1->type = "video";
// $stream1->audioBitrate = "44100";
// $stream1->videoBitrate = "1100000";
// $stream1->width = 640;
// $stream1->height = 360;

// $streams = array();
// $streams[] = $stream0;
// $streams[] = $stream1;

$sf = new com\wowza\SmilFile("live");
$response = $sf->remove("newsmil");
// $response = $sf->create("newsmil", $streams);

// $response = $sf->getAll();


//


var_dump($response);
