<?php
//
// This code and all components (c) Copyright 2006 - 2016, Wowza Media Systems, LLC. All rights reserved.
// This code is licensed pursuant to the Wowza Public License version 1.0, available at www.wowza.com/legal.
//
namespace com\wowza;
class Recording extends Wowza{
    private $restURI = "";
    private $recorderName = "myStream";
    private $instanceName = "_definst_";
    private $recorderState = "Waiting for stream";
    private $defaultRecorder = "true";
    private $segmentationType = "None";
    private $outputPath = "";
    private $baseFile = "myrecord.mp4";
    private $fileFormat = "MP4";
    private $fileVersionDelegateName ="com.wowza.wms.livestreamrecord.manager.StreamRecorderFileVersionDelegate";
    private $fileTemplate = "\${BaseFileName}_\${RecordingStartTime}_\${SegmentNumber}";
    private $segmentDuration = "900000";
    private $segmentSize = "10485760";
    private $segmentSchedule = "0 * * * * *";
    private $recordData = "true";
    private $startOnKeyFrame = "true";
    private $splitOnTcDiscontinuity = "false";
    private $option = "Version existing file";
    private $moveFirstVideoFrameToZero = "true";
    private $currentSize = "0";
    private $currentDuration = "0";
    private $recordingStartTime = "";
    
    private $_skip = array();
    private $_additional = array();
    
    public function __construct(){
        $this->restURI = $this->getHost()."/servers/".$this->getServerInstance()."/vhosts/_defaultVHost_/applications/live/instances/_definst_/streamrecorders";
    }
    
    public function create($recorderName, $instanceName, $recorderState, $defaultRecorder,
                           $segmentationType, $outputPath, $baseFile, $fileFormat, $fileVersionDelegateName, $fileTemplate,
                           $segmentDuration, $segmentSize, $segmentSchedule, $recordData, $startOnKeyFrame, $splitOnTcDiscontinuity,
                           $option, $moveFirstVideoFrameToZero, $currentSize, $currentDuration, $recordingStartTime
                           ){
        
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
        
        $response = $this->sendRequest($this->preparePropertiesForRequest($this),array());
        return $response;
    }
    
    public function getAll(){
        $this->setNoParams();
        return $this->sendRequest($this->preparePropertiesForRequest(),array(), self::VERB_GET);
    }
    
    public function stop($recorderName){
        $this->restURI = $this->restURI."/".$recorderName."/actions/stopRecording";
        $this->setNoParams();
        return $this->sendRequest($this->preparePropertiesForRequest($this),array(), self::VERB_PUT);
    }
    
    public function split($recordName){
        $this->restURI = $this->restURI."/".$recordName."/actions/splitRecording";
        $this->setNoParams();
        return $this->sendRequest($this->preparePropertiesForRequest($this),array(), self::VERB_PUT);
    }
    
    private function setNoParams(){
        $this->_skip["recorderName"] = true;
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
    
    protected function preparePropertiesForRequest(){
        $classPropNames = get_class_vars(get_class($this));
        
        $props = new \stdClass();
        foreach($classPropNames as $key=>$val){
            if(isset($this->$key)){
                if(preg_match("/^(\_)/", $key)){
                    continue;
                }
                if(isset($this->_skip[$key])){
                    continue;
                }
                $props->$key = $this->$key;
            }
        }
        
        if(count($this->_additional)>0){
            foreach($this->_additional as $key=>$val){
                $props->$key=$val;
            }
        }
        return $props;
    }
}
