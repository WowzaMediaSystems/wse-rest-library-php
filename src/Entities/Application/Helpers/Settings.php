<?php

namespace Com\Wowza\Entities\Application\Helpers;

use Symfony\Component\Yaml\Yaml;
use Symfony\Component\Yaml\Exception\ParseException;

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
     * @param string $configFilePath Absolute path of file
     * @param bool   $debug
     * @throw \RuntimeException 
     */
    public function __construct(string $configFilePath, bool $debug = false) 
    {
        try {
            $config = Yaml::parse(file_get_contents($configFilePath));
        } catch (ParseException $exception) {
            throw $exception;
        }
        
        $this->debug = $debug;
        $this->host = isset($config['Host']) ? $config['Host'] : 'http://localhost:8087/v2';
        $this->serverInstance = isset($config['ServerInstance']) ? $config['ServerInstance'] : '_defaultServer_';
        $this->vhostInstance = isset($config['VHostInstance']) ? $config['VHostInstance'] : '_defaultServer_';
        $this->username = isset($config['UserName']) ? $config['UserName'] : 'admin';
        $this->password = isset($config['Password']) ? $config['Password'] : 'admin';
        $this->useDigest = isset($config['useDigest']) ? $config['useDigest'] : false;
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
