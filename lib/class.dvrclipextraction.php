<?php
//
// This code and all components (c) Copyright 2006 - 2016, Wowza Media Systems, LLC. All rights reserved.
// This code is licensed pursuant to the Wowza Public License version 1.0, available at www.wowza.com/legal.
//
namespace com\wowza;
class DvrClipExtraction extends Wowza{
	private $restURI = "";

	private $_skip = array();
	private $_additional = array();


	public function __construct($appName, $appInstance="_definst_"){
		$this->restURI = $this->getHost()."/servers/".$this->getServerInstance()."/vhosts/".$this->getVHostInstance()."/applications/{$appName}/instances/{$appInstance}/dvrstores";
	}

	public function create(){

		$response = $this->sendRequest($this->preparePropertiesForRequest($this),array());
		return $response;
	}

	public function getItem($name){
		$this->restURI = $this->restURI."/".$name;
		return $this->sendRequest($this->preparePropertiesForRequest(),array(), self::VERB_GET);
	}

	public function convertGroup($nameArr){
		$this->setNoParams();
		$this->restURI = $this->restURI."/actions/convert?dvrConverterStoreList=".implode(",", $nameArr);
		return $this->sendRequest($this->preparePropertiesForRequest(),array(), self::VERB_PUT);
	}
	/*
	 * /// query params
	 * dvrConverterStartTime=[unix timestamp]
     * dvrConverterEndTime=[unix-timestamp]
     * dvrConverterOutputFilename=[outputfilename]
	 *
	 * @param $startTime is a unix timestamp
	 * @param $endTime is a unix timestamp
	 * @param $outputFileName is a string
	 */
	public function convert($name, $startTime=null, $endTime=null, $outputFileName = null){
		$this->setNoParams();
		$query = "";
		if(!is_null($startTime)){
			$query.="dvrConverterStartTime=".$startTime;
		}
		if(!is_null($endTime)){
			if(!empty($query)){ $query.= "&"; }
			$query.="dvrConverterEndTime=".$endTime;
		}
		if(!is_null($outputFileName)){
			if(!empty($query)){ $query.= "&"; }
			$query.="dvrConverterOutputFilename=".$outputFileName;
		}
		$query = (strlen($query)==0)?"":"?".$query;

		$this->restURI = $this->restURI."/{$name}/actions/convert{$query}";
		return $this->sendRequest($this->preparePropertiesForRequest(),array(), self::VERB_PUT);
	}

	public function clearCache(){
		$this->restURI = $this->restURI."/actions/expire";
		return $this->sendRequest($this->preparePropertiesForRequest(),array(), self::VERB_PUT);
	}

	public function debugConversions($name){
		$this->restURI = $this->restURI."/{$name}/actions/convert?dvrConverterDebugConversions=true";
		return $this->sendRequest($this->preparePropertiesForRequest(),array(), self::VERB_PUT);
	}

	/*
     * dvrConverterDuration=[milliseconds]
	 */
	public function convertByDurationWithStartTime($name, $startTime,$duration, $outputFileName = null){
		$this->setNoParams();
		$query = "";
		if(!is_null($startTime)){
			$query.="dvrConverterStartTime=".$startTime;
		}
		if(!is_null($duration)){
			if(!empty($query)){ $query.= "&"; }
			$query.="dvrConverterDuration=".$duration;
		}
		if(!is_null($outputFileName)){
			if(!empty($query)){ $query.= "&"; }
			$query.="dvrConverterOutputFilename=".$outputFileName;
		}
		$query = (strlen($query)==1)?"":"?".$query;
		$this->restURI = $this->restURI."/{$name}/actions/convert{$query}";

		return $this->sendRequest($this->preparePropertiesForRequest(),array(), self::VERB_PUT);
	}

	public function convertByDurationWithEndTimeTime($name, $endTime, $duration, $outputFileName = null){
		$this->setNoParams();
		$query = "";
		if(!is_null($endTime)){
			$query.="dvrConverterEndTime=".$endTime;
		}
		if(!is_null($duration)){
			if(!empty($query)){ $query.= "&"; }
			$query.="dvrConverterDuration=".$duration;
		}
		if(!is_null($outputFileName)){
			if(!empty($query)){ $query.= "&"; }
			$query.="dvrConverterOutputFilename=".$outputFileName;
		}
		$query = (strlen($query)==1)?"":"?".$query;
		$this->restURI = $this->restURI."/{$name}/actions/convert{$query}";

		return $this->sendRequest($this->preparePropertiesForRequest(),array(), self::VERB_PUT);
	}

	public function getAll(){
		$this->setNoParams();
		return $this->sendRequest($this->preparePropertiesForRequest(),array(), self::VERB_GET);
	}

	private function setNoParams(){
	}

	public function remove($fileName){
		$this->setNoParams();
		$this->restURI = $this->restURI."/".$fileName;
		return $this->sendRequest($this->preparePropertiesForRequest($this),array(), self::VERB_DELETE);
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
