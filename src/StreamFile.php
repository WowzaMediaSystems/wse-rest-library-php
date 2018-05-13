<?php
//
// This code and all components (c) Copyright 2006 - 2018, Wowza Media Systems, LLC. All rights reserved.
// This code is licensed pursuant to the Wowza Public License version 1.0, available at www.wowza.com/legal.
//

namespace Com\Wowza;

use Com\Wowza\Entities\Application\Helpers\Settings;

class StreamFile extends Wowza
{
    protected $name = '';

    // not included in json generated as indicated by _[varname]
    protected $_applicationName = 'live';
    protected $_mediaCasterType = 'rtp';
    protected $_applicationInstance = '_definst_';

    public function __construct(
        Settings $settings,
        $appName = null,
        $streamFileName = null
    ) {
        parent::__construct($settings);
        $this->restURI = $this->getHost() . '/servers/' . $this->getServerInstance() . '/vhosts/' . $this->getVHostInstance() . '/streamfiles';

        if (!is_null($appName)) {
            $this->_applicationName = $appName;
        }

        if (!is_null($streamFileName)) {
            $this->name = $streamFileName;
        }
    }

    public function get()
    {
        $this->addSkipParameter('name', true);
        $this->restURI .= '/' . $this->name;

        return $this->sendRequest($this->preparePropertiesForRequest(self::class), [], self::VERB_GET);
    }

    public function getAll()
    {
        $this->addSkipParameter('name', true);

        return $this->sendRequest($this->preparePropertiesForRequest(self::class), [], self::VERB_GET);
    }

    public function create($urlProps, $mediaCasterType = 'rtp', $applicationInstance = '_definst_')
    {
        $sf = new Entities\Application\StreamFiles();
        $sf->id = 'connectAppName=' . $this->_applicationName . "&appInstance={$applicationInstance}&mediaCasterType={$mediaCasterType}";
        $sf->href = $this->restURI . '/streamfiles/' . $sf->id;

        $entities = $this->getEntites([$sf], null);
        $this->restURI = $this->restURI . '/' . $this->name;
        $response = $this->sendRequest($this->preparePropertiesForRequest(self::class), $entities);
        if ($response->success) {
            $items = $this->getAdvancedSettings($urlProps);

            return $this->addURL($items);
        }

        return $response;
    }

    private function addURL($advancedSettings)
    {
        $this->addSkipParameter('name', 1);
        $this->restURI .= '/adv';
        $this->addAdditionalParameter('version', '1430601267443')
            ->addAdditionalParameter('advancedSettings', (array) $advancedSettings);

        return $this->sendRequest($this->preparePropertiesForRequest(self::class), [], self::VERB_PUT);
    }

    private function getAdvancedSettings($urlProps)
    {
        if (is_array($urlProps)) {
            $items = [];
            foreach ($urlProps as $k => $v) {
                $item = new Entities\Application\Helpers\AdvancedSettingItem();
                $item->name = $k;
                $item->value = $v;
                $items[] = $item;
            }

            return $items;
        } else {
            $item = new Entities\Application\Helpers\AdvancedSettingItem();
            $item->value = $urlProps;

            return $item;
        }
    }

    public function update($urlProps)
    {
        $this->restURI = $this->restURI . '/' . $this->name;
        $items = $this->getAdvancedSettings($urlProps);

        return $this->addURL($items);
    }

    public function remove()
    {
        $this->addSkipParameter('name', 1);
        $this->restURI = $this->restURI . '/' . $this->name;

        return $this->sendRequest($this->preparePropertiesForRequest(self::class), [], self::VERB_DELETE);
    }

    public function connect($subFolder = '')
    {
        $this->addSkipParameter('name', 1);
        // 		$this->_additional["connectAppName"]=$this->_applicationName;
        // 		$this->_additional["appInstance"]=$this->_applicationInstance;
        // 		$this->_additional["mediaCasterType"]=$this->_mediaCasterType;
        $streamFilePath = (!empty($subFolder)) ? urlencode($subFolder . '/' . $this->name) : $this->name;
        $this->restURI = $this->restURI . '/' . $streamFilePath . '/actions/connect';

        return $this->sendRequest($this->preparePropertiesForRequest(self::class), [], self::VERB_PUT,
            'connectAppName=' . $this->_applicationName . '&appInstance=' . $this->_applicationInstance . '&mediaCasterType=' . $this->_mediaCasterType);
    }

    public function disconnect()
    {
        /*
         * curl -X PUT --header 'Accept:application/json; charset=utf-8' --header 'Content-type:application/json; charset=utf-8'
         * "http://localhost:8087/v2/servers/_defaultServer_/vhosts/_defaultVHost_/applications/[YOUR-APP-NAME]/instances/_definst_/incomingstreams/[STREAM-FILE-NAME]/actions/disconnectStream"
         *
         *
         * "http:\/\/127.0.0.1:8087\/v2\/servers\/_defaultServer_\/vhosts\/_defaultVHost_\/applications\/live\/instances\/_definst_\/incomingstreams\/bolton_mass\/actions\/disconnectStream"
         */
        $this->addSkipParameter('name', 1);
        // 		$this->_additional["connectAppName"]=$this->_applicationName;
        // 		$this->_additional["appInstance"]=$this->_applicationInstance;
        // 		$this->_additional["mediaCasterType"]=$this->_mediaCasterType;

        $this->restURI = $this->getHost() . '/servers/' . $this->getServerInstance() . '/vhosts/' . $this->getVHostInstance() . '/applications/' . $this->_applicationName . '/instances/';
        $this->restURI .= $this->_applicationInstance . '/incomingstreams/' . $this->name . '.stream/actions/disconnectStream';

        return $this->sendRequest($this->preparePropertiesForRequest(self::class), [], self::VERB_PUT);
    }

    /**
     * Reset stream
     */
    public function reset()
    {
        /*
         * curl -X PUT --header 'Accept:application/json; charset=utf-8' --header 'Content-type:application/json; charset=utf-8'
         * "http://localhost:8087/v2/servers/_defaultServer_/vhosts/_defaultVHost_/applications/[YOUR-APP-NAME]/instances/_definst_/incomingstreams/[STREAM-FILE-NAME]/actions/resetStream"
         *
         *
         * "http:\/\/127.0.0.1:8087\/v2\/servers\/_defaultServer_\/vhosts\/_defaultVHost_\/applications\/live\/instances\/_definst_\/incomingstreams\/bolton_mass\/actions\/resetStream"
         */
        $this->addSkipParameter('name', 1);
        $this->restURI = $this->getHost() . '/servers/' . $this->getServerInstance() . '/vhosts/' . $this->getVHostInstance() . '/applications/' . $this->_applicationName . '/instances/';
        $this->restURI .= $this->_applicationInstance . '/incomingstreams/' . $this->name . '.stream/actions/resetStream';

        return $this->sendRequest($this->preparePropertiesForRequest(self::class), [], self::VERB_PUT);
    }
}
