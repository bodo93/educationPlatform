<?php

/**
 * Author: Bodo Grütter
 */

namespace database;

use model\Course;
use database\DBConnection;

class CourseDAO extends BasicDAO {

    /**
     * $Author: Bodo Grütter
     * 
     * create($course) inserts a course into database
     * parameter: a $course object of the course that should be inserted
     * return: the id of the last inserted data
     */
    public function create($course) {
        $stmt = $this->$mysqli->prepare("INSERT INTO course (ID, Name, PostCode, Place, Costs, Start, End, Link, InstituteID, DepartmentID, AreaID, CourseTypeID)"
                . "VALUES (?, ?, ?, ?, ?, ?, ?, ?,"
                . "?, ?, ?, ?)");

        $stmt->bind_param("isisiiisiiii", NULL, $course->getName(), $course->getPostCode(), $course->getPlace(), $course->getCosts(), $course->getStart(), $course->getEnd(), $course->getLink(), $course->getInstituteId(), $course->getDepartmentId(), $course->getAreaId(), $course->getCourseTypeId());

        $stmt->execute();

        return $this->read($this->mysqli->lastInsertId());
    }

    /**
     * $Author: Bodo Grütter
     * 
     * read($courseId) reads a course from database
     * parameter: the id of the course that should be read
     * return: the course object that has been read
     */
    public function read($courseId) {
        $stmt = $this->mysqli->prepare("Select * from course where id = ?");
        $stmt->bind_param("i", $courseId);

        if ($stmt->execute()) {
            return $stmt->fetch_all($mysqli::fetch_object)[0];
        }

        return null;
    }

    /**
     * $Author: Bodo Grütter
     * 
     * update($course) updates a course from database
     * parameter: a $course object of the course that should be updated
     * return: the course object that has been updated
     */
    public function update($course) {
        $stmt = $this->mysqli->prepare("Update course set Name = ?, PostCode = ?, Place = ?, Costs = ?, Start = ?, End = ?, Link = ?, InstituteID = ?, DepartmentID = ?,"
                . "AreaID = ?, CourseTypeID = ? where ID = ?");
        $stmt->bind_param("sisiiisiiiii", $course->getName(), $course->getPostCode(), $course->getPlace(), $course->getStart(), $course->getCosts(), $course->getEnd(), $course->getLink(), $course->getInstituteId(), $course->getDepartmentId(), $course->getAreaId(), $course->getCourseTypeId(), $course->getId());

        $stmt->execute();

        return $this->read($course->getId());
    }

    /**
     * $Author: Bodo Grütter
     * 
     * delete($course) deletes a course from database
     * parameter: a $course object of the course that should be deleted
     * return: true or false depending if course has been deleted
     */
    public function delete($course) {
        $stmt = $this->mysqli->prepare("DELETE FROM course WHERE ID = ?");
        $stmt->bind_param("i", $course->getId());

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    /**
     * $Author: Bodo Grütter
     * 
     * findByInstitute($instituteId) finds all courses that belong to an institute
     * parameter: the id of the corresponding institute
     * return: the course objects that have been found
     */
    public function findByInstitute($instituteId) {
        $stmt = $this->mysqli->prepare("SELECT * FROM course WHERE ID = ? ORDER BY ID;");
        $stmt->bind_param("i", $instituteId);
        $stmt->execute();
        return $stmt->fetch_all($mysqli::fetch_object)[0];
    }

    /*
      public function search(Course $course){
      $stmt = $this->mysqli->prepare("SELECT ? FROM course c ORDER BY Name;");
      $stmt->bind_param("i", $instituteId);
      $stmt->execute();

      return $stmt->fetch_all($mysqli::fetch_object)[0];
      } */
}
