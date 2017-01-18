<?php
//
// This code and all components (c) Copyright 2006 - 2016, Wowza Media Systems, LLC. All rights reserved.
// This code is licensed pursuant to the Wowza Public License version 1.0, available at www.wowza.com/legal.
//

namespace Com\Wowza;

use Com\Wowza\Entities\Application\Helpers\Settings;

class Statistics extends Wowza
{
    private $restURI = "";

    public function __construct(Settings $settings)
    {
        parent::__construct($settings);
    }

    public function getApplicationStatistics(Application $application)
    {
        $this->restURI = $application->getRestURI() . "/monitoring/current";

        return $this->sendRequest($this->preparePropertiesForRequest(), [], self::VERB_GET);
    }

    public function getApplicationStatisticsHistory(Application $application)
    {
        $this->restURI = $application->getRestURI() . "/monitoring/historic";

        return $this->sendRequest($this->preparePropertiesForRequest(), [], self::VERB_GET);
    }

    public function getIncomingApplicationStatistics(Application $application, $streamName, $appInstance = "_definst_")
    {
        $this->restURI = $application->getRestURI() . "/instances/{$appInstance}/incomingstreams/{$streamName}/monitoring/current";

        return $this->sendRequest($this->preparePropertiesForRequest(), [], self::VERB_GET);
    }

    public function getServerStatistics(Server $server)
    {
        $this->restURI = $server->getRestURI() . "/monitoring/historic";

        return $this->sendRequest($this->preparePropertiesForRequest(), [], self::VERB_GET);
    }


}
