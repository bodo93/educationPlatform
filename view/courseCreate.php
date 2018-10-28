<!DOCTYPE html>
<?php
include 'view/includes/translator.inc.php';
include("view/includes/DBconnection.inc.php");
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $lang['addCourse'] ?></title>
        <link rel="stylesheet" type="text/css" href="css.inc.css">
    </head>
    <body>
        <?php
        if (!empty($_POST)) {

            // Formularinhalte in Variablen schreiben
            $name = $_POST['name'];
            $postCode = $_POST['postCode'];
            $place = $_POST['place'];
            $costs = $_POST['costs'];
            $start = $_POST['start'];
            $end = $_POST['end'];
            $link = $_POST['link'];
            $institute = $_POST['institute'];
            $department = $_POST['department'];
            $area = $_POST['area'];
            $courseType = $_POST['courseType'];

            $insert = "INSERT INTO `course` (`ID`, `Name`, `PostCode`, `Place`, `Costs`, `Start`, `End`, `Link`, `InstituteID`, `DepartmentID`, `AreaID`, `CourseTypeID`) VALUES (NULL, '$name', '$postCode', '$place', '$costs', '$start', '$end', '$link', '$institute', '$department', '$area', '$courseType')";

            if (mysqli_query($conn, $insert)) {
                //header("Location: /educationPlatform/course/overview'");
                echo "Daten eingefügt!";
            } else {
                echo "Error: " . $insert . "<br>" . mysqli_error($conn);
            }
            echo "<meta http-equiv='refresh' content='0'>";
            mysqli_close($conn);
        }
        ?>

        <h3><?php echo $lang['addCourse'] ?> </h3>
        <form action="coursesInsert.php" method="post">

            <table border="0">
                <tr>
                    <td>ID </td>
                    <td><input type="text" name="id" size="30" maxlength="40" value="<?php
                        $result = mysqli_query($conn, "
                        SHOW TABLE STATUS LIKE 'course'");
                        $data = mysqli_fetch_assoc($result);
                        echo $data['Auto_increment'];
                        ?>" disabled></td>
                </tr>
                <tr>
                    <td><?php echo $lang['name'] ?> </td>
                    <td><input type="text" name="bezeichnung" size="30" maxlength="40"></td>
                </tr>
                <tr>
                    <td><?php echo $lang['postCode'] ?> </td>
                    <td><input type="text" name="postCode" size="30" maxlength="40"></td>
                </tr>
                <tr>
                    <td><?php echo $lang['place'] ?> </td>
                    <td><input type="text" name="place" size="30" maxlength="40"></td>
                </tr>
                <tr>
                    <td><?php echo $lang['costs'] ?> </td>
                    <td><input type="text" name="costs" size="30" maxlength="40"></td>
                </tr>
                <tr>
                    <td><?php echo $lang['startDate'] ?> </td>
                    <td><input type="date" name="start" size="30" maxlength="40"></td>
                </tr>
                <tr>
                    <td><?php echo $lang['endDate'] ?> </td>
                    <td><input type="date" name="end" size="30" maxlength="40"></td>
                </tr>
                <tr>
                    <td><?php echo $lang['link'] ?> </td>
                    <td><input type="text" name="link" size="30" maxlength="40"></td>
                </tr>
                <tr>
                    <td><?php echo $lang['institute'] ?> </td>
                    <td><select name="institute" maxlength="40">
                            <option disabled selected value></option><?php
                            $select = "Select ID, Name from Institute";
                            if (mysqli_query($conn, $select)) {
                                $result = mysqli_query($conn, $select);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $id = $row["ID"];
                                    $name = $row["Name"];
                                    echo '<option value="' . $id . '">' . $name . '</option>';
                                }
                            }
                            ?></select></td>
                </tr>
                <tr>
                    <td><?php echo $lang['department'] ?> </td>
                    <td><select name="department" maxlength="40">
                            <option disabled selected value></option><?php
                            $select = "Select ID, Name from department";
                            if (mysqli_query($conn, $select)) {
                                $result = mysqli_query($conn, $select);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $id = $row["ID"];
                                    $name = $row["Name"];
                                    echo '<option value="' . $id . '">' . $name . '</option>';
                                }
                            }
                            ?><</select></td>
                </tr>
                <tr>
                    <td><?php echo $lang['area'] ?> </td>
                    <td><select name="area" maxlength="40">
                            <option disabled selected value></option><?php
                            $select = "Select ID, Name from area";
                            if (mysqli_query($conn, $select)) {
                                $result = mysqli_query($conn, $select);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $id = $row["ID"];
                                    $name = $row["Name"];
                                    echo '<option value="' . $id . '">' . $name . '</option>';
                                }
                            }
                            ?><</select></td>
                </tr>
                <tr>
                    <td><?php echo $lang['courseType'] ?> </td>
                    <td><select name="courseType" maxlength="40">
                            <option disabled selected value></option><?php
                            $select = "Select ID, Name from coursetype";
                            if (mysqli_query($conn, $select)) {
                                $result = mysqli_query($conn, $select);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $id = $row["ID"];
                                    $name = $row["Name"];
                                    echo '<option value="' . $id . '">' . $name . '</option>';
                                }
                            }
                            ?><</select></td>
                </tr>
            </table>
            <br/>
            <input type="Submit" name="save" value="<?php echo $lang['save'] ?>"/>
            <input type="button" name="cancel" value="<?php echo $lang['cancel'] ?>" onclick="window.location.href='/educationPlatform/course/overview'"/>
        </form>
        <br/>
    </body>   
</html>
