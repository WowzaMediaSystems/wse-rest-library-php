<?php
//
// This code and all components (c) Copyright 2006 - 2018, Wowza Media Systems, LLC. All rights reserved.
// This code is licensed pursuant to the Wowza Public License version 1.0, available at www.wowza.com/legal.
//
namespace Com\Wowza\Entities\Application\Helpers;

class Settings
{
    /** @var bool */
    private $debug;

    /** @var string */
    private $host;

    /** @var string */
    private $serverInstance;

    /** @var string */
    private $vhostInstance;

    /** @var string */
    private $username;

    /** @var string */
    private $password;

    /** @var bool */
    private $useDigest;

    /**
     * Settings constructor.
     *
     * @param bool   $debug
     * @param string $host
     * @param string $serverInstance
     * @param string $vhostInstance
     * @param string $username
     * @param string $password
     * @param bool   $useDigest
     */
    public function __construct(
        $debug = false,
        $host = 'http://localhost:8087/v2',
        $serverInstance = '_defaultServer_',
        $vhostInstance = '_defaultVHost_',
        $username = 'admin',
        $password = 'admin',
        $useDigest = false
    ) {
        $this->debug = $debug;
        $this->host = $host;
        $this->serverInstance = $serverInstance;
        $this->vhostInstance = $vhostInstance;
        $this->username = $username;
        $this->password = $password;
        $this->useDigest = $useDigest;
    }

    /**
     * Get Debug.
     *
     * @return bool
     */
    public function isDebug()
    {
        return $this->debug;
    }

    /**
     * Set Debug.
     *
     * @param bool $debug
     *
     * @return Settings
     */
    public function setDebug($debug)
    {
        $this->debug = $debug;

        return $this;
    }

    /**
     * Get Host.
     *
     * @return string
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * Set Host.
     *
     * @param string $host
     *
     * @return settings
     */
    public function setHost($host)
    {
        $this->host = $host;

        return $this;
    }

    /**
     * Get ServerInstance.
     *
     * @return string
     */
    public function getServerInstance()
    {
        return $this->serverInstance;
    }

    /**
     * Set ServerInstance.
     *
     * @param string $serverInstance
     *
     * @return settings
     */
    public function setServerInstance($serverInstance)
    {
        $this->serverInstance = $serverInstance;

        return $this;
    }

    /**
     * Get VhostInstance.
     *
     * @return string
     */
    public function getVhostInstance()
    {
        return $this->vhostInstance;
    }

    /**
     * Set VhostInstance.
     *
     * @param string $vhostInstance
     *
     * @return settings
     */
    public function setVhostInstance($vhostInstance)
    {
        $this->vhostInstance = $vhostInstance;

        return $this;
    }

    /**
     * Get Username.
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set Username.
     *
     * @param string $username
     *
     * @return settings
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get Password.
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set Password.
     *
     * @param string $password
     *
     * @return settings
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get UseDigest.
     *
     * @return bool
     */
    public function isUseDigest()
    {
        return $this->useDigest;
    }

    /**
     * Set UseDigest.
     *
     * @param bool $useDigest
     *
     * @return Settings
     */
    public function setUseDigest($useDigest)
    {
        $this->useDigest = $useDigest;

        return $this;
    }
}
