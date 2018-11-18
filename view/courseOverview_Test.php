<!DOCTYPE html>
<?php

include ("includes/translator.inc.php");
use database\DBConnection;
include 'includes/header.inc.php';
?>
<html>
<head>

<script src="jquery-3.3.1.min.js">
$(".delete").click(function(){
    return confirm("Are you sure?");
});
</script>

        <meta charset="UTF-8">
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <!--<title><?php echo $lang['myCourses'] ?></title>-->
        <link rel="stylesheet" type="text/css" href="stylesheet/courses.css">

        <script type="text/javascript">
        </script>
    </head>

    <body style="background-color: rgb(34,36,37);">
        <main class="page login-page">
            <section class="clean-block clean-form dark" style="min-height: 660px; padding-top: 100px;">
                <div class="container">
                    <div class="block-heading">
                        <h2 class="text-info" style="margin-bottom: 15px;"><?php echo $lang['myCourses'] ?></h2>
                    </div>

                    <form method="post"style="padding-bottom: 30px;min-width: 1050px; min-height: 400px; margin-right: 100;padding-right: 0px;">
                        <!--creates tableheaders for the crud-table -->
                        <table id="crudTable">
                            <thead>
                                <tr>
                                    <!--creates tableheaders for the crud-table -->
                                  <!--<th>ID</th>-->
                                    <th><?php echo $lang['name'] ?></th>
                                    <th><?php echo $lang['department'] ?></th>
                                    <th><?php echo $lang['place'] ?></th>
                                    <th><?php echo $lang['courseType'] ?></th>
                                    <th><?php echo $lang['startDate'] ?></th>            
                                </tr>
                            </thead>
                            <tbody>
                                <!--Get data from database and show it in table cells-->
                                <?php
                                $db = DBConnection::getConnection();
                                $mysqli = $db->getConnection();

                                //mysqli_query($conn, "SET NAMES 'utf8'"); // ä, ö, ü richtig darstellen

                                $updatequery = "select * from course ORDER BY Name";

                                $result = $mysqli->query($updatequery);

                                while ($row = mysqli_fetch_assoc($result)) {
                                    $id = $row["ID"];
                                    echo "\n\n<tr>"
                                    . "<td><input class='text' name='name[$id]' value='" . $row['Name'] . "' size='25' disabled/></td>"
                                    . "<td><input class='text' name='department[$id]' value='" . $row['DepartmentID'] . "' size='14' disabled/></td>"
                                    . "<td><input class='text' name='place[$id]' value='" . $row['Place'] . "' size='10' disabled/></td>"
                                    . "<td><input class='text' name='courseType[$id]' value='" . $row['CourseTypeID'] . "' size='10' disabled/></td>"
                                    . "<td><input class='text' name='start[$id]' value='" . $row['Start'] . "' size='10' disabled/></td>"

                                    //generates links "edit" and "delete" with image
                                    . "<td><a class='update' href='/educationPlatform/course/edit?id=" . $id . "'><img border='0' alt='edit' src='view/assets_2/images/edit.png' height='20' width='20' align='top'></a>"
                                    . "<a class='delete' href='/educationPlatform/course/delete?id=" . $id . "'><img border='0' alt='delete' src='view/assets_2/images/delete.png' height='20' width='20' align='top'></a></td>"
                                    . "</tr>";
                                }
 
                                ?>
                            </tbody> 
                        </table>
                        <!--generates link "add new courses" with image-->
                        <div style="margin-top: 10px;"><a href="<?php echo $GLOBALS["ROOT_URL"]; ?>/course/create"><img src="view/assets/img/add.png" height='18' width='18'/>  <?php echo $lang['addCourse'] ?></a></div>
                    </form>
                </div>
            </section>
        </main>
        <?php
        include 'includes/footer.inc.php';
        ?>
    </body>

</html>
