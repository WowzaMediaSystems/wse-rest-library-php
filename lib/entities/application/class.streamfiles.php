<?php
namespace com\wowza\entities\application;
class StreamFiles extends \com\wowza\entities\Entity{
	public $id = "";
	public $href = "";
	public function setURI($baseURI){
		$this->restURI = null;
	}
}