<?php
//
// This code and all components (c) Copyright 2006 - 2016, Wowza Media Systems, LLC. All rights reserved.
// This code is licensed pursuant to the Wowza Public License version 1.0, available at www.wowza.com/legal.
//
namespace com\wowza\entities\application;

class StreamConfig extends \com\wowza\entities\Entity{
    public $streamType = "live";
    public $httpRandomizeMediaName = false;
	public $liveStreamPacketizer = array();

	public function __construct(){
		$this->liveStreamPacketizer[] ="cupertinostreamingpacketizer";
		$this->liveStreamPacketizer[] ="smoothstreamingpacketizer";
		$this->liveStreamPacketizer[] ="sanjosestreamingpacketizer";
	}

	public function setURI($baseURI){
		$this->restURI = $baseURI."/streamconfiguration";
	}
}
