<?php
//
// This code and all components (c) Copyright 2006 - 2018, Wowza Media Systems, LLC. All rights reserved.
// This code is licensed pursuant to the Wowza Public License version 1.0, available at www.wowza.com/legal.
//

namespace Com\Wowza;

use Com\Wowza\Entities\Application\Helpers\Settings;

class SmilFile extends Wowza
{
    protected $smilStreams = [];

    public function __construct(Settings $settings, $appName)
    {
        parent::__construct($settings);
        $this->restURI = $this->getHost() . '/servers/' . $this->getServerInstance() . '/vhosts/' . $this->getVHostInstance() . '/applications/' . $appName . '/smilfiles';
    }

    public function create($fileName, $streams)
    {
        $this->restURI = $this->restURI . '/' . $fileName;
        $this->smilStreams = $streams;

        $response = $this->sendRequest($this->preparePropertiesForRequest(self::class), []);

        return $response;
    }

    public function get($fileName)
    {
        $this->addSkipParameter('smilStreams', true);
        $this->restURI = $this->restURI . '/' . $fileName;

        return $this->sendRequest($this->preparePropertiesForRequest(self::class), [], self::VERB_GET);
    }

    public function getAll()
    {
        $this->addSkipParameter('smilStreams', true);

        return $this->sendRequest($this->preparePropertiesForRequest(self::class), [], self::VERB_GET);
    }

    public function remove($fileName)
    {
        $this->addSkipParameter('smilStreams', true);
        $this->restURI = $this->restURI . '/' . $fileName;

        return $this->sendRequest($this->preparePropertiesForRequest(self::class), [], self::VERB_DELETE);
    }
}
