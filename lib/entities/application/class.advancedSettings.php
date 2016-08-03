<?php
namespace com\wowza\entities\application;
class AdvancedSettings extends \com\wowza\entities\Entity{ 
	public $advancedSettings = array();
	public function setURI($baseURI){
		$this->restURI = null;
	}
}