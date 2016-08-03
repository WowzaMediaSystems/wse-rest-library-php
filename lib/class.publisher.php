<?php
namespace com\wowza;
class Publisher extends Wowza{
	private $restURI = ""; 
	private $name = "";
	private $password = "";
	 
	private $_skip = array();
	private $_additional = array();
	
 
	public function __construct($publisherName){   
		$this->name = $publisherName;
		$this->restURI = $this->getHost()."/servers/".$this->getServerInstance()."/publishers"; 
	}	
	
	public function create($password){   
		$this->restURI = $this->restURI; 
		$this->password = $password;
		$response = $this->sendRequest($this->preparePropertiesForRequest($this),array()); 
		return $response;
	} 
	
	public function remove(){ 
		$this->restURI = $this->restURI."/".$this->name;
		return $this->sendRequest($this->preparePropertiesForRequest($this),array(), self::VERB_DELETE);
	}
 
	protected function getAdvancedSettings($urlProps){
		if(is_array($urlProps)){
			$items = array();
			foreach($urlProps as $k=>$v){
				$item = new entities\application\helpers\AdvancedSettingItem();
				$item->name = $k;
				$item->value = $v;
				$items[] = $item;
			}
			return $items;
		}
		else{
			$item = new entities\application\helpers\AdvancedSettingItem();
			$item->value = $urlProps;
			return $item;
		}
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