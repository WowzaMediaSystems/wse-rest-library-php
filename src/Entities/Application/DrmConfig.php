<?php
//
// This code and all components (c) Copyright 2006 - 2016, Wowza Media Systems, LLC. All rights reserved.
// This code is licensed pursuant to the Wowza Public License version 1.0, available at www.wowza.com/legal.
//
namespace Com\Wowza\Entities\Application;

use Com\Wowza\Entities\Entity;

class DrmConfig extends Entity
{
    public $licenseType = "Monthly";
    public $inUse = false;
    public $cupertinoEncryptionAPIBased = [];
    public $ezDRMUsername = "";
    public $ezDRMPassword = "";
    public $buyDRMUserKey = "";
    public $buyDRMProtectSmoothStreaming = false;
    public $buyDRMProtectCupertinoStreaming = false;
    public $buyDRMProtectMpegDashStreaming = false;
    public $verimatrixProtectCupertinoStreaming = false;
    public $verimatrixCupertinoKeyServerIpAddress = "";
    public $verimatrixCupertinoKeyServerPort = 0;
    public $verimatrixCupertinoVODPerSessionKeys = false;
    public $verimatrixProtectSmoothStreaming = false;
    public $verimatrixSmoothKeyServerIpAddress = "";
    public $verimatrixSmoothKeyServerPort = 0;

    public function setURI($baseURI)
    {
        $this->restURI = $baseURI . "/drm";
    }
}
