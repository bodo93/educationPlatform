<!DOCTYPE html>
<?php
/*
 * Author: René Schwab
 */

include 'includes/header.inc.php';
?>

<html>
    <body style="background-color: rgb(34,36,37);">
        <main class="page landing-page">
            <section class="portfolio-block hire-me" style="background-image: url(&quot;assets/img/classroom3.jpg&quot;);background-size: cover;background-repeat: no-repeat;background-color: transparent;color: #000000;padding-top: 80px;height: 750px;">
                <div class="container" style="max-width: 420px;margin-top: 140px">
                    <div class="heading">
                        <h2 style="margin-bottom: 20px;font-weight: bold;color: rgb(255,255,255);"><?php echo $lang['searchCourses'] ?>&nbsp;</h2>
                    </div>
                    <form action="searchResult" style="margin-right: 200;" method="post">
                        <div class="form-group"><label for="subject" style="font-weight: bold;color: rgb(255,255,255);margin-bottom: 2px;"><?php echo $lang['department'] ?></label>
                            <select name="department" class="form-control" id="subject">
                                <option></option>
                                <option value="Wirtschaft"><?php echo $lang['economy'] ?></option>
                                <option value="Informatik"><?php echo $lang['it'] ?></option>
                                <option value="Mathematik"><?php echo $lang['math'] ?></option>
                                <option value="Sonstiges"><?php echo $lang['other'] ?></option>
                            </select>
                        </div>
                        <div
                            class="form-group"><label for="subject" style="font-weight: bold;color: rgb(255,255,255);margin-bottom: 2;"><?php echo $lang['area'] ?></label>
                            <select name="area" class="form-control" id="subject">
                                <option></option>
                                <option value="Westschweiz"><?php echo $lang['west'] ?></option>
                                <option value="Zentralschweiz"><?php echo $lang['central'] ?></option>
                                <option value="Ostschweiz"><?php echo $lang['east'] ?></option>
                                <option value="Suedschweiz"><?php echo $lang['south'] ?></option>
                            </select>
                        </div>
                        <div
                            class="form-group"><label for="subject" style="font-weight: bold;color: rgb(255,255,255);margin-bottom: 2px;"><?php echo $lang['courseType'] ?></label>
                            <select name="coursetype" class="form-control" id="subject">
                                <option></option>
                                <option value="Bachelor">Bachelor</option>
                                <option value="Master">Master</option>
                                <option value="Sonstiges"><?php echo $lang['other'] ?></option>
                            </select>
                        </div>
                        <div
                            class="form-group">
                            <div class="form-row">
                                <div class="col-md-6"><label for="hire-date" style="font-weight: bold;color: rgb(255,255,255);margin-bottom: 2px;"><?php echo $lang['searchTerm'] ?></label>
                                    <input name="valueToSearch" class="form-control" type="text"></div>
                                <div class="col-md-6 button"><button class="btn btn-primary btn-block" type="submit" style="margin-top: 26px;font-weight: bold;background-color: rgb(43,47,49);"><?php echo $lang['submit'] ?></button></div>
                            </div>
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