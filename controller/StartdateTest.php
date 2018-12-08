<?php
use controller\CourseController;

    CourseController::checkStartDate();
    echo "OK";
    
        $db = DBConnection::getConnection();
        $mysqli = $db->getConnection();

        $select = "SELECT ID, Name, CreationDate FROM course";
        if($result = $mysqli->query($select)){
            echo "OK2";
        } else {echo "Not OK2";};
        
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row["ID"];
            $name = $row["Name"];
            $creation = $row["CreationDate"];
            //$creationTimestamp = strtotime($start);
            echo $creation;
        }
    
    //CourseController::checkDateOfInvoice();
?>
