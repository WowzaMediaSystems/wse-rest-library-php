<?php
require_once("../include/config.php"); 
 
$sf = new com\wowza\User("newuser3");
// $response = $sf->getAll();
// $response = $sf->create("newpass4", array("admin")); 
$response = $sf->remove();


var_dump($response);