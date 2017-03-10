<?php
//
// This code and all components (c) Copyright 2006 - 2016, Wowza Media Systems, LLC. All rights reserved.
// This code is licensed pursuant to the Wowza Public License version 1.0, available at www.wowza.com/legal.
//
namespace com\wowza\entities\application;
class DrmConfig extends \com\wowza\entities\Entity{
	public $licenseType = "Monthly";
	public $inUse = array();
	public $cupertinoEncryptionAPIBased = array();
	public $ezDRMUsername = "";
	public $ezDRMPassword = "";
	public $buyDRMUserKey = "";
	public $buyDRMProtectSmoothStreaming = array();
	public $buyDRMProtectCupertinoStreaming = array();
	public $buyDRMProtectMpegDashStreaming = array();
	public $verimatrixProtectCupertinoStreaming = array();
	public $verimatrixCupertinoKeyServerIpAddress = "";
	public $verimatrixCupertinoKeyServerPort = array();
	public $verimatrixCupertinoVODPerSessionKeys = array();
	public $verimatrixProtectSmoothStreaming = array();
	public $verimatrixSmoothKeyServerIpAddress = "";
	public $verimatrixSmoothKeyServerPort = array();
	public function setURI(){
		$this->restURI = $baseURI."/drm";
	}
}
