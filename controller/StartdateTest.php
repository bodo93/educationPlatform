<?php
use database\DBConnection;

$db = DBConnection::getConnection();
        $mysqli = $db->getConnection();

        $select = "SELECT ID, Name, CreationDate FROM course where ID =" . $id;
        $result = $mysqli->query($select);
        
        echo "OK1";

        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row["ID"];
            $name = $row["Name"];
            $creationDate = $row["CreationDate"];
            $creationTimestamp = strtotime($creationDate);
            $creationDateFormat = date('d.m.Y', $creationTimestamp);
            $dateOfReminderTimestamp = $creationTimestamp + ((60 * 60 * 24) * 83);
            $dateOfReminderFormat = date('d.m.Y', $dateOfReminderTimestamp);
            $dateOfDeletionTimestamp = $creationTimestamp + ((60 * 60 * 24) * 90);
            $dateOfDeletionFormat = date('d.m.Y', $dateOfDeletionTimestamp);

                        echo "OK2";
                        
            $selectMail = "SELECT institute.Email from institute JOIN course on institute.ID = course.InstituteID WHERE course.ID = " . $id;

            if ($result = $mysqli->query($selectMail)) {
                $row = mysqli_fetch_assoc($result);
                $mail = $row["Email"];
            }
            
            echo "OK3";

            $toEmail = "$mail";
            $subject = "SWISSEDU Notification";
            $htmlData = "Your published course " . $name . " has started. Under my courses the course data can be modified as required.";
            EmailServiceClient::sendEmail($toEmail, $subject, $htmlData);

            if ($dateOfReminderTimestamp <= time()) {
                $toEmail = "$mail";
                $subject = "SWISSEDU Notification";
                $htmlData = "Your published course " . $name . " will be deleted from SWISSEDU on " . $dateOfDeletionFormat;
                EmailServiceClient::sendEmail($toEmail, $subject, $htmlData);
                echo "Mail1 sended";
            } elseif ($dateOfDeletionTimestamp <= time()) {
                $toEmail = "$mail";
                $subject = "SWISSEDU Notification";
                $htmlData = "Your published course " . $name . " has been deleted from SWISSEDU.";
                EmailServiceClient::sendEmail($toEmail, $subject, $htmlData);
                echo "Mail2 sended";

                // delete data
                $stmt = $mysqli->prepare("DELETE FROM course WHERE ID = ?");
                $stmt->bind_param('i', $id);
                $stmt->execute();
            }
        }

?>