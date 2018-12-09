<?php

use database\DBConnection;

        $db = DBConnection::getConnection();
        $mysqli = $db->getConnection();

        $select = "SELECT ID, Name, Start, CreationDate, ControlNumber FROM course";
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
            $control = $row["ControlNumber"];

            if ($control == 0) {
                if ($dateOfReminderTimestamp <= time()) {

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
                } elseif($dateOfDeletionTimestamp <= time()){
                    
                } else {
                    echo "OK";
                }
            }
        }
?>