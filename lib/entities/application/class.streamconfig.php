<?php
namespace com\wowza\entities\application;

class StreamConfig extends \com\wowza\entities\Entity{ 
	public $streamType = "live"; 
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