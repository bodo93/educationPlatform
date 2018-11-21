<!DOCTYPE html>
<!--
-->
<?php
include 'view/includes/translator.inc.php';

$sessionActive = false;

if(isset($_SESSION['userID']) && isset($_SESSION['instituteLogin']))
    $sessionActive = true;
else
    $sessionActive = false;
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    </head>
    <body>               
        <footer class="page-footer dark">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3" style="min-width: 240px;">
                        <h5><?php echo $lang['address'] ?></h5>
                        <p style="color: rgb(251,251,251);">Swissedu AG<br>Wängirain 53<br>8704 Herrliberg<br></p>
                    </div>
                    <div class="col-sm-3">
                        <h5><?php echo $lang['contact'] ?>&nbsp;</h5>
                        <ul>
                            <li><a href="mailto:name@email.com">info@swissedu.ch</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-3" style="min-width: 240px;">
                        <h5><?php echo $lang['services'] ?></h5>
                        <ul>
                            <li><a href="<?php echo $GLOBALS['ROOT_URL']?>/ourOffer"><?php echo $lang['offer'] ?></a></li>
                            <li><a href="<?php echo $GLOBALS['ROOT_URL']?>/terms" style="min-width: 160px;"><?php echo $lang['terms'] ?></a></li>
                        </ul>
                    </div>
                    <div class="col-sm-3" style="min-width: 240px;">
                        <?php
                        if($sessionActive){
                        ?>
                        <h5><?php echo $lang['logout']?></h5>
                        <ul>
                            <li><a href="<?php echo $GLOBALS['ROOT_URL']?>/logout"><?php echo $lang['logout']?></a></li>
                        </ul>
                        <?php
                        }else{
                        ?>
                        <h5><?php echo $lang['login']?></h5>
                        <ul>
                            <li><a href="<?php echo $GLOBALS['ROOT_URL']?>/login"><?php echo $lang['login']?></a></li>
                        </ul>                        
                        <?php
                        }
                        ?>                        
                    </div>
                </div>
            </div>
            <div class="footer-copyright" style="margin-top: 0px;">
                <p>© 2018 Copyright SWISSEDU</p>
            </div>
        </footer>
    </body>
</html>