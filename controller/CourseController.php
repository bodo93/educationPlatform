<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use database\DBConnection;

/**
 * Description of CourseController
 *
 * @author bodog
 */
class CourseController {

    //put your code here

    public static function createCourse() {
        $course = new Course();
        $course->setName($_POST["name"]);
        $course->setPostCode($_POST["postCode"]);
        $course->setPlace($_POST["place"]);
        $course->setCosts($_POST["costs"]);
        $course->setStart($_POST["start"]);
        $course->setEnd($_POST["end"]);
        $course->setLink($_POST["link"]);
        $course->setInstituteId($_POST["institute"]);
        $course->setDepartmentId($_POST["department"]);
        $course->setAreaId($_POST["area"]);
        $course->setCourseTypeId($_POST["course"]);

        $insert = "INSERT INTO `course` (`ID`, `Name`, `PostCode`, `Place`, `Costs`, `Start`, `End`, `Link`, `InstituteID`, `DepartmentID`, `AreaID`, `CourseTypeID`)"
                . "VALUES (NULL, '$course->getName()', '$course->getPostCode()', '$course->getPlace()', '$course->getCosts()', '$course->getStart()', '$course->getEnd()', '$course->getLink()',"
                . "'$course->getInstituteId()', '$course->getDepartmentId()', '$course->getAreaId()', '$course->getCourseTypeId()')";

        if (mysqli_query(DBConnection::getConnection(), $insert)) {
            //do something
        }
        
        DBConnection::getConnection().close();
    }

    public static function editCourse() {
        $select = "Select * from course where ID = '" . $_POST['id'] . "'";

        if ($result = mysqli_query(DBConnection::getConnection(), $select)) {
            while ($course = $result->fetch_object()) {
                $course->setName($course->name);
                $course->setPostCode($course->postCode);
                $course->setPlace($course->place);
                $course->setCosts($course->costs);
                $course->setStart($course->start);
                $course->setEnd($course->end);
                $course->setLink($course->link);
                $course->setInstituteId($course->instituteId);
                $course->setDepartmentId($course->departmentId);
                $course->setAreaId($course->areaId);
                $course->setCourseTypeId($course->courseId);
            }
        }

        $update = "Update course set `Name` = '" . $_POST['name'] . "', `"
                            . "PostCode` = '" . $_POST['postCode'] . "', `Place` = '" . $_POST['place'] . "', "
                            . "`Start` = '" . $_POST['start'] . "', `End` = '" . $_POST['end'] . "', "
                            . "`Link` = '" . $_POST['link'] . "', `InstituteID` = '" . $_POST['institute'] . "', "
                            . "`DepartmentID`= '" . $_POST['department'] . "', `AreaID` = '" . $_POST['area'] . "', `CourseTypeID` = '" . $_POST['courseType'] . "' "
                            . "where `ID` = '" . $_POST['id'] . "'";

        if (mysqli_query(DBConnection::getConnection(), $update)) {
            //do something
        }
    }

}
