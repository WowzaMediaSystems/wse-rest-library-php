<?php
require_once("../include/config.php"); 
 
$sf = new com\wowza\Publisher("fox1");
$response = $sf->create("matt2","matt2"); 
// $response = $sf->remove();

var_dump($response);