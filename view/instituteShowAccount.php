<!DOCTYPE html>
<?php
/*
 * Author: René Schwab
 */

use database\DBConnection;
include 'includes/translator.inc.php';

//open connection
$db = DBConnection::getConnection();
$mysqli = $db->getConnection();  

// Read institute data
$stmt = $mysqli->prepare("Select * from institute where ID = ?");
$stmt->bind_param('i', $id);
$id = $_SESSION['userID'];
$stmt->execute();
$institute = $stmt->get_result()->fetch_object("model\Institute");
?>

<html>
    <body style="background-color: rgb(34,36,37);">
        <?php
        include 'includes/header.inc.php';
        ?>
        <main class="page login-page">
            <section class="clean-block clean-form dark" style="min-height: 660px; padding-top: 100px;">
                <div class="container">
                    <div class="block-heading">
                        <h2 class="text-info" style="margin-bottom: 15px;"><?php echo $lang['userprofile'] ?></h2>
                    </div>
                    <form style="padding-bottom: 30px;max-width: 800px;min-width: 220px;margin-right: 100;padding-right: 0px;">
                        <div class="form-row">
                            <div class="col" style="margin-right: 40px;min-width: 130px;">
                                <div class="form-group" style="margin-bottom: 10px;"><label for="email" style="margin-bottom: 0px;"><?php echo $lang['userName']?></label><input class="form-control" type="text" name="email" value="<?php echo $institute->getEmail(); ?>" disabled></div>
                            </div>
                            <div class="col" style="min-width: 130px;margin-right: 40px;">
                                <div class="form-group" style="margin-bottom: 10px;"><label for="email" style="margin-bottom: 0px;"><?php echo $lang['street']?></label><input class="form-control" type="text" name="street" value="<?php echo $institute->getStreet(); ?>" disabled></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col" style="margin-right: 40px;min-width: 130px;">
                                <div class="form-group" style="margin-bottom: 10px;"><label for="email" style="margin-bottom: 0px;"><?php echo $lang['institute']?></label><input class="form-control" type="text" name="name" value="<?php echo $institute->getName(); ?>" disabled></div>
                            </div>
                            <div class="col" style="min-width: 130px;margin-right: 40px;">
                                <div class="form-group" style="margin-bottom: 10px;"><label for="email" style="margin-bottom: 0px;"><?php echo $lang['streetNr']?></label><input class="form-control" type="text" name="houseNumber" value="<?php echo $institute->getHouseNumber(); ?>" disabled></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col" style="margin-right: 40px;min-width: 130px;">
                                <div class="form-group" style="margin-bottom: 10px;"><label for="email" style="margin-bottom: 0px;"><?php echo $lang['postCode']?></label><input class="form-control" type="text" name="postCode" value="<?php echo $institute->getPostCode(); ?>" disabled></div>
                            </div>
                            <div class="col" style="min-width: 130px;margin-right: 40px;">
                                <div class="form-group" style="margin-bottom: 10px;"><label for="email" style="margin-bottom: 0px;"><?php echo $lang['place']?></label><input class="form-control" type="text" name="place" value="<?php echo $institute->getPlace(); ?>" disabled>
                                <input class="form-control-plaintext" type="hidden" name="id" value="<?php echo $id; ?>" readonly="">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class='col' style='margin-right: 40px;min-width: 130px;'><a class="btn btn-primary" role="button" href="<?php echo $GLOBALS['ROOT_URL']?>/institute/edit" style="width: 142px;margin-top: 10px;"><?php echo $lang['edit']?></a></div>
                            <div class='col' style='margin-right: 40px;min-width: 130px;'><a class="btn btn-primary" role="button" href="<?php echo $GLOBALS['ROOT_URL']?>/institute/delete" style="width: 142px;margin-top: 10px;background-color:red"><?php echo $lang['deleteInstitute']?></a></div>
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