<?php
//
// This code and all components (c) Copyright 2006 - 2016, Wowza Media Systems, LLC. All rights reserved.
// This code is licensed pursuant to the Wowza Public License version 1.0, available at www.wowza.com/legal.
//
namespace Com\Wowza\Entities\Application;

use Com\Wowza\Entities\Entity;

class DvrConfig extends Entity
{
    public $licenseType = "Monthly";
    public $inUse = false;
    public $dvrEnable = false;
    public $windowDuration = 0;
    public $storageDir = "\$\{com\.wowza\.wms\.context\.VHostConfigHome\}/dvr";
    public $archiveStrategy = "append";
    public $dvrOnlyStreaming = false;
    public $startRecordingOnStartup = false;
    public $dvrEncryptionSharedSecret = "";
    public $dvrMediaCacheEnabled = false;
    public $httpRandomizeMediaName = false;

    public function setURI($baseURI)
    {
        $this->restURI = $baseURI . "/dvr";
    }
}
