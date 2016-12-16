//
// This code and all components (c) Copyright 2006 - 2016, Wowza Media Systems, LLC. All rights reserved.
// This code is licensed pursuant to the Wowza Public License version 1.0, available at www.wowza.com/legal.
//
<?php
namespace com\wowza\entities\application;
class TranscoderConfig extends \com\wowza\entities\Entity{
	public $available = array();
	public $licensed = array();
	public $licenses = array();
	public $licensesInUse = array();
	public $templates = array();
	public $templatesInUse = "\$\{SourceStreamName\}\.xml,transrate\.xml";
	public $profileDir = "\$\{com\.wowza\.wms\.context\.VHostConfigHome\}/transcoder/profiles";
	public $templateDir = "\$\{com\.wowza\.wms\.context\.VHostConfigHome\}/transcoder/templates";
	public $createTemplateDir = array();
	public function setURI(){
		$this->restURI = $baseURI."/transcoder";
	}
}
