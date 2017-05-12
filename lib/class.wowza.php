<?php
//
// This code and all components (c) Copyright 2006 - 2016, Wowza Media Systems, LLC. All rights reserved.
// This code is licensed pursuant to the Wowza Public License version 1.0, available at www.wowza.com/legal.
//
namespace com\wowza;
use App\Core as Core;
class Wowza{
    const DEBUG = WOWZA_DEBUG;
    const VERB_POST = "POST";
    const VERB_GET = "GET";
    const VERB_DELETE = "DELETE";
    const VERB_PUT = "PUT";
    
    private $useDigest = WOWZA_USE_DIGEST;
    private $host = WOWZA_HOST;
    private $serverInstance = WOWZA_SERVER_INSTANCE;
    private $vhostInstance = WOWZA_VHOST_INSTANCE;
    private $username = WOWZA_USERNAME;
    private $password = WOWZA_PASSWORD;
    
    public function __construct(){ }
    
    protected function getHost(){
        return $this->host;
    }
    
    protected function getServerInstance(){
        return $this->serverInstance;
    }
    
    protected function getVHostInstance(){
        return $this->vhostInstance;
    }
    
    protected function getEntites($args, $baseURI) {
        $entities = array ();
        for($i = 0; $i < count($args); $i ++) {
            $arg = $args[$i];
            if (! is_null ( $arg )) {
                if (is_null ( $arg->restURI )) {
                    if(is_null($baseURI)){
                        unset($arg->restURI);
                    }
                    else{
                        call_user_func_array ( array (
                                                      $arg,
                                                      "setURI"
                                                      ), array (
                                                                $baseURI
                                                                ) );
                    }
                }
                $entities [] = $arg;
            }
        }
        return $entities;
    }
    
    protected function debug($str){
        if(self::DEBUG){
            if(!is_string($str)){
                $str = json_encode($str);
            }
            echo $str."\n";
        }
    }
    
    protected function sendRequest($props, $entities, $verbType=self::VERB_POST, $queryParams=null){
        if(isset($props->restURI) && !empty($props->restURI)){
            if(count($entities)>0){
                for($i=0; $i<count($entities); $i++){
                    $entity = $entities[$i];
                    if(is_object($entity) && method_exists($entity, "getEntityName")){
                        $name = $entity->getEntityName();
                        $props->$name = $entity;
                    }
                }
            }
            $json = json_encode($props);
            
            $restURL = $props->restURI;
            if(!is_null($queryParams)){
                $restURL .= "?".$queryParams;
            }
            $this->debug("JSON REQUEST to {$restURL} with verb {$verbType}: ".$json);
            
            $ch = curl_init($restURL);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $verbType);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
            
            if($this->useDigest){
                curl_setopt($ch, CURLOPT_USERPWD, $this->username . ":" . $this->password);
                curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_DIGEST);
            }
            
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                                                       'Accept:application/json; charset=utf-8',
                                                       'Content-type:application/json; charset=utf-8',
                                                       'Content-Length: '.strlen($json)
                                                       ));
            $contents = curl_exec($ch);
            curl_close($ch);
            
            $this->debug("RETURN: ".$contents);
            
            return json_decode($contents);
        }
        return false;
    }
}
