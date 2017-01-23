<?php
//
// This code and all components (c) Copyright 2006 - 2016, Wowza Media Systems, LLC. All rights reserved.
// This code is licensed pursuant to the Wowza Public License version 1.0, available at www.wowza.com/legal.
//

namespace Com\Wowza;

use Com\Wowza\Entities\Application\Helpers\Settings;

class StreamTarget extends Wowza
{
    protected $sourceStreamName = "myStream";
    protected $entryName = "ppsource";
    protected $profile = "rtmp";
    protected $host = "localhost";
    protected $application = "live";
    protected $userName = null;
    protected $password = null;
    protected $streamName = "myStream";

    public function __construct(Settings $settings, $appName)
    {
        parent::__construct($settings);
        $this->restURI = $this->getHost() . "/servers/" . $this->getServerInstance() . "/vhosts/" . $this->getVHostInstance() . "/applications/" . $appName . "/pushpublish/mapentries";
    }

    public function create(
        $sourceStreamName = null,
        $entryName = null,
        $profile = null,
        $host = null,
        $userName = null,
        $password = null,
        $streamName = null
    ) {
        $this->restURI = $this->restURI . "/" . $entryName;
        $this->sourceStreamName = (!is_null($sourceStreamName)) ? $sourceStreamName : $this->sourceStreamName;
        $this->entryName = (!is_null($entryName)) ? $entryName : $this->entryName;
        $this->profile = (!is_null($profile)) ? $profile : $this->profile;
        $this->host = (!is_null($host)) ? $host : $this->host;
        $this->userName = (!is_null($userName)) ? $userName : $this->userName;
        $this->password = (!is_null($password)) ? $password : $this->password;
        $this->streamName = (!is_null($streamName)) ? $streamName : $this->streamName;

        $response = $this->sendRequest($this->preparePropertiesForRequest(self::class), []);

        return $response;
    }

    public function getAll()
    {
        $this->setNoParams();

        return $this->sendRequest($this->preparePropertiesForRequest(self::class), [], self::VERB_GET);
    }

    private function setNoParams()
    {
        $this->_skip["userName"] = true;
        $this->_skip["password"] = true;
        $this->_skip["group"] = true;
        $this->_skip["sourceStreamName"] = true;
        $this->_skip["entryName"] = true;
        $this->_skip["profile"] = true;
        $this->_skip["host"] = true;
        $this->_skip["application"] = true;
        $this->_skip["userName"] = true;
        $this->_skip["password"] = true;
        $this->_skip["streamName"] = true;
    }

    public function remove($entryName)
    {
        $this->setNoParams();
        $this->restURI = $this->restURI . "/" . $entryName;

        return $this->sendRequest($this->preparePropertiesForRequest(self::class), [], self::VERB_DELETE);
    }
}
