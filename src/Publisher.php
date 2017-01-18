<?php
//
// This code and all components (c) Copyright 2006 - 2016, Wowza Media Systems, LLC. All rights reserved.
// This code is licensed pursuant to the Wowza Public License version 1.0, available at www.wowza.com/legal.
//
namespace Com\Wowza;

use Com\Wowza\Entities\Application\Helpers\Settings;

class Publisher extends Wowza
{
    private $name = "";
    private $password = "";

    public function __construct(Settings $settings, $publisherName = null)
    {
        parent::__construct($settings);
        $this->name = $publisherName;
        $this->restURI = $this->getHost() . "/servers/" . $this->getServerInstance() . "/publishers";
    }

    public function create($password)
    {
        $this->password = $password;
        $response = $this->sendRequest($this->preparePropertiesForRequest($this), []);

        return $response;
    }

    public function getAll()
    {
        $this->_skip["name"] = true;
        $this->_skip["password"] = true;

        return $this->sendRequest($this->preparePropertiesForRequest($this), [], self::VERB_GET);
    }

    public function remove()
    {
        $this->restURI = $this->restURI . "/" . $this->name;

        return $this->sendRequest($this->preparePropertiesForRequest($this), [], self::VERB_DELETE);
    }

    protected function getAdvancedSettings($urlProps)
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
}
