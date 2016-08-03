<?php
require_once("../include/config.php"); 

// example setting up a stream configuration element
$streamConfig =new com\wowza\entities\application\StreamConfig();
$streamConfig->setStreamType("live");
$streamConfig->setLiveStreamPacketizer(array("sanjosestreamingpacketizer","cupertinostreamingpacketizer"));

// example setting up a security configuration element
$securityConfig = new com\wowza\entities\application\SecurityConfig();
$securityConfig->secureTokenVersion = "0";
$securityConfig->clientStreamWriteAccess = "*";
$securityConfig->publishRequirePassword = "true";
$securityConfig->publishPasswordFile = "";
$securityConfig->publishRTMPSecureURL = "";
$securityConfig->publishIPBlackList = "";
$securityConfig->publishIPWhiteList = "";
$securityConfig->publishBlockDuplicateStreamNames = "false";
$securityConfig->publishValidEncoders = "";
$securityConfig->publishAuthenticationMethod = "digest";
$securityConfig->playMaximumConnections = "0";
$securityConfig->playRequireSecureConnection = "false";
$securityConfig->secureTokenSharedSecret = "";
$securityConfig->secureTokenUseTEAForRTMP = "false";
$securityConfig->secureTokenIncludeClientIPInHash = "false";
$securityConfig->secureTokenHashAlgorithm = "";
$securityConfig->secureTokenQueryParametersPrefix = "";
$securityConfig->secureTokenOriginSharedSecret = "";
$securityConfig->playIPBlackList = "";
$securityConfig->playIPWhiteList = "";
$securityConfig->playAuthenticationMethod = "none";

// example setting up module(s) configuration element
$modules = new com\wowza\entities\application\Modules();
$modules->moduleList[] = $modules->getModuleItem("ModuleCoreSecurity", "ModuleCoreSecurity", "com.wowza.wms.security.ModuleCoreSecurity");

// Create this application
$wowzaApplication = new com\wowza\Application("YourAppName4");
// $response = $wowzaApplication->create($streamConfig);
// $response = $wowzaApplication->create($streamConfig, $securityConfig,$modules);

// Update the application
// $response = $wowzaApplication->update($streamConfig);

// Remove the application
// $response = $wowzaApplication->remove();

var_dump($response);
