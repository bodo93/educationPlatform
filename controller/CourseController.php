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
                    . "Please settle the account within 30 days.\n"
                    . "You can find the Invoice in your course overview.";

            EmailServiceClient::sendInvoiceEmail($toEmail, $subject, $htmlData);

            // Test Mail with pdf
            //EmailServiceClient::sendEmailAttachement($toEmail, $subject, $htmlData);



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

    /*
     * Author: Bodo Grütter
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
                alert('Course was updated');
                window.location.replace('overview');
                </script>
                ";
            } else {
                echo "Error: " . $update . "<br>" . mysqli_error($conn);
            }
        }
    }

    /*
     * Author: Bodo Grütter
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
            $stmt = $mysqli->prepare("DELETE FROM course WHERE ID = ?");
            $stmt->bind_param('i', $id);
            $id = $_POST['id'];

            $stmt->execute();

            if ($stmt) {
                echo "
                <script type=\"text/javascript\">
                alert('Course was deleted');
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

        /*
          $courseDAO = new CourseDAO();
          $courseDAO->search($course);
         * 
         */
    }

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

            /*$selectMail = prepare("SELECT institute.Email from institute JOIN course on institute.ID = course.InstituteID"
                    . "WHERE course.ID = ?");
            $selectMail->bind_param('i', $id);
            $selectMail->execute();
            $selectResult = $selectMail->get_result();
            
            #Check if are rows in query
            if ($selectResult->num_rows > 0) {
                $row = $selectResult->fetch_assoc();
                $mail = $row["Email"];
            } else {
                # No data actions
                echo 'No data here :(';
            }*/


            if ($control == 0) {
                if ($startTimestamp <= time()) {
                    $toEmail = "$mail"; // mail noch ergänzen 
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
