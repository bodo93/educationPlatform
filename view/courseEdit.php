<!DOCTYPE html>
<?php
/*
 * Author: René Schwab
 */
include 'includes/translator.inc.php';
use database\DBConnection;
?>

<html>
    <body style="background-color: rgb(34,36,37);">
        <?php
        $db = DBConnection::getConnection();
        $mysqli = $db->getConnection();                

        include 'includes/header.inc.php';
        
        //Query
        $stmt = $mysqli->prepare("Select * from course where ID = ?");
        $stmt->bind_param('i', $id);
        $id = $_GET['id'];
        $stmt->execute();
        $course = $stmt->get_result()->fetch_object("model\Course");
        ?>
        <main class="page login-page">
            <section class="clean-block clean-form dark" style="min-height: 660px; padding-top: 100px;">
                <div class="container">
                    <div class="block-heading">
                        <h2 class="text-info" style="margin-bottom: 15px;"><?php echo $lang['courseEdit'] ?></h2>
                    </div>
                    <form action="<?php echo htmlspecialchars($GLOBALS["ROOT_URL"]); ?>/course/edit" method="post" style="padding-bottom: 30px;max-width: 800px;min-width: 220px;margin-right: 100;padding-right: 0px;">
                        <div class='form-row'>
                            <div class='col' style='margin-right: 40px;min-width: 130px;'>
                                <div class='form-group' style='margin-bottom: 10px;'><label for='email' style='margin-bottom: 0px;'><?php echo $lang['name']?></label><input class='form-control item' type='text' style='min-width: 160px;font-size: 14px;' name='name' value='<?php echo $course->getName();?>' required></div>
                            </div>
                            <div class='col' style='min-width: 130px;margin-right: 40px;'>
                                <div class='form-group' style='margin-bottom: 10px;'><label for='email' style='margin-bottom: 0px;'><?php echo $lang['courseType']?></label><select class='form-control' name='courseType' required>";
                                    <?php
                                    if($course->getCourseTypeId() == 1){
                                        echo "<option value='1' selected>Bachelor</option>
                                        <option value='2'>Master</option>
                                        <option value='3'>" . $lang['other'] . "</option>";
                                    }
                                    else if($course->getCourseTypeId() == 2){
                                        echo "<option value='1'>Bachelor</option>
                                        <option value='2' selected>Master</option>
                                        <option value='3'>" . $lang['other'] . "</option>";
                                    }
                                    else{
                                        echo "<option value='1'>Bachelor</option>
                                        <option value='2'>Master</option>
                                        <option value='3' selected>" . $lang['other'] . "</option>";
                                    }
                                    ?> 
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class='form-row'>
                            <div class='col' style='min-width: 130px;margin-right: 40px;'>
                                <div class='form-group' style='margin-bottom: 10px;'><label for='email' style='margin-bottom: 0px;'><?php echo $lang['department']?></label><select class='form-control' name='department' required>";
                                    <?php
                                    if($course->getDepartmentId() == 1){    
                                        echo "<option value='1' selected>" . $lang['economy'] . "</option>
                                        <option value='2'>" . $lang['it'] . "</option>
                                        <option value='3'>" . $lang['math'] . "</option>
                                        <option value='4'>" . $lang['other'] . "</option>";
                                    }else if($course->getDepartmentId() == 2){
                                        echo "<option value='1'>" . $lang['economy'] . "</option>
                                        <option value='2' selected>" . $lang['it'] . "</option>
                                        <option value='3'>" . $lang['math'] . "</option>
                                        <option value='4'>" . $lang['other'] . "</option>";
                                    }else if($course->getDepartmentId() == 3){
                                        echo "<option value='1'>" . $lang['economy'] . "</option>
                                        <option value='2'>" . $lang['it'] . "</option>
                                        <option value='3' selected>" . $lang['math'] . "</option>
                                        <option value='4'>" . $lang['other'] . "</option>";
                                    }else{
                                        echo "<option value='1'>" . $lang['economy'] . "</option>
                                        <option value='2'>" . $lang['it'] . "</option>
                                        <option value='3'>" . $lang['math'] . "</option>
                                        <option value='4' selected>" . $lang['other'] . "</option>";
                                    }
                                    
                                    ?>
                                    </select>
                                </div>
                            </div>
                            <div class='col' style='margin-right: 40px;min-width: 130px;'>
                                <div class='form-group' style='margin-bottom: 10px;'><label for='email' style='margin-bottom: 0px;'><?php echo $lang['costs']?></label><input class='form-control item' type='text' onblur="checkIsPrice(this)" style='min-width: 160px;font-size: 14px;' name='costs' value='<?php echo $course->getCosts();?>' required></div>
                            </div>
                        </div>
                        <div class='form-row'>
                            <div class='col' style='min-width: 130px;margin-right: 40px;'>
                                <div class='form-group' style='margin-bottom: 10px;'><label for='email' style='margin-bottom: 0px;'><?php echo $lang['area']?></label><select class='form-control' name='area' required>
                                        <?php
                                        if($course->getAreaId() == 1){  
                                        echo "<option value='1' selected>" . $lang['west'] . "</option>
                                        <option value='2'>" . $lang['central'] . "</option>
                                        <option value='3'>" . $lang['east'] . "</option>
                                        <option value='4'>" . $lang['south'] . "</option>";
                                        }else if($course->getAreaId() == 2){
                                        echo "<option value='1'>" . $lang['west'] . "</option>
                                        <option value='2' selected>" . $lang['central'] . "</option>
                                        <option value='3'>" . $lang['east'] . "</option>
                                        <option value='4'>" . $lang['south'] . "</option>";    
                                        }else if($course->getAreaId() == 3){
                                        echo "<option value='1'>" . $lang['west'] . "</option>
                                        <option value='2'>" . $lang['central'] . "</option>
                                        <option value='3' selected>" . $lang['east'] . "</option>
                                        <option value='4'>" . $lang['south'] . "</option>";    
                                        }else if($course->getAreaId() == 4){
                                        echo "<option value='1'>" . $lang['west'] . "</option>
                                        <option value='2'>" . $lang['central'] . "</option>
                                        <option value='3'>" . $lang['east'] . "</option>
                                        <option value='4' selected>" . $lang['south'] . "</option>";    
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class='col' style='margin-right: 40px;min-width: 130px;'>
                                <div class='form-group' style='margin-bottom: 10px;'><label for='email' style='margin-bottom: 0px;'><?php echo $lang['startDate']?></label><input class='form-control item' type='date' id="dateOne" onblur="checkDate(this)" style='min-width: 160px;font-size: 14px;' name='start' value='<?php echo $course->getStart();?>' required></div>
                            </div>
                        </div>
                        <div class='form-row'>
                            <div class='col' style='margin-right: 40px;min-width: 130px;'>
                                <div class='form-group' style='margin-bottom: 10px;'><label for='email' style='margin-bottom: 0px;'><?php echo $lang['postCode']?></label><input class='form-control item' type='text' onblur="checkIsNum(this)" style='min-width: 160px;font-size: 14px;' name='postCode' value='<?php echo $course->getpostCode();?>' required></div>
                            </div>
                            <div class='col' style='margin-right: 40px;min-width: 130px;'>
                                <div class='form-group' style='margin-bottom: 10px;'><label for='email' style='margin-bottom: 0px;'><?php echo $lang['endDate']?></label><input class='form-control item' type='date' onblur="checkDate2(this)" style='min-width: 160px;font-size: 14px;' name='end' value='<?php echo $course->getEnd();?>' required></div>
                            </div>
                        </div>
                        <div class='form-row'>
                            <div class='col' style='margin-right: 40px;min-width: 130px;'>
                                <div class='form-group' style='margin-bottom: 10px;'><label for='email' style='margin-bottom: 0px;'><?php echo $lang['place']?></label><input class='form-control item' type='text' onblur="checkPlace(this)" style='min-width: 160px;font-size: 14px;' name='place' value='<?php echo $course->getPlace();?>' required></div>
                            </div>
                            <div class='col' style='margin-right: 40px;min-width: 130px;'>
                                <div class='form-group' style='margin-bottom: 10px;'><label for='email' style='margin-bottom: 0px;'><?php echo $lang['link']?></label><input class='form-control item' type='url' style='min-width: 160px;font-size: 14px;' name='link' onblur="checkURL(this)" value='<?php echo $course->getLink();?>' required></div>
                            </div>
                            <input class='form-control item' type='hidden' style='min-width: 160px;font-size: 14px;' name='institute' value='<?php echo $course->getInstituteId();?>' required>
                            <input class='form-control item' type='hidden' style='min-width: 160px;font-size: 14px;' name='id' value='<?php echo $course->getId();?>' required>
                        </div>
                        <div class='form-row'>
                            
                            <div class='col' style='margin-right: 40px;min-width: 130px;'><input class='btn btn-primary' type='submit' style='width: 142px;margin-top: 10px;' value='<?php echo $lang['save']?>'></div>
                            <div class='col' style='margin-right: 40px;min-width: 130px;'><a class='btn btn-primary' role='button' href="<?php echo $GLOBALS["ROOT_URL"]?>/course/overview" style='width: 142px;margin-top: 10px;'><?php echo $lang['cancel']?></a></div>
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
                    
                    <script>
                    function checkIsNum(num){
                        var textLength = num.value.length;
                        if (isNaN(num.value) || textLength<4 || textLength>4){
                            alert('Please enter a valid postcode');
                            num.value='';
                        }
                    }
                    </script>

                    <script>
                    function checkIsPrice(num){
                        var textLength = num.value.length;
                        if (isNaN(num.value) || textLength>5){
                            alert('Please enter a valid price');
                            num.value='';
                        }
                    }
                    </script>

                    <script>
                    function checkPlace(place){
                        if (!isNaN(place.value) ){
                            alert('Please enter a valid place');
                            place.value='';
                        }
                    }
                    </script>

                    <script>
                    function checkDate(date) {
                        if(date.valueAsDate <= new Date()) {
                            alert('Please enter a date in the future');
                            date.value='';
                        } else {
                            //Date in the future
                        }
                    }    
                    </script>

                    <script>
                    function checkDate2(date) {
                        var start = document.getElementById("dateOne");
                        if(date.valueAsDate <= new Date()) {
                            alert('Please enter a date in the future');
                            date.value='';
                        } else if(date.valueAsDate <= start.valueAsDate){
                            alert('End date must be after the start date');
                            date.value='';
                        }
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