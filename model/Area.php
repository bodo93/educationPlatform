<?php

/**
 * Author: Bodo Grütter
 */

namespace model;

class Area {
    
    private $id;
    private $name;
    
    function getId() {
        return $this->id;
    }

    function getName() {
        return $this->name;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setName($name) {
        $this->name = $name;
    }


}
