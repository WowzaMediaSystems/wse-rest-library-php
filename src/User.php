<?php
//
// This code and all components (c) Copyright 2006 - 2018, Wowza Media Systems, LLC. All rights reserved.
// This code is licensed pursuant to the Wowza Public License version 1.0, available at www.wowza.com/legal.
//

namespace Com\Wowza;

use Com\Wowza\Entities\Application\Helpers\Settings;

class User extends Wowza
{
    protected $userName = '';
    protected $password = '';
    protected $groups = [];

    public function __construct(Settings $settings, $userName = null)
    {
        parent::__construct($settings);
        $this->userName = $userName;
        $this->restURI = $this->getHost() . '/servers/' . $this->getServerInstance() . '/users';
    }

    public function create($password, $group = [])
    {
        $this->password = $password;
        $this->groups = $group;
        $response = $this->sendRequest($this->preparePropertiesForRequest(self::class), []);

        return $response;
    }

    public function getAll()
    {
        $this->addSkipParameter('userName', true) //todo: is this key correct??
            ->addSkipParameter('password', true)
            ->addSkipParameter('group', true);

        return $this->sendRequest($this->preparePropertiesForRequest(self::class), [], self::VERB_GET);
    }

    public function remove()
    {
        $this->restURI = $this->restURI . '/' . $this->userName;

        return $this->sendRequest($this->preparePropertiesForRequest(self::class), [], self::VERB_DELETE);
    }
}
