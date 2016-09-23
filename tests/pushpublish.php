<?php
require_once("../include/config.php"); 
 
$sf = new com\wowza\StreamTarget("live");
$response = $sf->remove("ppsource");
// $response = $sf->create("myStream","ppsource","rtmp","locahost",null, null,"myStream");
// $response = $sf->getAll();

// $response = $sf->remove();


var_dump($response);