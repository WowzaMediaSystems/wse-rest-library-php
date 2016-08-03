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
