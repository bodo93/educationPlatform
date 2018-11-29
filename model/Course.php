<?php

namespace model;

/**
 * Description of Course
 *
 * @author bodog
 */

class Course {

    private $ID;
    private $Name;
    private $PostCode;
    private $Place;
    private $Costs;
    private $Start;
    private $End;
    private $Link;
    private $InstituteID;
    private $DepartmentID;
    private $AreaID;
    private $CourseTypeID;

    function getId() {
        return $this->ID;
    }

    function getName() {
        return $this->Name;
    }

    function getPostCode() {
        return $this->PostCode;
    }

    function getPlace() {
        return $this->Place;
    }

    function getCosts() {
        return $this->Costs;
    }

    function getStart() {
        return $this->Start;
    }

    function getEnd() {
        return $this->End;
    }

    function getLink() {
        return $this->Link;
    }

    function getInstituteId() {
        return $this->InstituteID;
    }

    function getDepartmentId() {
        return $this->DepartmentID;
    }

    function getAreaId() {
        return $this->AreaID;
    }

    function getCourseTypeId() {
        return $this->CourseTypeID;
    }

    function setId($id) {
        $this->ID = $id;
    }

    function setName($name) {
        $this->Name = $name;
    }

    function setPostCode($postCode) {
        $this->PostCode = $postCode;
    }

    function setPlace($place) {
        $this->Place = $place;
    }

    function setCosts($costs) {
        $this->Costs = $costs;
    }

    function setStart($start) {
        $this->Start = $start;
    }

    function setEnd($end) {
        $this->End = $end;
    }

    function setLink($link) {
        $this->Link = $link;
    }

    function setInstituteId($instituteId) {
        $this->InstituteId = $instituteId;
    }

    function setDepartmentId($departmentId) {
        $this->DepartmentId = $departmentId;
    }

    function setAreaId($areaId) {
        $this->AreaId = $areaId;
    }

    function setCourseTypeId($courseTypeId) {
        $this->CourseTypeId = $courseTypeId;
    }

}
