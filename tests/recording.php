<?php
require_once("../include/config.php"); 
 
$sf = new com\wowza\Recording();
$response = $sf->split("myStream");

// $recordName= "myStream";
// $instanceName= "_definst_";
// $recorderState= "Waiting for stream";
// $defaultRecorder= true; 
// $segmentationType= "None";
// $outputPath= "/usr/local/WowzaStreamingEngine/content";
// $baseFile= "testme.mp4";
// $fileFormat= "MP4"; // or FLV
// $fileVersionDelegateName= "com.wowza.wms.livestreamrecord.manager.StreamRecorderFileVersionDelegate";
// $fileTemplate= "${BaseFileName}_${RecordingStartTime}_${SegmentNumber}"; 
// $segmentDuration= "900000";
// $segmentSize= "10485760";
// $segmentSchedule= "";
// $recordData= true;
// $startOnKeyFrame= true;
// $splitOnTcDiscontinuity= false; 
// $option= "Version existing file";
// $moveFirstVideoFrameToZero= true;
// $currentSize= 0;
// $currentDuration= 0;
// $recordingStartTime = "";

// $response = $sf->create($recordName, $instanceName, $recorderState, $defaultRecorder,
// 					$segmentationType, $outputPath, $baseFile, $fileFormat, $fileVersionDelegateName, $fileTemplate,
// 					$segmentDuration, $segmentSize, $segmentSchedule, $recordData, $startOnKeyFrame, $splitOnTcDiscontinuity,
// 					$option, $moveFirstVideoFrameToZero, $currentSize, $currentDuration, $recordingStartTime); 

// $response = $sf->getAll();

var_dump($response);