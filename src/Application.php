<?php
//
// This code and all components (c) Copyright 2006 - 2018, Wowza Media Systems, LLC. All rights reserved.
// This code is licensed pursuant to the Wowza Public License version 1.0, available at www.wowza.com/legal.
//
namespace Com\Wowza;

use Com\Wowza\Entities\Application\Helpers\Settings;

class Application extends Wowza
{
    protected $appType = 'Live';
    protected $name = '';
    protected $clientStreamReadAccess = '*';
    protected $clientStreamWriteAccess = '*';
    protected $description = '';

    public function __construct(
        Settings $settings,
        $name = 'live',
        $appType = 'Live',
        $clientStreamReadAccess = '*',
        $clientStreamWriteAccess = '*',
        $description = '*'
    ) {
        parent::__construct($settings);
        $this->name = $name;
        $this->appType = $appType;
        $this->clientStreamReadAccess = $clientStreamReadAccess;
        $this->clientStreamWriteAccess = $clientStreamWriteAccess;
        $this->description = $description;
        $this->restURI = $this->getHost() . '/servers/' . $this->getServerInstance() . '/vhosts/' . $this->getVHostInstance() . "/applications/{$name}";
    }

    private function setParameters()
    {
        $this->addSkipParameter('name', true)
            ->addSkipParameter('clientStreamReadAccess', true)
            ->addSkipParameter('appType', true)
            ->addSkipParameter('clientStreamWriteAccess', true)
            ->addSkipParameter('description', true);
    }

    public function get()
    {
        $this->setParameters();

        $this->restURI = $this->getHost() . '/servers/' . $this->getServerInstance() . '/vhosts/' . $this->getVHostInstance() . "/applications/{$this->name}";

        return $this->sendRequest($this->preparePropertiesForRequest(self::class), [], self::VERB_GET);
    }

    public function getAdvanced()
    {
        $this->setParameters();

        $this->restURI = $this->getHost() . '/servers/' . $this->getServerInstance() . '/vhosts/' . $this->getVHostInstance() . "/applications/{$this->name}/adv";

        return $this->sendRequest($this->preparePropertiesForRequest(self::class), [], self::VERB_GET);
    }

    public function getAll()
    {
        $this->setParameters();

        $this->restURI = $this->getHost() . '/servers/' . $this->getServerInstance() . '/vhosts/' . $this->getVHostInstance() . '/applications';

        return $this->sendRequest($this->preparePropertiesForRequest(self::class), [], self::VERB_GET);
    }

    public function create(
        Entities\Application\StreamConfig $streamConfig,
        Entities\Application\SecurityConfig $securityConfig = null,
        Entities\Application\Modules $modules = null,
        Entities\Application\DvrConfig $dvrConfig = null,
        Entities\Application\TranscoderConfig $transConfig = null,
        Entities\Application\DrmConfig $drmConfig = null
    ) {
        $this->restURI = $this->getHost() . '/servers/' . $this->getServerInstance() . '/vhosts/' . $this->getVHostInstance() . "/applications/{$this->name}";

        $entities = $this->getEntites(func_get_args(), $this->restURI);

        return $this->sendRequest($this->preparePropertiesForRequest(self::class), $entities);
    }

    public function update(
        Entities\Application\StreamConfig $streamConfig,
        Entities\Application\SecurityConfig $securityConfig = null,
        Entities\Application\Modules $modules = null,
        Entities\Application\DvrConfig $dvrConfig = null,
        Entities\Application\TranscoderConfig $transConfig = null,
        Entities\Application\DrmConfig $drmConfig = null
    ) {
        $this->restURI = $this->getHost() . '/servers/' . $this->getServerInstance() . '/vhosts/' . $this->getVHostInstance() . "/applications/{$this->name}";

        $entities = $this->getEntites(func_get_args(), $this->restURI);

        return $this->sendRequest($this->preparePropertiesForRequest(self::class), $entities, self::VERB_PUT);
    }

    public function updateAdvanced(
        Entities\Application\AdvancedSettings $advancedSettings = null,
        Entities\Application\Modules $modules = null
    ) {
        $this->restURI = $this->getHost() . '/servers/' . $this->getServerInstance() . '/vhosts/' . $this->getVHostInstance() . "/applications/{$this->name}";

        $entities = $this->getEntites(null, $this->restURI);
        $props = new \stdClass();
        $props->advancedSettings = $advancedSettings->advancedSettings;
        $props->modules = $modules->moduleList;
        $props->restURI = $this->restURI . '/adv';

        return $this->sendRequest($props, $entities, self::VERB_PUT);
    }

    public function remove()
    {
        return $this->sendRequest($this->preparePropertiesForRequest(self::class), [], self::VERB_DELETE);
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
