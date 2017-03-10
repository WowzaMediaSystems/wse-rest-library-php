<?php
//
// This code and all components (c) Copyright 2006 - 2016, Wowza Media Systems, LLC. All rights reserved.
// This code is licensed pursuant to the Wowza Public License version 1.0, available at www.wowza.com/legal.
//
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
