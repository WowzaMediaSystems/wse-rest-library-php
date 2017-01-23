<?php
//
// This code and all components (c) Copyright 2006 - 2016, Wowza Media Systems, LLC. All rights reserved.
// This code is licensed pursuant to the Wowza Public License version 1.0, available at www.wowza.com/legal.
//
namespace Com\Wowza;

use Com\Wowza\Entities\Application\Helpers\Settings;

class Recording extends Wowza
{
    protected $recordName = "myStream";
    protected $instanceName = "_definst_";
    protected $recorderState = "Waiting for stream";
    protected $defaultRecorder = "true";
    protected $segmentationType = "None";
    protected $outputPath = "";
    protected $baseFile = "myrecord.mp4";
    protected $fileFormat = "MP4";
    protected $fileVersionDelegateName = "com.wowza.wms.livestreamrecord.manager.StreamRecorderFileVersionDelegate";
    protected $fileTemplate = "\${BaseFileName}_\${RecordingStartTime}_\${SegmentNumber}";
    protected $segmentDuration = "900000";
    protected $segmentSize = "10485760";
    protected $segmentSchedule = "0 * * * * *";
    protected $recordData = "true";
    protected $startOnKeyFrame = "true";
    protected $splitOnTcDiscontinuity = "false";
    protected $option = "Version existing file";
    protected $moveFirstVideoFrameToZero = "true";
    protected $currentSize = "0";
    protected $currentDuration = "0";
    protected $recordingStartTime = "";

    public function __construct(Settings $settings)
    {
        parent::__construct($settings);
        $this->restURI = $this->getHost() . "/servers/" . $this->getServerInstance() . "/vhosts/_defaultVHost_/applications/live/instances/_definst_/streamrecorders";
    }

    public function create(
        $recordName,
        $instanceName,
        $recorderState,
        $defaultRecorder,
        $segmentationType,
        $outputPath,
        $baseFile,
        $fileFormat,
        $fileVersionDelegateName,
        $fileTemplate,
        $segmentDuration,
        $segmentSize,
        $segmentSchedule,
        $recordData,
        $startOnKeyFrame,
        $splitOnTcDiscontinuity,
        $option,
        $moveFirstVideoFrameToZero,
        $currentSize,
        $currentDuration,
        $recordingStartTime
    ) {

        $this->recordName = $recordName;
        $this->instanceName = $instanceName;
        $this->recordName = $recorderState;
        $this->recordName = $defaultRecorder;
        $this->recordName = $segmentationType;
        $this->outputPath = $outputPath;
        $this->baseFile = $baseFile;
        $this->fileFormat = $fileFormat;
        $this->fileVersionDelegateName = $fileVersionDelegateName;
        $this->fileTemplate = $fileTemplate;
        $this->segmentDuration = $segmentDuration;
        $this->segmentSize = $segmentSize;
        $this->segmentSchedule = $segmentSchedule;
        $this->recordData = $recordData;
        $this->startOnKeyFrame = $startOnKeyFrame;
        $this->splitOnTcDiscontinuity = $splitOnTcDiscontinuity;
        $this->option = $option;
        $this->moveFirstVideoFrameToZero = $moveFirstVideoFrameToZero;
        $this->currentSize = $currentSize;
        $this->currentDuration = $currentDuration;
        $this->recordingStartTime = $recordingStartTime;

        $response = $this->sendRequest($this->preparePropertiesForRequest(self::class), []);

        return $response;
    }

    public function getAll()
    {
        $this->setNoParams();

        return $this->sendRequest($this->preparePropertiesForRequest(self::class), [], self::VERB_GET);
    }

    public function stop($recordName)
    {
        $this->restURI = $this->restURI . "/" . $recordName . "/actions/stopRecording";
        $this->setNoParams();

        return $this->sendRequest($this->preparePropertiesForRequest(self::class), [], self::VERB_PUT);
    }

    public function split($recordName)
    {
        $this->restURI = $this->restURI . "/" . $recordName . "/actions/splitRecording";
        $this->setNoParams();

        return $this->sendRequest($this->preparePropertiesForRequest(self::class), [], self::VERB_PUT);
    }

    private function setNoParams()
    {
        $this->_skip["recordName"] = true;
        $this->_skip["instanceName"] = true;
        $this->_skip["recorderState"] = true;
        $this->_skip["defaultRecorder"] = true;
        $this->_skip["segmentationType"] = true;
        $this->_skip["outputPath"] = true;
        $this->_skip["baseFile"] = true;
        $this->_skip["fileFormat"] = true;
        $this->_skip["fileVersionDelegateName"] = true;
        $this->_skip["fileTemplate"] = true;
        $this->_skip["segmentDuration"] = true;
        $this->_skip["segmentSize"] = true;
        $this->_skip["segmentSchedule"] = true;
        $this->_skip["recordData"] = true;
        $this->_skip["startOnKeyFrame"] = true;
        $this->_skip["splitOnTcDiscontinuity"] = true;
        $this->_skip["option"] = true;
        $this->_skip["moveFirstVideoFrameToZero"] = true;
        $this->_skip["currentSize"] = true;
        $this->_skip["currentDuration"] = true;
        $this->_skip["recordingStartTime"] = true;
    }
}
