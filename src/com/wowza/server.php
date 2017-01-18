<?php
//
// This code and all components (c) Copyright 2006 - 2016, Wowza Media Systems, LLC. All rights reserved.
// This code is licensed pursuant to the Wowza Public License version 1.0, available at www.wowza.com/legal.
//

namespace com\wowza;

use com\wowza\entities\application\helpers\Settings;

class Server extends Wowza
{
    private $restURI = "";

    public function __construct(
        Settings $settings
    ) {
        parent::__construct($settings);
        $this->restURI = "{$settings->getHost()}/servers/{$settings->getServerInstance()}";
    }

    public function getUsers()
    {
        $this->restURI .= "/users";
        $entities = $this->getEntites([], $this->restURI);

        return $this->sendRequest($this->preparePropertiesForRequest(), [], self::VERB_GET);
    }

    public function createUser($name, $password, $groups = [])
    {
        $this->restURI .= "/users/{$name}";
        $this->_additional["name"] = $name;
        $this->_additional["password"] = $password;
        $this->_additional["groups"] = $groups;
        $entities = $this->getEntites([], $this->restURI);

        return $this->sendRequest($this->preparePropertiesForRequest(), []);
    }

    public function removeUser($name)
    {
        $this->restURI .= "/users/{$name}";

        return $this->sendRequest($this->preparePropertiesForRequest(), [], self::VERB_DELETE);
    }

    public function getRestURI()
    {
        return $this->restURI;
    }
}
