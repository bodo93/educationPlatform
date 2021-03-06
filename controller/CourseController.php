<?php

/*
 * Author: Bodo Grütter
 */

namespace controller;

include 'view/includes/translator.inc.php';

use view\TemplateView;
use view\LayoutRendering;
use model\Course;
use model\Institute;
use database\courseDAO;
use database\DBConnection;
use service\EmailServiceClient;

class CourseController {

    /**
     * $Author: Bodo Grütter
     * 
     * create() creates a course and saves it in the database.
     * parameter: -
     * return: -
     */
    public static function create() {
        $db = DBConnection::getConnection();
        $mysqli = $db->getConnection();

        if (!empty($_POST)) {
            $stmt = $mysqli->prepare("INSERT INTO course (ID, Name, PostCode, Place, Costs, Start, End, 
                                    Link, InstituteID, DepartmentID, AreaID, CourseTypeID)
                                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

            $stmt->bind_param('isisisssiiii', $id, $name, $postCode, $place, $costs, $start, $end, $link, $institute, $department, $area, $courseType);

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

            $stmt = $mysqli->prepare("SELECT * FROM institute WHERE ID = ?");
            $stmt->bind_param('i', $institute);

            $stmt->execute();
            $myInstitute = $stmt->get_result()->fetch_object("model\Institute");

            $toEmail = $myInstitute->getEmail();

            $stmt->close();
            
            $subject = "SWISSEDU Service";
            $htmlData = "Thank you for publishing your course on SWISSEDU!\n"
                    . "Please settle the account within 30 days.\n"
                    . "You can find the Invoice in your course overview.";

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

    /**
     * $Author: Bodo Grütter
     * 
     * readAll() reads all courses by InstititeID.
     * parameter: -
     * return: -
     */
    public static function readAll() {
        $contentView = new TemplateView("courseOverview.php");
        $courseDAO = new CourseDAO();
        $contentView->courses = $customerDAO->findByInstitute(/* current Institute ID */);
        LayoutRendering::basicLayout($contentView);
    }

    /**
     * $Author: Bodo Grütter
     * 
     * edit($course) edits a course.
     * parameter: a course-object
     * return: -
     */
    public static function edit($course) {
        $contentView = new TemplateView("courseEdit.php");
        $courseDAO = new CourseDAO();
        $contentView->course = $courseDAO->update($course);
        LayoutRendering::basicLayout($contentView);
    }

    /**
     * $Author: Bodo Grütter
     * 
     * update() updates the selected course in database.
     * parameter: -
     * return: -
     */
    public static function update() {
        $db = DBConnection::getConnection();
        $mysqli = $db->getConnection();

        $id = 0;

        if ($_GET) {
            // keep track post values
            $id = $_GET['id'];
        } else if ($_POST) {
            $stmt = $mysqli->prepare("UPDATE course SET `Name` = ?, "
                    . "`PostCode` = ?, `Place` = ?, `Start` = ?, `End` = ?, "
                    . "`Costs` = ?, `Link` = ?, `InstituteID` = ?, "
                    . "`DepartmentID`= ?, `AreaID` = ?, `CourseTypeID` = ? "
                    . "WHERE `ID` = ?");

            $stmt->bind_param('sisssisiiiii', $name, $postCode, $place, $start, $end, $costs, $link, $institute, $department, $area, $courseType, $id);

            $name = $_POST['name'];
            $postCode = $_POST['postCode'];
            $place = $_POST['place'];
            $start = $_POST['start'];
            $end = $_POST['end'];
            $costs = $_POST['costs'];
            $link = $_POST['link'];
            $institute = $_POST['institute'];
            $department = $_POST['department'];
            $area = $_POST['area'];
            $courseType = $_POST['courseType'];
            $id = $_POST['id'];

            $stmt->execute();

            if ($stmt) {
                echo "
                <script type=\"text/javascript\">
                window.location.replace('overview');
                </script>
                ";
            } else {
                echo "Error: " . $update . "<br>" . mysqli_error($conn);
            }
        }
    }

    /**
     * $Author: Bodo Grütter
     * 
     * delete() deletes the selected course in database.
     * parameter: -
     * return: -
     */
    public static function delete() {
        $db = DBConnection::getConnection();
        $mysqli = $db->getConnection();

        if (!empty($_GET['id'])) {
            $id = $_REQUEST['id'];
        }

        if (!empty($_POST)) {
            // keep track post values
            $id = $_POST['id'];

            // delete data
            $stmt = $mysqli->prepare("DELETE FROM course WHERE ID = ? AND InstituteID = ?");
            $stmt->bind_param('ii', $id, $userID);
            $id = $_POST['id'];
            $userID = $_SESSION['userID'];
            $stmt->execute();
            
            if ($stmt) {
                echo "
                <script type=\"text/javascript\">
                window.location.replace('overview');
                </script>
                ";
            } else {
                echo "Error: " . $update . "<br>" . mysqli_error($conn);
            }
        }
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
    }

    /**
     * $Author: Bodo Grütter
     * 
     * getDateOfInvoice($id) determines the date of invoice of an selected course.
     * parameter: id of the selected course
     * return: the date of Invoice in format d.m.Y
     */
    public static function getDateOfInvoice($id) {
        $db = DBConnection::getConnection();
        $mysqli = $db->getConnection();

        $select = "SELECT ID, Name, CreationDate FROM course where ID =" . $id;
        $result = $mysqli->query($select);

        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row["ID"];
            $name = $row["Name"];
            $creationDate = $row["CreationDate"];
            $dateOfInvoiceTimestamp = strtotime($creationDate);
            $dateOfInvoiceFormat = date('d.m.Y', $dateOfInvoiceTimestamp);
        }

        return $dateOfInvoiceFormat;
    }

    /**
     * $Author: Bodo Grütter
     * 
     * getDueDate($id) determines the due date of an selected course.
     * parameter: id of the selected course
     * return: the due date in format d.m.Y
     */
    public static function getDueDate($id) {
        $db = DBConnection::getConnection();
        $mysqli = $db->getConnection();

        $select = "SELECT ID, Name, CreationDate FROM course where ID =" . $id;
        $result = $mysqli->query($select);

        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row["ID"];
            $name = $row["Name"];
            $creationDate = $row["CreationDate"];
            $dateOfInvoiceTimestamp = strtotime($creationDate);
            $dateOfInvoiceFormat = date('d.m.Y', $dateOfInvoiceTimestamp);
            $dueDateTimestamp = $dateOfInvoiceTimestamp + ((60 * 60 * 24) * 30);
            $dueDateFormat = date('d.m.Y', $dueDateTimestamp);
        }

        return $dueDateFormat;
    }

    /**
     * $Author: Bodo Grütter
     * 
     * checkDateOfDeletion() checks with every call, if a course has expired
     * and sends then a reminder to the corresponding institute or deletes the course 
     * parameter: -
     * return: -
     */
    public static function checkDateOfDeletion() {
        $db = DBConnection::getConnection();
        $mysqli = $db->getConnection();

        $select = "SELECT ID, Name, Start, CreationDate, ControlNumber2 FROM course";
        $result = $mysqli->query($select);

        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row["ID"];
            $name = $row["Name"];
            $start = $row["Start"];
            $startTimestamp = strtotime($start);
            $creationDate = $row["CreationDate"];
            $creationTimestamp = strtotime($creationDate);
            $dateOfReminderTimestamp = $creationTimestamp + ((60 * 60 * 24) * 83);
            $dateOfReminderFormat = date('d.m.Y', $dateOfReminderTimestamp);
            $dateOfDeletionTimestamp = $creationTimestamp + ((60 * 60 * 24) * 90);
            $dateOfDeletionFormat = date('d.m.Y', $dateOfDeletionTimestamp);
            $control = $row["ControlNumber2"];
            echo $name . ": " . $dateOfReminderFormat;

            if ($control == 0) {
                if ($dateOfReminderTimestamp <= time()) {
                    $selectMail = "SELECT institute.Email from institute JOIN course on institute.ID = course.InstituteID WHERE course.ID = " . $id;

                    if ($result = $mysqli->query($selectMail)) {
                        $row = mysqli_fetch_assoc($result);
                        $mail = $row["Email"];
                    }

                    $toEmail = "$mail";
                    $subject = "SWISSEDU Notification";
                    $htmlData = "Your published course " . $name . " will be deleted from SWISSEDU on " . $dateOfDeletionFormat;
                    EmailServiceClient::sendEmail($toEmail, $subject, $htmlData);

                    $update = $mysqli->prepare("Update course SET `ControlNumber2` = ? WHERE `ID` = ?");
                    $number = 1;
                    $update->bind_param('ii', $number, $id);
                    $update->execute();
                }
            }

            if ($dateOfDeletionTimestamp <= time()) {
                $selectMail = "SELECT institute.Email from institute JOIN course on institute.ID = course.InstituteID WHERE course.ID = " . $id;

                if ($result = $mysqli->query($selectMail)) {
                    $row = mysqli_fetch_assoc($result);
                    $mail = $row["Email"];
                }

                $toEmail = "$mail";
                $subject = "SWISSEDU Notification";
                $htmlData = "Your published course " . $name . " has been deleted from SWISSEDU.";
                EmailServiceClient::sendEmail($toEmail, $subject, $htmlData);

                // delete data
                $stmt = $mysqli->prepare("DELETE FROM course WHERE ID = ?");
                $stmt->bind_param('i', $id);
                $stmt->execute();
            }
        }
    }

    /**
     * $Author: Bodo Grütter
     * 
     * checkStartDate() checks with every call, if a course has already started
     * and sends then a notification to the corresponding institute 
     * parameter: -
     * return: -
     */
    public static function checkStartDate() {
        $db = DBConnection::getConnection();
        $mysqli = $db->getConnection();

        $select = "SELECT ID, Name, Start, ControlNumber FROM course";
        $result = $mysqli->query($select);

        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row["ID"];
            $name = $row["Name"];
            $start = $row["Start"];
            $startTimestamp = strtotime($start);
            $control = $row["ControlNumber"];


            if ($control == 0) {
                if ($startTimestamp <= time()) {

                    $selectMail = "SELECT institute.Email from institute JOIN course on institute.ID = course.InstituteID WHERE course.ID = " . $id;

                    if ($result = $mysqli->query($selectMail)) {
                        $row = mysqli_fetch_assoc($result);
                        $mail = $row["Email"];
                    }

                    $toEmail = "$mail";
                    $subject = "SWISSEDU Notification";
                    $htmlData = "Your published course " . $name . " has started. Under my courses the course data can be modified as required.";
                    EmailServiceClient::sendEmail($toEmail, $subject, $htmlData);

                    $update = $mysqli->prepare("Update course SET `ControlNumber` = ? WHERE `ID` = ?");
                    $number = 1;
                    $update->bind_param('ii', $number, $id);
                    $update->execute();
                }
            }
        }
    }
}
