<?php
//
// This code and all components (c) Copyright 2006 - 2018, Wowza Media Systems, LLC. All rights reserved.
// This code is licensed pursuant to the Wowza Public License version 1.0, available at www.wowza.com/legal.
//
namespace Com\Wowza;

use Com\Wowza\Entities\Application\Helpers\Settings;

class DvrClipExtraction extends Wowza
{
    public function __construct(Settings $settings, $appName, $appInstance = '_definst_')
    {
        parent::__construct($settings);
        $this->restURI = $this->getHost() . '/servers/' . $this->getServerInstance() . '/vhosts/' . $this->getVHostInstance() . "/applications/{$appName}/instances/{$appInstance}/dvrstores";
    }

    public function create()
    {
        $response = $this->sendRequest($this->preparePropertiesForRequest(self::class), []);

        return $response;
    }

    public function getItem($name)
    {
        $this->restURI = $this->restURI . '/' . $name;

        return $this->sendRequest($this->preparePropertiesForRequest(self::class), [], self::VERB_GET);
    }

    public function convertGroup($nameArr)
    {
        $this->restURI = $this->restURI . '/actions/convert?dvrConverterStoreList=' . implode(',', $nameArr);

        return $this->sendRequest($this->preparePropertiesForRequest(self::class), [], self::VERB_PUT);
    }

    /*
     * /// query params
     * dvrConverterStartTime=[unix timestamp]
     * dvrConverterEndTime=[unix-timestamp]
     * dvrConverterOutputFilename=[outputfilename]
     *
     * @param $startTime
     * @param $endTime
     * @param $outputFileName
     */
    public function convert($name, $startTime = null, $endTime = null, $outputFileName = null)
    {
        $query = '';
        if (!is_null($startTime)) {
            $query .= 'dvrConverterStartTime=' . $startTime;
        }
        if (!is_null($endTime)) {
            if (!empty($query)) {
                $query .= '&';
            }
            $query .= 'dvrConverterEndTime=' . $endTime;
        }
        if (!is_null($outputFileName)) {
            if (!empty($query)) {
                $query .= '&';
            }
            $query .= 'dvrConverterOutputFilename=' . $outputFileName;
        }
        $query = (strlen($query) == 0) ? '' : '?' . $query;

        $this->restURI = $this->restURI . "/{$name}/actions/convert{$query}";

        return $this->sendRequest($this->preparePropertiesForRequest(self::class), [], self::VERB_PUT);
    }

    public function clearCache()
    {
        $this->restURI = $this->restURI . '/actions/expire';

        return $this->sendRequest($this->preparePropertiesForRequest(self::class), [], self::VERB_PUT);
    }

    public function debugConversions($name)
    {
        $this->restURI = $this->restURI . "/{$name}/actions/convert?dvrConverterDebugConversions=true";

        return $this->sendRequest($this->preparePropertiesForRequest(self::class), [], self::VERB_PUT);
    }

    /*
     * dvrConverterDuration=[milliseconds]
     */
    public function convertByDurationWithStartTime($name, $startTime, $duration, $outputFileName = null)
    {
        $query = '';
        if (!is_null($startTime)) {
            $query .= 'dvrConverterStartTime=' . $startTime;
        }
        if (!is_null($duration)) {
            if (!empty($query)) {
                $query .= '&';
            }
            $query .= 'dvrConverterDuration=' . $duration;
        }
        if (!is_null($outputFileName)) {
            if (!empty($query)) {
                $query .= '&';
            }
            $query .= 'dvrConverterOutputFilename=' . $outputFileName;
        }
        $query = (strlen($query) == 1) ? '' : '?' . $query;
        $this->restURI = $this->restURI . "/{$name}/actions/convert{$query}";

        return $this->sendRequest($this->preparePropertiesForRequest(self::class), [], self::VERB_PUT);
    }

    public function convertByDurationWithEndTimeTime($name, $endTime, $duration, $outputFileName = null)
    {
        $query = '';
        if (!is_null($endTime)) {
            $query .= 'dvrConverterEndTime=' . $endTime;
        }
        if (!is_null($duration)) {
            if (!empty($query)) {
                $query .= '&';
            }
            $query .= 'dvrConverterDuration=' . $duration;
        }
        if (!is_null($outputFileName)) {
            if (!empty($query)) {
                $query .= '&';
            }
            $query .= 'dvrConverterOutputFilename=' . $outputFileName;
        }
        $query = (strlen($query) == 1) ? '' : '?' . $query;
        $this->restURI = $this->restURI . "/{$name}/actions/convert{$query}";

        return $this->sendRequest($this->preparePropertiesForRequest(self::class), [], self::VERB_PUT);
    }

    public function getAll()
    {
        return $this->sendRequest($this->preparePropertiesForRequest(self::class), [], self::VERB_GET);
    }

    public function remove($fileName)
    {
        $this->restURI = $this->restURI . '/' . $fileName;

        return $this->sendRequest($this->preparePropertiesForRequest(self::class), [], self::VERB_DELETE);
    }
}
