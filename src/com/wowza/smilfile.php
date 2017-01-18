<?php
//
// This code and all components (c) Copyright 2006 - 2016, Wowza Media Systems, LLC. All rights reserved.
// This code is licensed pursuant to the Wowza Public License version 1.0, available at www.wowza.com/legal.
//

namespace com\wowza;

use com\wowza\entities\application\helpers\Settings;

class SmilFile extends Wowza
{
    private $restURI = "";
    private $smilStreams = [];

    public function __construct(Settings $settings, $appName)
    {
        parent::__construct($settings);
        $this->restURI = $this->getHost() . "/servers/" . $this->getServerInstance() . "/vhosts/" . $this->getVHostInstance() . "/applications/" . $appName . "/smilfiles";
    }

    public function create($fileName, $streams)
    {
        $this->restURI = $this->restURI . "/" . $fileName;
        $this->smilStreams = $streams;

        $response = $this->sendRequest($this->preparePropertiesForRequest(), []);

        return $response;
    }

    public function getAll()
    {
        $this->_skip["smilStreams"] = true;

        return $this->sendRequest($this->preparePropertiesForRequest(), [], self::VERB_GET);
    }

    public function remove($fileName)
    {
        $this->_skip["smilStreams"] = true;
        $this->restURI = $this->restURI . "/" . $fileName;

        return $this->sendRequest($this->preparePropertiesForRequest(), [], self::VERB_DELETE);
    }

}
