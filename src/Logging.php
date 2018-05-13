<?php
//
// This code and all components (c) Copyright 2006 - 2018, Wowza Media Systems, LLC. All rights reserved.
// This code is licensed pursuant to the Wowza Public License version 1.0, available at www.wowza.com/legal.
//
namespace Com\Wowza;

use Com\Wowza\Entities\Application\Helpers\Settings;

class Logging extends Wowza
{
    public function __construct(Settings $settings)
    {
        parent::__construct($settings);
        $this->restURI = $this->getHost() . '/servers/' . $this->getServerInstance() . '/logfiles';
    }

    public function getNewestFirst()
    {
        $this->restURI = $this->restURI . '?order=newestFirst';

        return $this->sendRequest($this->preparePropertiesForRequest(self::class), [], self::VERB_GET);
    }

    public function getLineCount($num)
    {
        $this->restURI = $this->restURI . "/wowzastreamingengine_access.log?lineCount={$num}";

        return $this->sendRequest($this->preparePropertiesForRequest(self::class), [], self::VERB_GET);
    }

    public function search($str)
    {
        $this->restURI = $this->restURI . '/wowzastreamingengine_access.log?search=' . $str;

        return $this->sendRequest($this->preparePropertiesForRequest(self::class), [], self::VERB_GET);
    }
}
