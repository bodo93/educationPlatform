<!DOCTYPE html>
<?php
include 'includes/translator.inc.php';
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
                        <h2 class="text-info" style="margin-bottom: 15px;"><?php echo $lang['courseCreate'] ?></h2>
                    </div>
                    <form action="<?php echo $GLOBALS["ROOT_URL"]; ?>/course/create" method="post" style="padding-bottom: 30px;max-width: 800px;min-width: 220px;margin-right: 100;padding-right: 0px;">
                        <div class="form-row">
                            <div class="col" style="margin-right: 40px;min-width: 130px;">
                                <div class="form-group" style="margin-bottom: 10px;"><label for="email" style="margin-bottom: 0px;"><?php echo $lang['name'] ?></label><input class="form-control item" type="text" style="min-width: 160px;font-size: 14px;" name="name" required></div>
                            </div>
                            <div class="col" style="min-width: 130px;margin-right: 40px;">
                                <div class="form-group" style="margin-bottom: 10px;"><label for="email" style="margin-bottom: 0px;"><?php echo $lang['courseType'] ?></label>
                                    <select class="form-control" name="courseType" required>
                                        <option disabled selected value></option>
                                        <option value="1">Bachelor</option>
                                        <option value="2">Master</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col" style="margin-right: 40px;min-width: 130px;">
                                <div class="form-group" style="margin-bottom: 10px;"><label for="email" style="margin-bottom: 0px;"><?php echo $lang['department'] ?></label>
                                    <select class="form-control" name="department" required>
                                        <option disabled selected value></option>
                                        <option value="1"><?php echo $lang['economy']?></option>
                                        <option value="2"><?php echo $lang['it']?></option>
                                        <option value="3"><?php echo $lang['math']?></option>
                                        <option value="4"><?php echo $lang['other']?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col" style="min-width: 130px;margin-right: 40px;">
                                <div class="form-group" style="margin-bottom: 10px;"><label for="email" style="margin-bottom: 0px;"><?php echo $lang['costs'] ?></label><input class="form-control item" type="text" style="min-width: 170px;font-size: 14px;" name="costs" required></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col" style="margin-right: 40px;min-width: 130px;">
                                <div class="form-group" style="margin-bottom: 10px;"><label for="email" style="margin-bottom: 0px;"><?php echo $lang['area'] ?></label>
                                    <br/><select class="form-control" name="area" required>
                                        <option value='1'><?php echo $lang['northwest']?></option>
                                        <option value='2'><?php echo $lang['west']?></option>
                                        <option value='3'><?php echo $lang['central']?></option>
                                        <option value='4'><?php echo $lang['east']?></option>
                                        <option value='5'><?php echo $lang['south']?></option>
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
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="terms" />
                                    <label class="form-check-label" for="checkbox"><em>AGB gelesen und akzeptiert</em><br /></label>
                                </div>
                                
                            </div>
                            <div class="col" style="min-width: 130px;margin-right: 40px;">
                                <div class="form-group" style="margin-bottom: 10px;"><label for="email" style="margin-bottom: 0px;"><?php echo $lang['link'] ?></label><input class="form-control" type="url" name="link" onblur="checkURL(this)" required></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col" style="margin-right: 40px;min-width: 130px;"><button class="btn btn-primary" id="registerBtn" type="submit" style="width: 142px;margin-top: 10px;"><?php echo $lang['save'] ?></button></div>
                            <div class="col" style="margin-right: 40px;min-width: 130px;"><a class="btn btn-primary" role="button" href="<?php echo $GLOBALS['ROOT_URL']?>/course/overview" style="width: 142px;margin-top: 10px;"><?php echo $lang['cancel'] ?></a></div>
                            <div class="col" style="margin-right: 40px;min-width: 130px;height: 40px;"></div>
                            <div class="col" style="margin-right: 40px;min-width: 130px;height: 40px;"></div>
                        </div>
                    </form>
                    <!--adds "http://" on URL input field-->
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
                    <!--enables butten after terms check box ist checked-->
                    <script>
                            $(function(){ 
                                    var button = $('#registerBtn');
                                    button.attr('disabled', 'disabled');
                                    $('#terms').change(function(e){
                                    if (this.checked){
                                            button.removeAttr('disabled');
                                    } else {
                                    button.attr('disabled', 'disabled');
                                    }
                                 });
                                });
                    </script>
        
                </div>
            </section>
        </main>
        <?php
        include 'includes/footer.inc.php';
        ?>
    </body>   
</html> 
