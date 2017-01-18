<?php
//
// This code and all components (c) Copyright 2006 - 2016, Wowza Media Systems, LLC. All rights reserved.
// This code is licensed pursuant to the Wowza Public License version 1.0, available at www.wowza.com/legal.
//
namespace Com\Wowza;

use Com\Wowza\Entities\Application\Helpers\Settings;

class Application extends Wowza
{
    private $appType = "Live";
    private $name = "";
    private $clientStreamReadAccess = "*";
    private $clientStreamWriteAccess = "*";
    private $description = "";

    public function __construct(
        Settings $settings,
        $name = "live",
        $appType = "Live",
        $clientStreamReadAccess = "*",
        $clientStreamWriteAccess = "*",
        $description = "*"
    ) {
        parent::__construct($settings);
        $this->name = $name;
        $this->appType = $appType;
        $this->clientStreamReadAccess = $clientStreamReadAccess;
        $this->clientStreamWriteAccess = $clientStreamWriteAccess;
        $this->description = $description;
        $this->restURI = $this->getHost() . "/servers/" . $this->getServerInstance() . "/vhosts/" . $this->getVHostInstance() . "/applications/{$name}";
    }

    public function get()
    {
        $this->_skip["name"] = true;
        $this->_skip["clientStreamReadAccess"] = true;
        $this->_skip["appType"] = true;
        $this->_skip["clientStreamWriteAccess"] = true;
        $this->_skip["description"] = true;

        return $this->sendRequest($this->preparePropertiesForRequest(), [], self::VERB_GET);
    }

    public function getAll()
    {
        $this->_skip["name"] = true;
        $this->_skip["clientStreamReadAccess"] = true;
        $this->_skip["appType"] = true;
        $this->_skip["clientStreamWriteAccess"] = true;
        $this->_skip["description"] = true;
        $this->restURI = $this->getHost() . "/servers/" . $this->getServerInstance() . "/vhosts/" . $this->getVHostInstance() . "/applications";

        return $this->sendRequest($this->preparePropertiesForRequest(), [], self::VERB_GET);
    }

    public function create(
        Entities\Application\StreamConfig $streamConfig,
        Entities\Application\SecurityConfig $securityConfig = null,
        Entities\Application\Modules $modules = null,
        Entities\Application\DvrConfig $dvrConfig = null,
        Entities\Application\TranscoderConfig $transConfig = null,
        Entities\Application\DrmConfig $drmConfig = null
    ) {
        $entities = $this->getEntites(func_get_args(), $this->restURI);

        return $this->sendRequest($this->preparePropertiesForRequest(), $entities);
    }

    public function update(
        Entities\Application\StreamConfig $streamConfig,
        Entities\Application\SecurityConfig $securityConfig = null,
        Entities\Application\Modules $modules = null,
        Entities\Application\DvrConfig $dvrConfig = null,
        Entities\Application\TranscoderConfig $transConfig = null,
        Entities\Application\DrmConfig $drmConfig = null
    ) {
        $entities = $this->getEntites(func_get_args(), $this->restURI);

        return $this->sendRequest($this->preparePropertiesForRequest(), $entities, self::VERB_PUT);
    }

    public function remove()
    {
        return $this->sendRequest($this->preparePropertiesForRequest(), [], self::VERB_DELETE);
    }

    public function getRestURI()
    {
        return $this->restURI;
    }

    public function getName()
    {
        return $this->name;
    }
}
