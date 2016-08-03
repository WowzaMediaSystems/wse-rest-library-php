<?php
namespace com\wowza\entities;
abstract class Entity{
	public $restURI = null;

	public function __call($name, $arguments)
	{
		if(preg_match("/^(set)/", $name)){	
			$name = preg_replace("/^(set)/", "", $name);
			$name = lcfirst($name);
			if(isset($this->$name)){
				$this->$name = $arguments[0];
			}
			return $this->$name;
		}	
		else if(preg_match("/^(get)/", $name)){	
			$name = preg_replace("/^(get)/", "", $name);
			$name = lcfirst($name);
			if(isset($this->$name)){
				return $this->$name;
			}
		}
		return null;
	}
	
	public function getEntityName(){
		$className = array_pop(explode("\\",get_class($this)));
		return lcfirst($className);
	}
	
	abstract function setURI($baseURI);
} 