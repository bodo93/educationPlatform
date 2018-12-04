<!DOCTYPE html>
<!--
-->
<?php
include 'view/includes/config.inc.php';
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
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title><?php echo $lang['title']?></title>
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
        <link rel="stylesheet" href="assets/css/Data-Table.css">
        <link rel="stylesheet" href="assets/css/dh-row-titile-text-image-right-1.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
        <link rel="stylesheet" href="assets/css/smoothproducts.css">
    </head>
    <body>
        <header>
            <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
                <div class="container"><a class="navbar-brand logo" href="<?php echo $GLOBALS['ROOT_URL']?>/search" style="margin-right: 0px;"><img src="assets/img/Logo.png" id="logo" style="width: 180px;height: 65px;"></a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navcol-1">
                        <ul class="nav navbar-nav ml-auto">
                            <?php
                            if($sessionActive){
                            ?>
                            <li class="nav-item" role="presentation"><a class="nav-link" href="<?php echo $GLOBALS['ROOT_URL']?>/course/overview" style="font-size: 14px;font-weight: bold;"><?php echo $lang['myCourses']?></a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link" href="<?php echo $GLOBALS['ROOT_URL']?>/institute" style="font-size: 14px;font-weight: bold;"><?php echo $lang['userProfile']?></a></li>
                            <li class="nav-item" role="presentation" style="padding-right: 90px;"><a class="nav-link" href="<?php echo $GLOBALS['ROOT_URL']?>/logout" style="font-size: 14px;font-weight: bold;"><?php echo $lang['logout']?></a></li>
                            <?php
                            }else{
                            ?>
                            <li class="nav-item" role="presentation" style="padding-right: 90px;"><a class="nav-link" href="<?php echo $GLOBALS['ROOT_URL']?>/login" style="font-size: 14px;font-weight: bold;"><?php echo $lang['login']?></a></li>
                            <?php
                            }
                            if(strpos($_SERVER['REQUEST_URI'], "id=") !== false && strpos($_SERVER['REQUEST_URI'], "lang=") !== false){
                            ?>
                            <li class="nav-item" role="presentation" style="padding-right: 0px;"><a class="nav-link" href="<?php echo substr($_SERVER['REQUEST_URI'], 0, strrpos($_SERVER['REQUEST_URI'], "&")) . "&lang=de" ?>" style="font-size: 14px;font-weight: bold;"><?php echo $lang['german']?></a></li>
                            <li class="nav-item" role="presentation" style="padding-right: 20px;"><a class="nav-link" href="<?php echo substr($_SERVER['REQUEST_URI'], 0, strrpos($_SERVER['REQUEST_URI'], "&")) . "&lang=en"?>" style="padding-left: 0px;font-size: 14px;font-weight: bold;"><?php echo $lang['english']?></a></li>
                            <?php                                
                            }else if(strpos($_SERVER['REQUEST_URI'], "id=") !== false){
                            ?>
                            <li class="nav-item" role="presentation" style="padding-right: 0px;"><a class="nav-link" href="<?php echo $_SERVER['REQUEST_URI'] . "&lang=de"?>" style="font-size: 14px;font-weight: bold;"><?php echo $lang['german']?></a></li>
                            <li class="nav-item" role="presentation" style="padding-right: 20px;"><a class="nav-link" href="<?php echo $_SERVER['REQUEST_URI'] . "&lang=en"?>" style="padding-left: 0px;font-size: 14px;font-weight: bold;"><?php echo $lang['english']?></a></li>
                            <?php
                            }else{
                            ?>
                            <li class="nav-item" role="presentation" style="padding-right: 0px;"><a class="nav-link" href="<?php echo substr($_SERVER['REQUEST_URI'], 0, strrpos($_SERVER['REQUEST_URI'], "?")) . "?lang=de" ?>" style="font-size: 14px;font-weight: bold;"><?php echo $lang['german']?></a></li>
                            <li class="nav-item" role="presentation" style="padding-right: 20px;"><a class="nav-link" href="<?php echo substr($_SERVER['REQUEST_URI'], 0, strrpos($_SERVER['REQUEST_URI'], "?")) . "?lang=en" ?>" style="padding-left: 0px;font-size: 14px;font-weight: bold;"><?php echo $lang['english']?></a></li>
                            <?php
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        
        <!--no script tag, if user deactivatted JavaScript-->
        <noscript>Sorry, your browser does not support JavaScript.<br>Please activate JavaScript to show the website correctly.</noscript> 
        <!--assets-->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
        <script src="assets/js/smoothproducts.min.js"></script>
        <script src="assets/js/theme.js"></script>
        <script src="assets/js/createMyCoursesTable.js"></script>
        <script src="assets/js/Table-With-Search.js"></script>