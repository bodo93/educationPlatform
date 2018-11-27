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
        
        $id = $_SESSION['userID'];

        if ($_POST) {
            $update = "UPDATE institute SET `Name` = '" . $_POST['name'] . "', "
                    . "`Street` = '" . $_POST['street'] . "', `HouseNumber` = '" . $_POST['houseNumber'] . "', "
                    . "`PostCode` = '" . $_POST['postCode'] . "', `Place` = '" . $_POST['place'] . "', "
                    . "`Place` = '" . $_POST['place'] . "', `Email` = '" . $_POST['email'] . "' "
                    . "WHERE `ID` = '$id'";
            $result = $mysqli->query($update);
            
            if ($result) {
                header("Location: ".$GLOBALS["ROOT_URL"]."/institute");
            } else {
                echo "Error: ";
            }
            
            exit();
        }   
        
        //Query
        $select = "Select * from institute where ID = '$id'";
        //Ausführen
        $result = $mysqli->query($select);
        $row = mysqli_fetch_array($result);
        $name = $row['Name'];
        $email = $row['Email'];
        $street = $row['Street'];
        $houseNumber = $row['HouseNumber'];
        $postCode = $row['PostCode'];
        $place = $row['Place'];

        include 'includes/header.inc.php';
        ?>
        <main class="page login-page">
            <section class="clean-block clean-form dark" style="min-height: 660px; padding-top: 100px;">
                <div class="container">
                    <div class="block-heading">
                        <h2 class="text-info" style="margin-bottom: 15px;"><?php echo $lang['courseEdit'] ?></h2>
                    </div>
                    <form action="<?php echo $GLOBALS["ROOT_URL"]; ?>/institute" method="post" style="padding-bottom: 30px;max-width: 800px;min-width: 220px;margin-right: 100;padding-right: 0px;">
                        <div class="form-row">
                            <div class="col" style="margin-right: 40px;min-width: 130px;">
                                <div class="form-group" style="margin-bottom: 10px;"><label for="email" style="margin-bottom: 0px;"><?php echo $lang['userName']?></label><input class="form-control" type="text" name="email" value="<?php echo $email; ?>"></div>
                            </div>
                            <div class="col" style="min-width: 130px;margin-right: 40px;">
                                <div class="form-group" style="margin-bottom: 10px;"><label for="email" style="margin-bottom: 0px;"><?php echo $lang['street']?></label><input class="form-control" type="text" name="street" value="<?php echo $street; ?>"></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col" style="margin-right: 40px;min-width: 130px;">
                                <div class="form-group" style="margin-bottom: 10px;"><label for="email" style="margin-bottom: 0px;"><?php echo $lang['institute']?></label><input class="form-control" type="text" name="name" value="<?php echo $name; ?>"></div>
                            </div>
                            <div class="col" style="min-width: 130px;margin-right: 40px;">
                                <div class="form-group" style="margin-bottom: 10px;"><label for="email" style="margin-bottom: 0px;"><?php echo $lang['streetNr']?></label><input class="form-control" type="text" name="houseNumber" value="<?php echo $houseNumber; ?>"></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col" style="margin-right: 40px;min-width: 130px;">
                                <div class="form-group" style="margin-bottom: 10px;"><label for="email" style="margin-bottom: 0px;"><?php echo $lang['postCode']?></label><input class="form-control" type="text" name="postCode" value="<?php echo $postCode; ?>"></div>
                            </div>
                            <div class="col" style="min-width: 130px;margin-right: 40px;">
                                <div class="form-group" style="margin-bottom: 10px;"><label for="email" style="margin-bottom: 0px;"><?php echo $lang['place']?></label><input class="form-control" type="text" name="place" value="<?php echo $place; ?>">
                                <input class="form-control-plaintext" type="hidden" name="id" value="<?php echo $id; ?>" readonly="">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class='col' style='margin-right: 40px;min-width: 130px;'><input class='btn btn-primary' type='submit' style='width: 142px;margin-top: 10px;' value='<?php echo $lang['next']?>'></div>
                            <div class="col" style="margin-right: 40px;min-width: 130px;height: 40px;"><a class="btn btn-primary" role="button" href="<?php echo $GLOBALS['ROOT_URL']?>/search" style="width: 142px;margin-top: 10px;"><?php echo $lang['cancel']?></a></div>
                            <div class="col" style="margin-right: 40px;min-width: 130px;height: 40px;"></div>
                            <div class="col" style="margin-right: 40px;min-width: 130px;height: 40px;"></div>
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