<?php
require_once("../include/config.php"); 
 
$sf = new com\wowza\Logging();
$response = $sf->search("MediaCasterStreamValidator.init");
// $response = $sf->getLineCount(10);
// $response = $sf->getNewestFirst();
 


var_dump($response);