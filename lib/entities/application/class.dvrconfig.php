<?php
//
// This code and all components (c) Copyright 2006 - 2016, Wowza Media Systems, LLC. All rights reserved.
// This code is licensed pursuant to the Wowza Public License version 1.0, available at www.wowza.com/legal.
//
namespace com\wowza\entities\application;
class DvrConfig extends \com\wowza\entities\Entity{
	public $licenseType = "Monthly";
	public $inUse = array();
	public $dvrEnable = array();
	public $windowDuration = array();
	public $storageDir = "\$\{com\.wowza\.wms\.context\.VHostConfigHome\}/dvr";
	public $archiveStrategy = "append";
	public $dvrOnlyStreaming = array();
	public $startRecordingOnStartup = array();
	public $dvrEncryptionSharedSecret = "";
	public $dvrMediaCacheEnabled = array();
	public $httpRandomizeMediaName = array();
	public function setURI(){
		$this->restURI = $baseURI."/dvr";
	}
}
