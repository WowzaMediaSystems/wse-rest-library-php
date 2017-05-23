<?php
//
// This code and all components (c) Copyright 2006 - 2016, Wowza Media Systems, LLC. All rights reserved.
// This code is licensed pursuant to the Wowza Public License version 1.0, available at www.wowza.com/legal.
//
namespace com\wowza\entities\application; 
use com\wowza\entities\application\helpers\AdvancedSettingItem;
class AdvancedSettings extends \com\wowza\entities\Entity{
	public $advancedSettings = array();

	public function __construct(){}

	public function getAdvItem($name, $value, $type, $enabled="true", $canRemove="true", $defaultValue=null, 
			$sectionName="Common", $section=null, $documented="true"){  
		
		$adv = new AdvancedSettingItem();
		$adv->enabled = $enabled;
		$adv->canRemove = $canRemove;
		$adv->name = $name;
		$adv->value = $value;
		$adv->defaultValue = $defaultValue;
		$adv->type = $type;
		$adv->sectionName = $sectionName;
		$adv->section = $section;
		$adv->documented =$documented;
		return $adv;
	}

	public function setURI($baseURI){
		$this->restURI = $baseURI."/adv";
	}
}
