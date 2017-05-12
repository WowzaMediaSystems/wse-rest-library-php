<?php
//
// This code and all components (c) Copyright 2006 - 2016, Wowza Media Systems, LLC. All rights reserved.
// This code is licensed pursuant to the Wowza Public License version 1.0, available at www.wowza.com/legal.
//
namespace com\wowza\entities\application;
class TranscoderConfig extends \com\wowza\entities\Entity{
    public $available = true;
    public $liveStreamTranscoder = "transcoder";
    public $Templates = "\$\{SourceStreamName\}\.xml,transrate\.xml";
    public $profileDir = "\$\{com\.wowza\.wms\.context\.VHostConfigHome\}/transcoder/profiles";
    public $templateDir = "\$\{com\.wowza\.wms\.context\.VHostConfigHome\}/transcoder/templates";
    public $createTemplateDir = true;
    public function setURI($baseURI){
        $this->restURI = $baseURI."/transcoder";
    }
}

