<?php
require_once("../include/config.php"); 
 
$sf = new com\wowza\User("newuser3");
$response = $sf->remove();
// $response = $sf->getAll();
// $response = $sf->create("newpass4", array("admin")); 


var_dump($response);