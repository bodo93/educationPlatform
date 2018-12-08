<?php
use controller\CourseController;

    CourseController::checkStartDate();
    echo "OK";
    
            $db = DBConnection::getConnection();
        $mysqli = $db->getConnection();

        $select = "SELECT ID, Name, CreationDate FROM course";
        $result = $mysqli->query($select);
        
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row["ID"];
            $name = $row["Name"];
            $creation = $row["CreationDate"];
            //$creationTimestamp = strtotime($start);
            echo $creation;
        }
    
    //CourseController::checkDateOfInvoice();
?>
