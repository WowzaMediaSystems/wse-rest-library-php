<?php
//
// This code and all components (c) Copyright 2006 - 2018, Wowza Media Systems, LLC. All rights reserved.
// This code is licensed pursuant to the Wowza Public License version 1.0, available at www.wowza.com/legal.
//

namespace Com\Wowza;

use Com\Wowza\Entities\Application\Helpers\Settings;

class Wowza
{
    const VERB_POST = 'POST';
    const VERB_GET = 'GET';
    const VERB_DELETE = 'DELETE';
    const VERB_PUT = 'PUT';

    protected $restURI = '';
    private $_skip = [];
    private $_additional = [];

    private $settings;

    public function __construct(Settings $settings)
    {
        $this->settings = $settings;
    }

    protected function getHost()
    {
        return $this->settings->getHost();
    }

    protected function getServerInstance()
    {
        return $this->settings->getServerInstance();
    }

    protected function getVHostInstance()
    {
        return $this->settings->getVhostInstance();
    }

    protected function getEntites($args, $baseURI)
    {
        $entities = [];
        $argsCount = count($args);

        for ($i = 0; $i < $argsCount; $i++) {
            $arg = $args[$i];
            if (!is_null($arg)) {
                if (is_null($arg->restURI)) {
                    if (is_null($baseURI)) {
                        unset($arg->restURI);
                    } else {
                        call_user_func_array([
                            $arg,
                            'setURI',
                        ], [
                            $baseURI,
                        ]);
                    }
                }
                $entities [] = $arg;
            }
        }

        return $entities;
    }

    protected function debug($str)
    {
        if ($this->settings->isDebug()) {
            if (!is_string($str)) {
                $str = json_encode($str);
            }
            echo $str . "\n";
        }
    }

    protected function sendRequest($props, $entities, $verbType = self::VERB_POST, $queryParams = null)
    {
        if (isset($props->restURI) && !empty($props->restURI)) {
            $entityCount = count($entities);
            if ($entityCount > 0) {
                for ($i = 0; $i < $entityCount; $i++) {
                    $entity = $entities[$i];
                    if (is_object($entity) && method_exists($entity, 'getEntityName')) {
                        $name = $entity->getEntityName();
                        $props->$name = $entity;
                    }
                }
            }
            $json = json_encode($props);

            $restURL = $props->restURI;
            if (null !== $queryParams) {
                $restURL .= '?' . $queryParams;
            }
            $this->debug("JSON REQUEST to {$restURL} with verb {$verbType}: " . $json);

            $ch = curl_init($restURL);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $verbType);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $json);

            if ($this->settings->isUseDigest()) {
                curl_setopt($ch, CURLOPT_USERPWD,
                    $this->settings->getUsername() . ':' . $this->settings->getPassword());
                curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_DIGEST);
            }

            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Accept:application/json; charset=utf-8',
                'Content-type:application/json; charset=utf-8',
                'Content-Length: ' . strlen($json),
            ]);
            $contents = curl_exec($ch);
            curl_close($ch);

            $this->debug('RETURN: ' . $contents);

            return json_decode($contents);
        }

        return false;
    }

    /**
     * @param $key
     * @param $value
     *
     * @return $this
     */
    public function addAdditionalParameter($key, $value)
    {
        $this->_additional[$key] = $value;

        return $this;
    }

    /**
     * @param $key
     * @param $value
     *
     * @return $this
     */
    public function addSkipParameter($key, $value)
    {
        $this->_skip[$key] = $value;

        return $this;
    }

    protected function preparePropertiesForRequest($class)
    {
        $classPropNames = get_class_vars($class);

        $props = new \stdClass();
        foreach ($classPropNames as $key => $val) {
            if (isset($this->$key)) {
                if (preg_match("/^(\_)/", $key)) {
                    continue;
                }
                if (array_key_exists($key, $this->_skip)) {
                    continue;
                }
                $props->$key = $this->$key;
            }
        }

        if (count($this->_additional) > 0) {
            foreach ($this->_additional as $key => $val) {
                $props->$key = $val;
            }
        }

        return $props;
    }
}
