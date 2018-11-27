<!DOCTYPE html>
<?php
include 'includes/translator.inc.php';
use database\DBConnection;
?>

<html>
    <body style="background-color: rgb(34,36,37);">
        <?php
        $db = DBConnection::getConnection();
        $mysqli = $db->getConnection();                

        $id = 0;
        if ($_GET) {
            // keep track post values
            $id = $_GET['id'];
        } else if ($_POST) {
            $update = "UPDATE course SET `Name` = '" . $_POST['name'] . "', "
                    . "`PostCode` = '" . $_POST['postCode'] . "', `Place` = '" . $_POST['place'] . "', "
                    . "`Start` = '" . $_POST['start'] . "', `End` = '" . $_POST['end'] . "', "
                    . "`Start` = '" . $_POST['start'] . "', "
                    . "`Link` = '" . $_POST['link'] . "', `InstituteID` = '" . $_POST['institute'] . "', "
                    . "`DepartmentID`= '" . $_POST['department'] . "', `AreaID` = '" . $_POST['area'] . "', `CourseTypeID` = '" . $_POST['courseType'] . "' "
                    . "WHERE `ID` = '" . $_POST['id'] . "'";
            $result = $mysqli->query($update);
            if ($result) {
                header("Location: ".$GLOBALS["ROOT_URL"]."/course/overview");
            } else {
                echo "Error: " . $update . "<br>" . mysqli_error($conn);
            }
        }

        include 'includes/header.inc.php';
        
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
        ?>
        <main class="page login-page">
            <section class="clean-block clean-form dark" style="min-height: 660px; padding-top: 100px;">
                <div class="container">
                    <div class="block-heading">
                        <h2 class="text-info" style="margin-bottom: 15px;"><?php echo $lang['courseEdit'] ?></h2>
                    </div>
                    <form action="<?php echo $GLOBALS["ROOT_URL"]; ?>/course/edit" method="post" style="padding-bottom: 30px;max-width: 800px;min-width: 220px;margin-right: 100;padding-right: 0px;">
                        <div class='form-row'>
                            <div class='col' style='margin-right: 40px;min-width: 130px;'>
                                <div class='form-group' style='margin-bottom: 10px;'><label for='email' style='margin-bottom: 0px;'><?php echo $lang['name']?></label><input class='form-control item' type='text' style='min-width: 160px;font-size: 14px;' name='name' value='<?php echo $name?>' required></div>
                            </div>
                            <div class='col' style='min-width: 130px;margin-right: 40px;'>
                                <div class='form-group' style='margin-bottom: 10px;'><label for='email' style='margin-bottom: 0px;'><?php echo $lang['courseType']?></label><select class='form-control' name='courseType' required>";
                                    <?php
                                    $select = "Select DISTINCT ID, Name from coursetype";
                                    $result = $mysqli->query($select);
                                    if ($result) {
                                        $result = $mysqli->query($select);
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $id = $row["ID"];
                                            $name = $row["Name"];
                                            echo '<option value="' . $id . '">' . $name . '</option>';
                                        }
                                    }?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class='form-row'>
                            <div class='col' style='min-width: 130px;margin-right: 40px;'>
                                <div class='form-group' style='margin-bottom: 10px;'><label for='email' style='margin-bottom: 0px;'><?php echo $lang['department']?></label><select class='form-control' name='department' required>";
                                    <?php
                                    $select = "Select DISTINCT ID, Name from department";
                                    $result = $mysqli->query($select);
                                    if ($result) {
                                        $result = $mysqli->query($select);
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $id = $row["ID"];
                                            $name = $row["Name"];
                                            echo '<option value="' . $id . '">' . $name . '</option>';
                                        }
                                    }?>
                                    </select>
                                </div>
                            </div>
                            <div class='col' style='margin-right: 40px;min-width: 130px;'>
                                <div class='form-group' style='margin-bottom: 10px;'><label for='email' style='margin-bottom: 0px;'><?php echo $lang['costs']?></label><input class='form-control item' type='text' style='min-width: 160px;font-size: 14px;' name='costs' value='<?php echo $costs?>' required></div>
                            </div>
                        </div>
                        <div class='form-row'>
                            <div class='col' style='min-width: 130px;margin-right: 40px;'>
                                <div class='form-group' style='margin-bottom: 10px;'><label for='email' style='margin-bottom: 0px;'><?php echo $lang['area']?></label><select class='form-control' name='area' required>
                                        <option value='1'><?php echo $lang['northwest']?></option>
                                        <option value='2'><?php echo $lang['west']?></option>
                                        <option value='3'><?php echo $lang['central']?></option>
                                        <option value='4'><?php echo $lang['east']?></option>
                                        <option value='5'><?php echo $lang['south']?></option>
                                    </select>
                                </div>
                            </div>
                            <div class='col' style='margin-right: 40px;min-width: 130px;'>
                                <div class='form-group' style='margin-bottom: 10px;'><label for='email' style='margin-bottom: 0px;'><?php echo $lang['startDate']?></label><input class='form-control item' type='date' style='min-width: 160px;font-size: 14px;' name='start' value='<?php echo $start?>' required></div>
                            </div>
                        </div>
                        <div class='form-row'>
                            <div class='col' style='margin-right: 40px;min-width: 130px;'>
                                <div class='form-group' style='margin-bottom: 10px;'><label for='email' style='margin-bottom: 0px;'><?php echo $lang['postCode']?></label><input class='form-control item' type='text' style='min-width: 160px;font-size: 14px;' name='postCode' value='<?php echo $postCode?>' required></div>
                            </div>
                            <div class='col' style='margin-right: 40px;min-width: 130px;'>
                                <div class='form-group' style='margin-bottom: 10px;'><label for='email' style='margin-bottom: 0px;'><?php echo $lang['endDate']?></label><input class='form-control item' type='date' style='min-width: 160px;font-size: 14px;' name='end' value='<?php echo $end?>' required></div>
                            </div>
                        </div>
                        <div class='form-row'>
                            <div class='col' style='margin-right: 40px;min-width: 130px;'>
                                <div class='form-group' style='margin-bottom: 10px;'><label for='email' style='margin-bottom: 0px;'><?php echo $lang['place']?></label><input class='form-control item' type='text' style='min-width: 160px;font-size: 14px;' name='place' value='<?php echo $place?>' required></div>
                            </div>
                            <div class='col' style='margin-right: 40px;min-width: 130px;'>
                                <div class='form-group' style='margin-bottom: 10px;'><label for='email' style='margin-bottom: 0px;'><?php echo $lang['link']?></label><input class='form-control item' type='url' style='min-width: 160px;font-size: 14px;' name='link' onblur="checkURL(this)" value='<?php echo $link?>' required></div>
                            </div>
                            <input class='form-control item' type='hidden' style='min-width: 160px;font-size: 14px;' name='institute' value='<?php echo $institute?>' required>
                                <input class='form-control item' type='hidden' style='min-width: 160px;font-size: 14px;' name='id' value='<?php echo $id?>' required>
                        </div>
                        <div class='form-row'>
                            
                            <div class='col' style='margin-right: 40px;min-width: 130px;'><input class='btn btn-primary' type='submit' style='width: 142px;margin-top: 10px;' value='<?php echo $lang['next']?>'></div>
                            <div class='col' style='margin-right: 40px;min-width: 130px;'><a class='btn btn-primary' role='button' href="<?php echo $DOMAIN_URL?>/course/overview" style='width: 142px;margin-top: 10px;'><?php echo $lang['cancel']?></a></div>
                            <div class='col' style='margin-right: 40px;min-width: 130px;height: 40px;'></div>
                            <div class='col' style='margin-right: 40px;min-width: 130px;height: 40px;'></div>
                        </div>
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
