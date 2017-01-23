<?php
//
// This code and all components (c) Copyright 2006 - 2016, Wowza Media Systems, LLC. All rights reserved.
// This code is licensed pursuant to the Wowza Public License version 1.0, available at www.wowza.com/legal.
//
namespace Com\Wowza\Entities\Application;

use Com\Wowza\Entities\Application\Helpers\ModuleItem;
use Com\Wowza\entities\Entity;

class Modules extends Entity
{
    public $moduleList = [];

    public function __construct()
    {
        $this->moduleList[] = $this->getModuleItem("base", "Base", "com.wowza.wms.module.ModuleCore");
        $this->moduleList[] = $this->getModuleItem("logging", "Client Logging",
            "com.wowza.wms.module.ModuleClientLogging");
        $this->moduleList[] = $this->getModuleItem("flvplayback", "FLVPlayback",
            "com.wowza.wms.module.ModuleFLVPlayback");
    }

    public function getModuleItem($name, $description, $class, $order = null)
    {
        if (is_null($order)) {
            $order = count($this->moduleList);
        }

        $mi = new ModuleItem();
        $mi->order = $order;
        $mi->name = $name;
        $mi->description = $description;
        $mi->class = $class;

        return $mi;
    }

    public function setURI($baseURI)
    {
        $this->restURI = $baseURI . "/streamconfiguration";
    }
}
