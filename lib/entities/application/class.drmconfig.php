<?php
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
