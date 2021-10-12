<?php
//
// This code and all components (c) Copyright 2006 - 2018, Wowza Media Systems, LLC. All rights reserved.
// This code is licensed pursuant to the Wowza Public License version 1.0, available at www.wowza.com/legal.
//

namespace Com\Wowza;

use Com\Wowza\Entities\Application\Helpers\Settings;

class StreamTarget extends Wowza
{
    protected $sourceStreamName = 'myStream';
    protected $entryName = 'ppsource';
    protected $profile = 'rtmp';
    protected $host = 'localhost';
    protected $application = 'live';
    protected $userName = null;
    protected $password = null;
    protected $streamName = 'myStream';
    protected $appName;
    protected $port = 1935;

    public function __construct(Settings $settings, $appName)
    {
        parent::__construct($settings);
        $this->appName = $appName;
    }

    public function create(
        $sourceStreamName = null,
        $entryName = null,
        $profile = null,
        $host = null,
        $userName = null,
        $password = null,
        $streamName = null,
        $application = null,
        $port = null
    ) {
        $this->restURI = $this->getRestURI() . '/' . $entryName;
        $this->sourceStreamName = (!is_null($sourceStreamName)) ? $sourceStreamName : $this->sourceStreamName;
        $this->entryName = (!is_null($entryName)) ? $entryName : $this->entryName;
        $this->profile = (!is_null($profile)) ? $profile : $this->profile;
        $this->host = (!is_null($host)) ? $host : $this->host;
        $this->userName = (!is_null($userName)) ? $userName : $this->userName;
        $this->password = (!is_null($password)) ? $password : $this->password;
        $this->streamName = (!is_null($streamName)) ? $streamName : $this->streamName;
        $this->application = (!is_null($application)) ? $application : $this->application;
        $this->port = (!is_null($port)) ? (int)$port : $this->port;

        $response = $this->sendRequest($this->preparePropertiesForRequest(self::class), []);

        return $response;
    }

    public function update(
        $sourceStreamName = null,
        $entryName = null,
        $profile = null,
        $host = null,
        $userName = null,
        $password = null,
        $streamName = null,
        $application = null,
        $port = null
    ) {
        $this->restURI = $this->getRestURI() . "/" . $entryName;
        $this->sourceStreamName = (!is_null($sourceStreamName)) ? $sourceStreamName : $this->sourceStreamName;
        $this->entryName = (!is_null($entryName)) ? $entryName : $this->entryName;
        $this->profile = (!is_null($profile)) ? $profile : $this->profile;
        $this->host = (!is_null($host)) ? $host : $this->host;
        $this->userName = (!is_null($userName)) ? $userName : $this->userName;
        $this->password = (!is_null($password)) ? $password : $this->password;
        $this->streamName = (!is_null($streamName)) ? $streamName : $this->streamName;
        $this->application = (!is_null($application)) ? $application : $this->application;
        $this->port = (!is_null($port)) ? (int)$port : $this->port;

        return $this->sendRequest($this->preparePropertiesForRequest(self::class), [], self::VERB_PUT);
    }

    public function getAll()
    {
        $this->setNoParams();
        $this->restURI = $this->getRestURI();

        return $this->sendRequest($this->preparePropertiesForRequest(self::class), [], self::VERB_GET);
    }

    private function setNoParams()
    {
        $this->addSkipParameter('userName', true)//todo: correct key name?
        ->addSkipParameter('password', true)
            ->addSkipParameter('group', true)
            ->addSkipParameter('sourceStreamName', true)
            ->addSkipParameter('entryName', true)
            ->addSkipParameter('profile', true)
            ->addSkipParameter('host', true)
            ->addSkipParameter('application', true)
            ->addSkipParameter('streamName', true);
    }

    public function remove($entryName)
    {
        $this->setNoParams();
        $this->restURI = $this->getRestURI() . '/' . $entryName;

        return $this->sendRequest($this->preparePropertiesForRequest(self::class), [], self::VERB_DELETE);
    }

    protected function getRestURI()
    {
        return $this->getHost() . '/servers/' . $this->getServerInstance() . '/vhosts/' . $this->getVHostInstance() . '/applications/' . $this->appName . '/pushpublish/mapentries';
    }
}
