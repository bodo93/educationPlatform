<?php

namespace model;

/**
 * Description of Course
 *
 * @author bodog
 */
class Course {    
    
    private $id;
    private $name;
    private $postCode;
    private $place;
    private $costs;
    private $start;
    private $end;
    private $link;
    private $instituteId;
    private $departmentId;
    private $areaId;
    private $courseTypeId;
    

    function getId() {
        return $this->id;
    }

    function getName() {
        return $this->name;
    }

    function getPostCode() {
        return $this->postCode;
    }

    function getPlace() {
        return $this->place;
    }

    function getCosts() {
        return $this->costs;
    }

    function getStart() {
        return $this->start;
    }

    function getEnd() {
        return $this->end;
    }

    function getLink() {
        return $this->link;
    }

    function getInstituteId() {
        return $this->instituteId;
    }

    function getDepartmentId() {
        return $this->departmentId;
    }

    function getAreaId() {
        return $this->areaId;
    }

    function getCourseTypeId() {
        return $this->courseTypeId;
    }

        function setId($id) {
        $this->id = $id;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setPostCode($postCode) {
        $this->postCode = $postCode;
    }

    function setPlace($place) {
        $this->place = $place;
    }

    function setCosts($costs) {
        $this->costs = $costs;
    }

    function setStart($start) {
        $this->start = $start;
    }

    function setEnd($end) {
        $this->end = $end;
    }

    function setLink($link) {
        $this->link = $link;
    }

    function setInstituteId($instituteId) {
        $this->instituteId = $instituteId;
    }

    function setDepartmentId($departmentId) {
        $this->departmentId = $departmentId;
    }

    function setAreaId($areaId) {
        $this->areaId = $areaId;
    }

    function setCourseTypeId($courseTypeId) {
        $this->courseTypeId = $courseTypeId;
    }

    
}
