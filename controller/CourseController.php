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
use model\Institute;
use database\courseDAO;
use database\DBConnection;
use service\EmailServiceClient;

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
            $stmt = $mysqli->prepare("INSERT INTO course (ID, Name, PostCode, Place, Costs, Start, End, 
                                    Link, InstituteID, DepartmentID, AreaID, CourseTypeID)
                                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

            $stmt->bind_param('isisisssiiii', $id, $name, $postCode, $place, $costs, $start, $end, $link, $institute,
                            $department, $area, $courseType);

            $id = NULL;
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
            
            $stmt->execute();
            
            // sends PDF invoice to institude after adding a new course
            
            $stmt = $mysqli->prepare("SELECT * FROM institute WHERE ID = ?");
            $stmt->bind_param('i', $institute);
            
            //$institute = $_SESSION['userID'];
            $stmt->execute();
            $myInstitute = $stmt->get_result()->fetch_object("model\Institute");
            
            $toEmail = $myInstitute->getEmail();  // funktioniert nicht, warum ??
            //$email = $_POST['email'];
            
            //$institute = $stmt->get_result()->fetch_object("model\Institute");
            $stmt->close();

            //$toEmail = $_POST['email'];
            $subject = "SWISSEDU Service";
            $htmlData = "Thank you for publishing your course on SWISSEDU!\n"
                    . "Please settle the account in the attachment within 30 days.";

            EmailServiceClient::sendInvoiceEmail($toEmail, $subject, $htmlData);            

            if ($stmt) {
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
        $db = DBConnection::getConnection();
        $mysqli = $db->getConnection();                
        
        $id = 0;
        
        if ($_GET) {
            // keep track post values
            $id = $_GET['id'];
        } else if ($_POST) {
            $id = $_POST['id'];

            $update = "UPDATE course SET `Name` = '" . $_POST['name'] . "', "
                    . "`PostCode` = '" . $_POST['postCode'] . "', `Place` = '" . $_POST['place'] . "', "
                    . "`Start` = '" . $_POST['start'] . "', `End` = '" . $_POST['end'] . "', "
                    . "`Costs` = '" . $_POST['costs'] . "', "
                    . "`Link` = '" . $_POST['link'] . "', `InstituteID` = '" . $_POST['institute'] . "', "
                    . "`DepartmentID`= '" . $_POST['department'] . "', `AreaID` = '" . $_POST['area'] . "', `CourseTypeID` = '" . $_POST['courseType'] . "' "
                    . "WHERE `ID` = '$id'";
            $result = $mysqli->query($update);
            if ($result) {
                header("Location: ".$GLOBALS["ROOT_URL"]."/course/overview");
            } else {
                echo "Error: " . $update . "<br>" . mysqli_error($conn);
            }
        }
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