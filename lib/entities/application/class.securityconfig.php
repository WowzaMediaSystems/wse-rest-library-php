<?php
namespace com\wowza\entities\application;
class SecurityConfig extends \com\wowza\entities\Entity{
      public $secureTokenVersion = 0;
      public $clientStreamWriteAccess = "*";
      public $publishRequirePassword = true;
      public $publishPasswordFile = "";
      public $publishRTMPSecureURL = "";
      public $publishIPBlackList = "";
      public $publishIPWhiteList = "";
      public $publishBlockDuplicateStreamNames = false;
      public $publishValidEncoders = "";
      public $publishAuthenticationMethod = "digest";
      public $playMaximumConnections = 0;
      public $playRequireSecureConnection = false;
      public $secureTokenSharedSecret = "";
      public $secureTokenUseTEAForRTMP = false;
      public $secureTokenIncludeClientIPInHash = false;
      public $secureTokenHashAlgorithm = "";
      public $secureTokenQueryParametersPrefix = "";
      public $secureTokenOriginSharedSecret = "";
      public $playIPBlackList = "";
      public $playIPWhiteList = "";
      public $playAuthenticationMethod = "none"; 
	
	  public function setURI($baseURI){
		  $this->restURI = $baseURI."/security";
	  }
}