<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace database;
use model\Course;
use database\DBConnection;

/**
 * Description of CourseController
 *
 * @author bodog
 */
class CourseDAO extends BasicDAO {
    
    public function create(Course $course){
        $stmt = $this->$mysqli->prepare("INSERT INTO course (ID, Name, PostCode, Place, Costs, Start, End, Link, InstituteID, DepartmentID, AreaID, CourseTypeID)"
                . "VALUES (?, ?, ?, ?, ?, ?, ?, ?,"
                . "?, ?, ?, ?)");
        
        $stmt->bind_param("isisiiisiiii", NULL, $course->getName(), $course->getPostCode(), $course->getPlace(), $course->getCosts(), $course->getStart(), 
                $course->getEnd(), $course->getLink(), $course->getInstituteId(), 
                $course->getDepartmentId(), $course->getAreaId(), $course->getCourseTypeId());
        
        $stmt->execute();
        
        return $this->read($this->mysqli->lastInsertId());

    }
    
    public function read($courseId){
        $stmt = $this->mysqli->prepare("Select * from course where id = ?");
        $stmt->bind_param("i", $courseId);
        
        if($stmt->execute()){
            return $stmt->fetch_all($mysqli::fetch_object)[0];
        }
        
        return null;
    }
    
    public function update(Course $course){
        $stmt = $this->mysqli->prepare("Update course set Name = ?, PostCode = ?, Place = ?, Costs = ?, Start = ?, End = ?, Link = ?, InstituteID = ?, DepartmentID = ?,"
                . "AreaID = ?, CourseTypeID = ? where ID = ?");
        $stmt->bind_param("sisiiisiiiii", $course->getName(), $course->getPostCode(), $course->getPlace(), $course->getStart(), $course->getCosts(), $course->getEnd(),
                $course->getLink(), $course->getInstituteId(), $course->getDepartmentId(), $course->getAreaId(), $course->getCourseTypeId(), $course->getId());
        
        $stmt->execute();
        
        return $this->read($course->getId());
    }
    
    public function delete(Course $course){
        $stmt = $this->mysqli->prepare("DELETE FROM course WHERE ID = ?");
        $stmt->bind_param("i", $course->getId());
        
        if($stmt->execute()){
            return true;
        }
        
        return false;
    }
    
    public function findByInstitute($instituteId){
        $stmt = $this->mysqli->prepare("SELECT * FROM course WHERE ID = ? ORDER BY ID;");
        $stmt->bind_param("i", $instituteId);
        $stmt->execute();
        return $stmt->fetch_all($mysqli::fetch_object)[0];
    }
}
