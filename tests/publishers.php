<?php
require_once("../include/config.php"); 
 
$sf = new com\wowza\Publisher("myUser");
// $response = $sf->create("myPass"); 
// $response = $sf->remove();
$response = $sf->getAll();


var_dump($response);