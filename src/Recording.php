<?php
//
// This code and all components (c) Copyright 2006 - 2018, Wowza Media Systems, LLC. All rights reserved.
// This code is licensed pursuant to the Wowza Public License version 1.0, available at www.wowza.com/legal.
//
namespace Com\Wowza;

use Com\Wowza\Entities\Application\Helpers\Settings;

class Recording extends Wowza
{
    protected $recorderName = 'myStream';
    protected $instanceName = '_definst_';
    protected $recorderState = 'Waiting for stream';
    protected $defaultRecorder = 'true';
    protected $segmentationType = 'None';
    protected $outputPath = '';
    protected $baseFile = 'myrecord.mp4';
    protected $fileFormat = 'MP4';
    protected $fileVersionDelegateName = 'com.wowza.wms.livestreamrecord.manager.StreamRecorderFileVersionDelegate';
    protected $fileTemplate = '${BaseFileName}_${RecordingStartTime}_${SegmentNumber}';
    protected $segmentDuration = '900000';
    protected $segmentSize = '10485760';
    protected $segmentSchedule = '0 * * * * *';
    protected $recordData = 'true';
    protected $startOnKeyFrame = 'true';
    protected $splitOnTcDiscontinuity = 'false';
    protected $option = 'Version existing file';
    protected $moveFirstVideoFrameToZero = 'true';
    protected $currentSize = '0';
    protected $currentDuration = '0';
    protected $recordingStartTime = '';

    public function __construct(Settings $settings, $appName = 'live', $appInstance = '_definst_')
    {
        parent::__construct($settings);
        $this->restURI = $this->getHost() . '/servers/' . $this->getServerInstance() . '/vhosts/' . $this->getVHostInstance() . "/applications/{$appName}/instances/{$appInstance}/streamrecorders";
    }

    public function create(
        $recorderName,
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
        $this->recorderName = $recorderName;
        $this->instanceName = $instanceName;
        $this->recorderState = $recorderState;
        $this->defaultRecorder = $defaultRecorder;
        $this->segmentationType = $segmentationType;
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

    public function getRecorder($recorderName)
    {
        $this->restURI = $this->restURI . '/' . $recorderName;
        $this->setNoParams();

        return $this->sendRequest($this->preparePropertiesForRequest(self::class), [], self::VERB_GET);
    }

    public function getDefaultParams($recorderName)
    {
        $this->restURI = $this->restURI . '/' . $recorderName . '/default';
        $this->setNoParams();

        return $this->sendRequest($this->preparePropertiesForRequest(self::class), [], self::VERB_GET);
    }

    public function stop($recorderName)
    {
        $this->restURI = $this->restURI . '/' . $recorderName . '/actions/stopRecording';
        $this->setNoParams();

        return $this->sendRequest($this->preparePropertiesForRequest(self::class), [], self::VERB_PUT);
    }

    public function split($recorderName)
    {
        $this->restURI = $this->restURI . '/' . $recorderName . '/actions/splitRecording';
        $this->setNoParams();

        return $this->sendRequest($this->preparePropertiesForRequest(self::class), [], self::VERB_PUT);
    }

    private function setNoParams()
    {
        $this->addSkipParameter('recordName', true)
            ->addSkipParameter('instanceName', true)
            ->addSkipParameter('recorderState', true)
            ->addSkipParameter('defaultRecorder', true)
            ->addSkipParameter('segmentationType', true)
            ->addSkipParameter('outputPath', true)
            ->addSkipParameter('baseFile', true)
            ->addSkipParameter('fileFormat', true)
            ->addSkipParameter('fileVersionDelegateName', true)
            ->addSkipParameter('fileTemplate', true)
            ->addSkipParameter('segmentDuration', true)
            ->addSkipParameter('segmentSize', true)
            ->addSkipParameter('segmentSchedule', true)
            ->addSkipParameter('startOnKeyFrame', true)
            ->addSkipParameter('splitOnTcDiscontinuity', true)
            ->addSkipParameter('option', true)
            ->addSkipParameter('moveFirstVideoFrameToZero', true)
            ->addSkipParameter('currentSize', true)
            ->addSkipParameter('currentDuration', true)
            ->addSkipParameter('recordingStartTime', true);
    }
}
