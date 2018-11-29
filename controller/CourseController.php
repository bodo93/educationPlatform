<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace controller;

use view\TemplateView;
use view\LayoutRendering;
use model\Course;
use database\courseDAO;
use database\DBConnection;

/**
 * Description of CourseController
 *
 * @author bodog
 */
class CourseController {


    public static function create() {
        $db = DBConnection::getConnection();
        $mysqli = $db->getConnection();

        if (!empty($_POST)) {

            // Formularinhalte in Variablen schreiben
            $name = $_POST['name'];
            $postCode = $_POST['postCode'];
            $place = $_POST['place'];
            $costs = $_POST['costs'];
            $start = $_POST['start'];
            $end = $_POST['end'];
            $link = $_POST['link'];
            $institute = $_SESSION['userID'];
            $department = $_POST['department'];
            $area = $_POST['area'];
            $courseType = $_POST['courseType'];
            
            $insert = "INSERT INTO `course` (`ID`, `Name`, `PostCode`, `Place`, `Costs`, `Start`, `End`, `Link`, `InstituteID`, `DepartmentID`, `AreaID`, `CourseTypeID`) VALUES (NULL, '$name', '$postCode', '$place', '$costs', '$start', '$end', '$link', '$institute', '$department', '$area', '$courseType')";
            
            $result = $mysqli->query($insert);
            if ($result) {
                header("Location: " . $GLOBALS["ROOT_URL"] . "/course/overview");
            } else {
                echo "Error: " . $insert . "<br>" . mysqli_error($conn);
            }
            echo "<meta http-equiv='refresh' content='0'>";
            mysqli_close($conn);
        }
        
    }

    public static function readAll() {
        $contentView = new TemplateView("courseOverview.php");
        $courseDAO = new CourseDAO();
        $contentView->courses = $customerDAO->findByInstitute(/* current Institute ID */);
        LayoutRendering::basicLayout($contentView);
    }

    public static function edit($courseId) {
        $contentView = new TemplateView("courseEdit.php");
        $courseDAO = new CourseDAO();
        $contentView->course = $courseDAO->read($courseID);
        LayoutRendering::basicLayout($contentView);
    }

    public static function update() {
        $course = new Course();
        $course->setId($_POST["id"]);
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
        $course->setCourseTypeId($_POST["courseType"]);
        
        $courseDAO = new CourseDAO();
        $courseDAO->update($course);
    }

    public static function delete($courseId) {
        $courseDAO = new CourseDAO();
        $course = new Course();
        $course->setId($courseId);
        $courseDAO->delete($course);
    }
    
    
    public static function search($search, $department, $area, $courseType) {
        $course = new Course();
        $course->getID();
        $course->getName();
        $course->getPostCode();
        $course->getPlace();
        $course->getCosts();
        $course->getStart();
        $course->getEnd();
        $course->getLink();
        $course->getInstituteId();
        $course->getDepartmentId();
        $course->getAreaId();
        $course->getCourseTypeId();
        
        /*
        $courseDAO = new CourseDAO();
        $courseDAO->search($course);
         * 
         */
    }
}