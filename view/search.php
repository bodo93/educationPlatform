<!--
author: Philipp Lehmann
-->

<?php 
    include 'includes/translator.inc.php';
    include 'includes/header.inc.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title><?php echo $lang['title']?></title>
    </head>
    <body style="background-color: rgb(34,36,37);">
        <main class="page landing-page">
            <section class="portfolio-block hire-me" style="background-image: url(&quot;assets/img/classroom3.jpg&quot;);background-size: cover;background-repeat: no-repeat;background-color: transparent;color: #000000;padding-top: 80px;height: 660px;">
                <div class="container" style="max-width: 420px;margin-top: 140px">
                    <div class="heading">
                        <h2 style="margin-bottom: 20px;font-weight: bold;color: rgb(255,255,255);"><?php echo $lang['searchCourses']?>&nbsp;</h2>
                    </div>
                    <form action="searchResult" style="margin-right: 200;" method="post">
                        <div class="form-group"><label for="subject" style="font-weight: bold;color: rgb(255,255,255);margin-bottom: 2px;"><?php echo $lang['department']?></label>
                            <select name="department" class="form-control" id="subject">
                                <option></option>
                                <option value="Wirtschaft">Wirtschaft</option>
                                <option value="IT / Technik">IT / Technik</option>
                                <option value="Recht">Recht</option>
                                <option value="Psychologie">Psychologie </option>
                                <option value="Sprachen">Sprachen</option>
                            </select>
                        </div>
                        <div
                            class="form-group"><label for="subject" style="font-weight: bold;color: rgb(255,255,255);margin-bottom: 2;"><?php echo $lang['area']?></label>
                            <select name="area" class="form-control" id="subject">
                                <option></option>
                                <option value="Westschweiz">Westschweiz</option>
                                <option value="Mittelland">Mittelland</option>
                                <option value="Nordwestschweiz">Nordwestschweiz / Zürich</option>
                                <option value="Ostschweiz">Ostschweiz</option>
                                <option value="Tessin / Wallis">Tessin / Wallis</option>
                            </select>
                        </div>
                        <div
                            class="form-group"><label for="subject" style="font-weight: bold;color: rgb(255,255,255);margin-bottom: 2px;"><?php echo $lang['courseType']?></label>
                            <select name="coursetype" class="form-control" id="subject">
                                <option></option>
                                <option value="1">Bachelor</option>
                                <option value="2">Master</option>
                                <option value="3">Sonstiges</option>
                            </select>
                        </div>
                        <div
                            class="form-group">
                            <div class="form-row">
                                <div class="col-md-6"><label for="hire-date" style="font-weight: bold;color: rgb(255,255,255);margin-bottom: 2px;"><?php echo $lang['searchTerm']?></label>
                                    <input name="valueToSearch" class="form-control" type="text"></div>
                                <!--<div class="col-md-6 button"><a class="btn btn-primary btn-block" role="button" style="margin-top: 26px;font-weight: bold;background-color: rgb(43,47,49);">Suchen</a></div>!-->
                                <button type="submit" name="search" class="btn btn-primary btn-block" role="button" style="width:100px; margin-top: 26px;font-weight: bold;background-color: rgb(43,47,49);"><?php echo $lang['submit']?></button>
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
