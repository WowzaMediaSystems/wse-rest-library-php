<?php
//
// This code and all components (c) Copyright 2006 - 2018, Wowza Media Systems, LLC. All rights reserved.
// This code is licensed pursuant to the Wowza Public License version 1.0, available at www.wowza.com/legal.
//

namespace Com\Wowza\Entities;

abstract class Entity
{
    public $restURI = null;

    public function __call($name, $arguments)
    {
        if (preg_match('/^(set)/', $name)) {
            $name = preg_replace('/^(set)/', '', $name);
            $name = lcfirst($name);
            if (isset($this->$name)) {
                $this->$name = $arguments[0];
            }

            return $this->$name;
        } elseif (preg_match('/^(get)/', $name)) {
            $name = preg_replace('/^(get)/', '', $name);
            $name = lcfirst($name);
            if (isset($this->$name)) {
                return $this->$name;
            }
        }

        return;
    }

    public function getEntityName()
    {
        $className = explode('\\', get_class($this));
        $className = array_pop($className);

        return lcfirst($className);
    }

    abstract public function setURI($baseURI);
}
