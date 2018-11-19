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
        }
        include 'includes/header.inc.php';
        ?>
        <main class="page login-page">
            <section class="clean-block clean-form dark" style="min-height: 660px; padding-top: 100px;">
                <div class="container">
                    <div class="block-heading">
                        <h2 class="text-info" style="margin-bottom: 15px;"><?php echo $lang['courseCreate'] ?></h2>
                    </div>
                    <form action="<?php echo $GLOBALS["ROOT_URL"]; ?>/course/create" method="post" style="padding-bottom: 30px;max-width: 800px;min-width: 220px;margin-right: 100;padding-right: 0px;">
                        <div class="form-row">
                            <div class="col" style="margin-right: 40px;min-width: 130px;">
                                <div class="form-group" style="margin-bottom: 10px;"><label for="email" style="margin-bottom: 0px;"><?php echo $lang['name'] ?></label><input class="form-control item" type="text" style="min-width: 160px;font-size: 14px;" name="name" required></div>
                            </div>
                            <div class="col" style="min-width: 130px;margin-right: 40px;">
                                <div class="form-group" style="margin-bottom: 10px;"><label for="email" style="margin-bottom: 0px;"><?php echo $lang['courseType'] ?></label><select class="form-control" name="courseType" required>
                                        <option value="Bachelor">Bachelor</option>
                                        <option value="Master">Master</option>
                                        <option value="Sonstiges"><?php echo $lang['other'] ?></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col" style="margin-right: 40px;min-width: 130px;">
                                <div class="form-group" style="margin-bottom: 10px;"><label for="email" style="margin-bottom: 0px;"><?php echo $lang['department'] ?></label><select class="form-control" id="subject" name="department" required>
                                        <option value="Wirtschaft"><?php echo $lang['economy'] ?></option>
                                        <option value="Informatik"><?php echo $lang['it'] ?></option>
                                        <option value="Sonstiges"><?php echo $lang['other'] ?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col" style="min-width: 130px;margin-right: 40px;">
                                <div class="form-group" style="margin-bottom: 10px;"><label for="email" style="margin-bottom: 0px;"><?php echo $lang['costs'] ?></label><input class="form-control item" type="text" style="min-width: 170px;font-size: 14px;" name="costs" required></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col" style="margin-right: 40px;min-width: 130px;">
                                <div class="form-group" style="margin-bottom: 10px;"><label for="email" style="margin-bottom: 0px;"><?php echo $lang['area'] ?></label><select class="form-control" id="subject" name="area" required>
                                        <option value="Westschweiz"><?php echo $lang['west'] ?></option>
                                        <option value="Mittelland"><?php echo $lang['central'] ?></option>
                                        <option value="Ostschweiz"><?php echo $lang['east'] ?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col" style="min-width: 130px;margin-right: 40px;">
                                <div class="form-group" style="margin-bottom: 10px;"><label for="email" style="margin-bottom: 0px;"><?php echo $lang['startDate'] ?></label><input class="form-control" type="date" name="start" required></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col" style="margin-right: 40px;min-width: 130px;">
                                <div class="form-group" style="margin-bottom: 10px;"><label for="email" style="margin-bottom: 0px;"><?php echo $lang['postCode'] ?></label><input class="form-control item" type="text" style="min-width: 160px;font-size: 14px;" name="postCode" required></div>
                            </div>
                            <div class="col" style="min-width: 130px;margin-right: 40px;">
                                <div class="form-group" style="margin-bottom: 10px;"><label for="email" style="margin-bottom: 0px;"><?php echo $lang['endDate'] ?></label><input class="form-control" type="date" name="end" required></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col" style="margin-right: 40px;min-width: 130px;">
                                <div class="form-group" style="margin-bottom: 10px;"><label for="email" style="margin-bottom: 0px;"><?php echo $lang['place'] ?></label><input class="form-control item" type="text" style="min-width: 160px;font-size: 14px;" name="place" required></div>
                            </div>
                            <div class="col" style="min-width: 130px;margin-right: 40px;">
                                <div class="form-group" style="margin-bottom: 10px;"><label for="email" style="margin-bottom: 0px;"><?php echo $lang['link'] ?></label><input class="form-control" type="url" name="link" required></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <!--<div class="col" style="margin-right: 40px;min-width: 130px;"><a class="btn btn-primary" role="button" href="createCourse2.html" style="width: 142px;margin-top: 10px;"><?php echo $lang['next'] ?></a></div>-->
                            <div class="col" style="margin-right: 40px;min-width: 130px;"><button class="btn btn-primary" type="submit" style="width: 142px;margin-top: 10px;"><?php echo $lang['next'] ?></button></div>
                            <div class="col" style="margin-right: 40px;min-width: 130px;"><a class="btn btn-primary" role="button" href="<?php echo $DOMAIN_URL ?>/course/overview" style="width: 142px;margin-top: 10px;"><?php echo $lang['cancel'] ?></a></div>
                            <div class="col" style="margin-right: 40px;min-width: 130px;height: 40px;"></div>
                            <div class="col" style="margin-right: 40px;min-width: 130px;height: 40px;"></div>
                        </div>
                    </form>
                </div>
            </section>
        </main>
        <?php
        include 'includes/footer.inc.php';
        ?>
    </body>   
</html>
