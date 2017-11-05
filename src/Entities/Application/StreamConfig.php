<?php
//
// This code and all components (c) Copyright 2006 - 2016, Wowza Media Systems, LLC. All rights reserved.
// This code is licensed pursuant to the Wowza Public License version 1.0, available at www.wowza.com/legal.
//
namespace Com\Wowza\Entities\Application;

use Com\Wowza\Entities\Entity;

class StreamConfig extends Entity
{
    public $streamType = "live";
    public $liveStreamPacketizer = [];

    public function __construct()
    {
        $this->liveStreamPacketizer[] = "cupertinostreamingpacketizer";
        $this->liveStreamPacketizer[] = "smoothstreamingpacketizer";
        $this->liveStreamPacketizer[] = "sanjosestreamingpacketizer";
    }

    public function setURI($baseURI)
    {
        $this->restURI = $baseURI . "/streamconfiguration";
    }

    /**
     * Get StreamType.
     *
     * @return string
     */
    public function getStreamType()
    {
        return $this->streamType;
    }

    /**
     * Set StreamType.
     *
     * @param string $streamType
     *
     * @return StreamConfig
     */
    public function setStreamType($streamType)
    {
        $this->streamType = $streamType;

        return $this;
    }

    /**
     * Get LiveStreamPacketizer.
     *
     * @return array
     */
    public function getLiveStreamPacketizer()
    {
        return $this->liveStreamPacketizer;
    }

    /**
     * Set LiveStreamPacketizer.
     *
     * @param array $liveStreamPacketizer
     *
     * @return StreamConfig
     */
    public function setLiveStreamPacketizer($liveStreamPacketizer)
    {
        $this->liveStreamPacketizer = $liveStreamPacketizer;

        return $this;
    }
}
