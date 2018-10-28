<!DOCTYPE html>
<!--
author: Bodo Grütter
-->
<?php
include 'view/includes/translator.inc.php';
include("view/includes/DBconnection.inc.php");
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="userprofile.css">
        <link rel="stylesheet" type="text/css" href="all.css">
        <title><?php echo $lang['editCourse'] ?></title>
    </head>
    <body>
        <h3><?php echo $lang['editCourse'] ?></h3>
        <form action="coursesUpdate.php" method="post">
            <table>
                <?php
                $id = 0;
                if ($_GET) {
                    // keep track post values
                    $id = $_GET['id'];
                } else if ($_POST) {
                    $id = $_POST['id'];
                    $update = "Update course set `Name` = '" . $_POST['name'] . "', `"
                            . "PostCode` = '" . $_POST['postCode'] . "', `Place` = '" . $_POST['place'] . "', "
                            . "`Start` = '" . $_POST['start'] . "', `End` = '" . $_POST['end'] . "', "
                            . "`Link` = '" . $_POST['link'] . "', `InstituteID` = '" . $_POST['institute'] . "', "
                            . "`DepartmentID`= '" . $_POST['department'] . "', `AreaID` = '" . $_POST['area'] . "', `CourseTypeID` = '" . $_POST['courseType'] . "' "
                            . "where `ID` = '" . $_POST['id'] . "'";
                    if (mysqli_query($conn, $update)) {
                        header("Location:courseOverview.php");
                    } else {
                        echo "Error: " . $update . "<br>" . mysqli_error($conn);
                    }
                    mysqli_close($conn);
                }
                //Query
                $select = "Select * from course where ID = '$id'";

                //Ausführen
                $result = mysqli_query($conn, $select);
                $row = mysqli_fetch_array($result);
                $id = $row['ID'];
                $name = $row['Name'];
                $postCode = $row['PostCode'];
                $place = $row['Place'];
                $costs = $row['Costs'];
                $start = $row['Start'];
                $end = $row['End'];
                $link = $row['Link'];
                $institute = $row['InstituteID'];
                $department = $row['DepartmentID'];
                $area = $row['AreaID'];
                $courseType = $row['CourseTypeID'];

                //Formular anzeigen und mit Daten füllen
                echo "<tr><td>ID</td><td><input type='text' name='id' value='" . $id . "' /></td></tr>"
                . "<tr><td>";
                echo $lang['name'] . "</td><td><input type='text' name='name' value='" . $name . "' /></td></tr>"
                . "<tr><td>";
                echo $lang['postCode'] . "</td><td><input type='text' name='postCode' value='" . $postCode . "' /></td></tr>"
                . "<tr><td>";
                echo $lang['place'] . "</td><td><input type='text' name='place' value='" . $place . "' /></td></tr>"
                . "<tr><td>";
                echo $lang['costs'] . "</td><td><input type='text' name='costs' value='" . $costs . "' /></td></tr>"
                . "<tr><td>";
                echo $lang['startDate'] . "</td><td><input type='date' name='start' value='" . $start . "' /></td></tr>"
                . "<tr><td>";
                echo $lang['endDate'] . "</td><td><input type='date' name='end' value='" . $end . "' /></td></tr>"
                . "<tr><td>";
                echo $lang['link'] . "</td><td><input type='text' name='link' value='" . $link . "' /></td></tr>"
                . "<tr><td>";
                echo $lang['institute'] . "</td><td><select name='institute' maxlength='40'>"
                . "<option selected value='" . $institute . "'>" . $institute . "</option>";
                $select = "Select DISTINCT ID, Name from Institute";
                if (mysqli_query($conn, $select)) {
                    $result = mysqli_query($conn, $select);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row["ID"];
                        $name = $row["Name"];
                        echo '<option value="' . $id . '">' . $name . '</option>';
                    }
                }
                echo "</select></td></tr>"
                . "<tr><td>";
                echo $lang['department'] . "</td><td><select name='department' maxlength='40'>"
                . "<option selected value='" . $department . "'>" . $department . "</option>";
                $select = "Select DISTINCT ID, Name from Department";
                if (mysqli_query($conn, $select)) {
                    $result = mysqli_query($conn, $select);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row["ID"];
                        $name = $row["Name"];
                        echo '<option value="' . $id . '">' . $name . '</option>';
                    }
                }
                echo "</select></td></tr>"
                . "<tr><td>";
                echo $lang['area'] . "</td><td><select name='area' maxlength='40'>"
                . "<option selected value='" . $area . "'>" . $area . "</option>";
                $select = "Select DISTINCT ID, Name from Area";
                if (mysqli_query($conn, $select)) {
                    $result = mysqli_query($conn, $select);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row["ID"];
                        $name = $row["Name"];
                        echo '<option value="' . $id . '">' . $name . '</option>';
                    }
                }
                echo "</select></td></tr>"
                . "<tr><td>";
                echo $lang['courseType'] . "</td><td><select name='courseType' maxlength='40'>"
                . "<option selected value='" . $courseType . "'>" . $courseType . "</option>";
                $select = "Select DISTINCT ID, Name from CourseType";
                if (mysqli_query($conn, $select)) {
                    $result = mysqli_query($conn, $select);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row["ID"];
                        $name = $row["Name"];
                        echo '<option value="' . $id . '">' . $name . '</option>';
                    }
                }
                echo "</select></td></tr>"
                . "<tr><td><input type='submit' name'save' value='";
                echo $lang['save'] . "'></td><td><input type='button' name'cancel' value='";
                echo $lang['cancel'] . "' onclick='window.location.href='/educationPlatform/course/overview''></td></tr>";
                ?>
            </table>
        </form>
    </body>
</html>