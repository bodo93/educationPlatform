<!DOCTYPE html>
<?php
include 'includes/translator.inc.php';
include("database/DBConnection.php");

$db = dbConnection::getConnection();
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

    if (mysqli_query($mysqli, $insert)) {
        header("Location: " . $GLOBALS["ROOT_URL"] . "/course/overview");
        echo "Daten eingefügt!";
    } else {
        echo "Error: " . $insert . "<br>" . mysqli_error($conn);
    }
    echo "<meta http-equiv='refresh' content='0'>";
    mysqli_close($conn);
}
?>
<?php
include 'includes/header.inc.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $lang['addCourse'] ?></title>
        <link rel="stylesheet" type="text/css" href="css.inc.css">
    </head>
    <body style="background-color: rgb(34,36,37);">
        <?php
        include 'includes/header.inc.php';
        ?>
        <main class="page login-page">
            <section class="clean-block clean-form dark">
                <div class="container">
                    <div class="block-heading">
                        <h2 class="text-info" style="margin-bottom: 15px;"><?php echo $lang['editCourse'] ?></h2>
                    </div>
                    <form style="padding-bottom: 30px;max-width: 800px;min-width: 220px;margin-right: 100;padding-right: 0px;">
                        <div class="form-row">
                            <div class="col" style="margin-right: 40px;min-width: 130px;">
                                <div class="form-group" style="margin-bottom: 10px;"><label for="email" style="margin-bottom: 0px;"><?php echo $lang['name'] ?></label><input class="form-control item" type="text" style="min-width: 160px;font-size: 14px;"></div>
                            </div>
                            <div class="col" style="min-width: 130px;margin-right: 40px;">
                                <div class="form-group" style="margin-bottom: 10px;"><label for="email" style="margin-bottom: 0px;"><?php echo $lang['courseType'] ?></label><select class="form-control"><option value="12" selected=""></option><option value="13">Bachelor</option><option value="14">Master</option><option value="">Sonstiges</option></select></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col" style="margin-right: 40px;min-width: 130px;">
                                <div class="form-group" style="margin-bottom: 10px;"><label for="email" style="margin-bottom: 0px;"><?php echo $lang['department'] ?></label><select class="form-control" id="subject"><option value="0"></option><option value="1">Wirtschaft</option><option value="2">IT / Technik</option><option value="4">Recht</option><option value="5">Psychologie </option><option value="6">Sprachen</option><option value="7">Sonstiges</option></select></div>
                            </div>
                            <div class="col" style="min-width: 130px;margin-right: 40px;">
                                <div class="form-group" style="margin-bottom: 10px;"><label for="email" style="margin-bottom: 0px;"><?php echo $lang['costs'] ?></label><input class="form-control item" type="text" style="min-width: 170px;font-size: 14px;"></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col" style="margin-right: 40px;min-width: 130px;">
                                <div class="form-group" style="margin-bottom: 10px;"><label for="email" style="margin-bottom: 0px;"><?php echo $lang['area'] ?></label><select class="form-control" id="subject"><option value="" selected=""></option><option value="1">Westschweiz</option><option value="2">Mittelland</option><option value="3">Nordwestschweiz / Zürich</option><option value="4">Ostschweiz</option><option value="5">Tessin / Wallis</option></select></div>
                            </div>
                            <div class="col" style="min-width: 130px;margin-right: 40px;">
                                <div class="form-group" style="margin-bottom: 10px;"><label for="email" style="margin-bottom: 0px;"><?php echo $lang['startDate'] ?></label><input class="form-control" type="date"></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col" style="margin-right: 40px;min-width: 130px;">
                                <div class="form-group" style="margin-bottom: 10px;"><label for="email" style="margin-bottom: 0px;"><?php echo $lang['postCode'] ?></label><input class="form-control item" type="text" style="min-width: 160px;font-size: 14px;"></div>
                            </div>
                            <div class="col" style="min-width: 130px;margin-right: 40px;">
                                <div class="form-group" style="margin-bottom: 10px;"><label for="email" style="margin-bottom: 0px;"><?php echo $lang['endDate'] ?></label><input class="form-control" type="date"></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col" style="margin-right: 40px;min-width: 130px;">
                                <div class="form-group" style="margin-bottom: 10px;"><label for="email" style="margin-bottom: 0px;"><?php echo $lang['place'] ?></label><input class="form-control item" type="text" style="min-width: 160px;font-size: 14px;"></div>
                            </div>
                            <div class="col" style="min-width: 130px;margin-right: 40px;">
                                <div class="form-group" style="margin-bottom: 10px;"><label for="email" style="margin-bottom: 0px;"><?php echo $lang['link'] ?></label><input class="form-control" type="email"></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col" style="margin-right: 40px;min-width: 130px;"><a class="btn btn-primary" role="button" href="createCourse2.html" style="width: 142px;margin-top: 10px;"><?php echo $lang['next'] ?></a></div>
                            <div class="col" style="margin-right: 40px;min-width: 130px;"><a class="btn btn-primary" role="button" href="myCourses.html" style="width: 142px;margin-top: 10px;"><?php echo $lang['cancel'] ?></a></div>
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
<!--
    
    <body style="background-color: rgb(34,36,37);">
        <h3><?php echo $lang['addCourse'] ?> </h3>
        <form action="" method="post">

            <table border="0">
                <tr>
                    <td>ID </td>
                    <td><input type="text" name="id" size="30" maxlength="40" value="<?php
                        $result = mysqli_query($mysqli, "
                        SHOW TABLE STATUS LIKE 'course'");
                        $data = mysqli_fetch_assoc($result);
                        echo $data['Auto_increment'];
                        ?>" disabled></td>
                </tr>
                <tr>
                    <td><?php echo $lang['name'] ?> </td>
                    <td><input type="text" name="name" size="30" maxlength="40"></td>
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
                            if (mysqli_query($mysqli, $select)) {
                                $result = mysqli_query($mysqli, $select);
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
                            if (mysqli_query($mysqli, $select)) {
                                $result = mysqli_query($mysqli, $select);
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
                            if (mysqli_query($mysqli, $select)) {
                                $result = mysqli_query($mysqli, $select);
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
                            if (mysqli_query($mysqli, $select)) {
                                $result = mysqli_query($mysqli, $select);
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
</html>!-->
