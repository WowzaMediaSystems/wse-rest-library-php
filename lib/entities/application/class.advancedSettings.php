<?php
//
// This code and all components (c) Copyright 2006 - 2016, Wowza Media Systems, LLC. All rights reserved.
// This code is licensed pursuant to the Wowza Public License version 1.0, available at www.wowza.com/legal.
//
namespace com\wowza\entities\application;
class AdvancedSettings extends \com\wowza\entities\Entity{
	public $advancedSettings = array();
	public function setURI($baseURI){
		$this->restURI = null;
	}
}
