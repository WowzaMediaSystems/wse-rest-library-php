<?php
//
// This code and all components (c) Copyright 2006 - 2016, Wowza Media Systems, LLC. All rights reserved.
// This code is licensed pursuant to the Wowza Public License version 1.0, available at www.wowza.com/legal.
//
namespace com\wowza;
class User extends Wowza{
	private $restURI = "";
	private $userName = "";
	private $password = "";
	private $groups = array();

	private $_skip = array();
	private $_additional = array();


	public function __construct($userName=null){
		$this->userName = $userName;
		$this->restURI = $this->getHost()."/servers/".$this->getServerInstance()."/users";
	}

	public function create($password, $group=array()){
		$this->password = $password;
		$this->groups = $group;
		$response = $this->sendRequest($this->preparePropertiesForRequest($this),array());
		return $response;
	}

	public function getAll(){
		$this->_skip["userName"] = true;
		$this->_skip["password"] = true;
		$this->_skip["group"] = true;
		return $this->sendRequest($this->preparePropertiesForRequest(),array(), self::VERB_GET);
	}

	public function remove(){
		$this->restURI = $this->restURI."/".$this->userName;
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
