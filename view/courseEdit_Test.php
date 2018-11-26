<!DOCTYPE html>
<?php
include 'includes/translator.inc.php';
use database\DBConnection;
?>

<html>
    <body style="background-color: rgb(34,36,37);">
        <?php 
        /*
        $db = DBConnection::getConnection();
        $mysqli = $db->getConnection();

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

            $result = $mysqli->query($insert);
            if ($result) {
                header("Location: " . $GLOBALS["ROOT_URL"] . "/course/overview");
            } else {
                echo "Error: " . $insert . "<br>" . mysqli_error($conn);
            }
            echo "<meta http-equiv='refresh' content='0'>";
            mysqli_close($conn);
        }*/
        include 'includes/header.inc.php';
        ?>
        <main class="page login-page">
            <section class="clean-block clean-form dark" style="min-height: 660px; padding-top: 100px;">
                <div class="container">
                    <div class="block-heading">
                        <h2 class="text-info" style="margin-bottom: 15px;"><?php echo $lang['courseEdit'] ?></h2>
                    </div>
                    <form action="<?php echo $GLOBALS["ROOT_URL"]; ?>/course/editTest" method="post" style="padding-bottom: 30px;max-width: 800px;min-width: 220px;margin-right: 100;padding-right: 0px;">
                        <?php
                        $db = DBConnection::getConnection();
                        $mysqli = $db->getConnection();                

                        $id = 0;
                        if ($_GET) {
                            // keep track post values
                            $id = $_GET['id'];
                            echo "<h3>".$id."</h3>";
                        } else if ($_POST) {
                            echo "<h3>".$_POST('id')."</h3>";
                            $id = $_POST['id'];
                            $update = "UPDATE course SET `Name` = '" . $_POST['name'] . "', "
                                    . "`PostCode` = '" . $_POST['postCode'] . "', `Place` = '" . $_POST['place'] . "', "
                                    . "`Start` = '" . $_POST['start'] . "', `End` = '" . $_POST['end'] . "', "
                                    . "`Link` = '" . $_POST['link'] . "', `InstituteID` = '" . $_POST['institute'] . "', "
                                    . "`DepartmentID`= '" . $_POST['department'] . "', `AreaID` = '" . $_POST['area'] . "', `CourseTypeID` = '" . $_POST['courseType'] . "' "
                                    . "WHERE `ID` = '" . $_POST['id'] . "'";
                            $result = $mysqli->query($update);
                            if ($result) {
                                echo "<h3>ERFOLG!!</h3>"
                                header("Location: ".$GLOBALS["ROOT_URL"]."/course/overview");
                            } else {
                                echo "Error: " . $update . "<br>" . mysqli_error($conn);
                            }
                        }
                        //Query
                        $select = "Select * from course where ID = '$id'";

                        //Ausführen
                        $result = $mysqli->query($select);
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
                
                        echo "<div class='form-row'>
                            <div class='col' style='margin-right: 40px;min-width: 130px;'>
                                <div class='form-group' style='margin-bottom: 10px;'><label for='email' style='margin-bottom: 0px;'>" . $lang['name'] . "</label><input class='form-control item' type='text' style='min-width: 160px;font-size: 14px;' name='name' value='" . $name . "' required></div>
                            </div>
                            <div class='col' style='min-width: 130px;margin-right: 40px;'>
                                <div class='form-group' style='margin-bottom: 10px;'><label for='email' style='margin-bottom: 0px;'>" . $lang['courseType'] . "</label>
                                    <select class='form-control' name='courseType'>";
                                    $select = "Select DISTINCT ID, Name from courseType";
                                    $result = $mysqli->query($select);
                                    if ($result) {
                                        $result = $mysqli->query($select);
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $id = $row["ID"];
                                            $name = $row["Name"];
                                            echo '<option value="' . $id . '">' . $name . '</option>';
                                        }
                                    }
                                    echo "</select>
                                </div>
                            </div>
                        </div>
                        <div class='form-row'>
                            <div class='col' style='min-width: 130px;margin-right: 40px;'>
                                <div class='form-group' style='margin-bottom: 10px;'><label for='email' style='margin-bottom: 0px;'>" . $lang['department'] . "</label><select class='form-control' name='department' required>";
                                    $select = "Select DISTINCT ID, Name from department";
                                    $result = $mysqli->query($select);
                                    if ($result) {
                                        $result = $mysqli->query($select);
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $id = $row["ID"];
                                            $name = $row["Name"];
                                            echo '<option value="' . $id . '">' . $name . '</option>';
                                        }
                                    }
                                    echo "</select>
                                </div>
                            </div>
                            <div class='col' style='margin-right: 40px;min-width: 130px;'>
                                <div class='form-group' style='margin-bottom: 10px;'><label for='email' style='margin-bottom: 0px;'>" . $lang['costs'] . "</label><input class='form-control item' type='text' style='min-width: 160px;font-size: 14px;' name='costs' value='" . $costs . "' required></div>
                            </div>
                        </div>
                        <div class='form-row'>
                            <div class='col' style='min-width: 130px;margin-right: 40px;'>
                                <div class='form-group' style='margin-bottom: 10px;'><label for='email' style='margin-bottom: 0px;'>" . $lang['area'] . "</label><select class='form-control' name='area' required>
                                        <option value='NordWestschweiz'>" . $lang['northwest'] . "</option>
                                        <option value='Westschweiz'>" . $lang['west'] . "</option>
                                        <option value='Mittelland'>" . $lang['central'] . "</option>
                                        <option value='Ostschweiz'>" . $lang['east'] . "</option>
                                        <option value='Tessin'>" . $lang['south'] . "</option>
                                    </select>
                                </div>
                            </div>
                            <div class='col' style='margin-right: 40px;min-width: 130px;'>
                                <div class='form-group' style='margin-bottom: 10px;'><label for='email' style='margin-bottom: 0px;'>" . $lang['startDate'] . "</label><input class='form-control item' type='date' style='min-width: 160px;font-size: 14px;' name='start' value='" . $start . "' required></div>
                            </div>
                        </div>
                        <div class='form-row'>
                            <div class='col' style='margin-right: 40px;min-width: 130px;'>
                                <div class='form-group' style='margin-bottom: 10px;'><label for='email' style='margin-bottom: 0px;'>" . $lang['postCode'] . "</label><input class='form-control item' type='text' style='min-width: 160px;font-size: 14px;' name='postCode' value='" . $postCode . "' required></div>
                            </div>
                            <div class='col' style='margin-right: 40px;min-width: 130px;'>
                                <div class='form-group' style='margin-bottom: 10px;'><label for='email' style='margin-bottom: 0px;'>" . $lang['endDate'] . "</label><input class='form-control item' type='date' style='min-width: 160px;font-size: 14px;' name='end' value='" . $end . "' required></div>
                            </div>
                        </div>
                        <div class='form-row'>
                            <div class='col' style='margin-right: 40px;min-width: 130px;'>
                                <div class='form-group' style='margin-bottom: 10px;'><label for='email' style='margin-bottom: 0px;'>" . $lang['place'] . "</label><input class='form-control item' type='text' style='min-width: 160px;font-size: 14px;' name='place' value='" . $place . "' required></div>
                            </div>
                            <div class='col' style='margin-right: 40px;min-width: 130px;'>
                                <div class='form-group' style='margin-bottom: 10px;'><label for='email' style='margin-bottom: 0px;'>" . $lang['link'] . "</label><input class='form-control item' type='url' style='min-width: 160px;font-size: 14px;' name='link' value='" . $link . "' required></div>
                            </div>
                            <input class='form-control item' type='hidden' style='min-width: 160px;font-size: 14px;' name='institute' value='" . $institute . "' required>
                                <input class='form-control item' type='hidden' style='min-width: 160px;font-size: 14px;' name='id' value='" . $id . "' required>
                        </div>
                        <div class='form-row'>
                            
                            <div class='col' style='margin-right: 40px;min-width: 130px;'><input class='btn btn-primary' type='submit' style='width: 142px;margin-top: 10px;' value='" . $lang['next'] . "'></div>
                            <div class='col' style='margin-right: 40px;min-width: 130px;'><a class='btn btn-primary' role='button' href=" . $DOMAIN_URL . "/course/overview' style='width: 142px;margin-top: 10px;'>" . $lang['cancel'] . "</a></div>
                            <div class='col' style='margin-right: 40px;min-width: 130px;height: 40px;'></div>
                            <div class='col' style='margin-right: 40px;min-width: 130px;height: 40px;'></div>
                        </div>";
                        ?>
                    </form>
                    <script>
                        function checkURL (abc) {
                        var string = abc.value;
                        if (!~string.indexOf("http")) {
                            string = "http://" + string;
                        }
                        abc.value = string;
                        return abc
                        }
                    </script>
                </div>
            </section>
        </main>
        <?php
        include 'includes/footer.inc.php';
        ?>
    </body>   
</html>
