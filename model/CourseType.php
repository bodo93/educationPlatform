<?php

namespace model;

/**
 * Description of CourseType
 *
 * @author bodog
 */
class CourseType {
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
