<?php
//
// This code and all components (c) Copyright 2006 - 2016, Wowza Media Systems, LLC. All rights reserved.
// This code is licensed pursuant to the Wowza Public License version 1.0, available at www.wowza.com/legal.
//

namespace Com\Wowza\Entities\Application;

use Com\Wowza\Entities\Entity;

class TranscoderConfig extends Entity
{
    public $available = [];
    public $licensed = [];
    public $licenses = [];
    public $licensesInUse = [];
    public $templates = [];
    public $templatesInUse = "\$\{SourceStreamName\}\.xml,transrate\.xml";
    public $profileDir = "\$\{com\.wowza\.wms\.context\.VHostConfigHome\}/transcoder/profiles";
    public $templateDir = "\$\{com\.wowza\.wms\.context\.VHostConfigHome\}/transcoder/templates";
    public $createTemplateDir = [];

    public function setURI($baseURI)
    {
        $this->restURI = $baseURI . "/transcoder";
    }
}

