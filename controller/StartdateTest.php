<?php
//use controller\CourseController;
    
echo "OK";
        $db = DBConnection::getConnection();
        $mysqli = $db->getConnection();

        $testquery = "SELECT CreationDate FROM course where ID = 98";
        $result = $mysqli->query($testquery);
        $row = mysqli_fetch_assoc($result);
        echo $row["CreationDate"];
        
    //CourseController::checkDateOfInvoice();
?>
