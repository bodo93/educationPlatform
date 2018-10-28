<!DOCTYPE html>
<!--
-->
<?php
include 'view/includes/translator.inc.php';
?>

<html>
    <head>
        <meta charset="UTF-8">
        <style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: right;
  color: #f2f2f2;
  text-align: center;
  padding: 20px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}


        </style>
    </head>
    
    <body>
        
        
        
        <?php
        // put your code here
        ?>
        <div class="topnav">
            <div style="spacing:2000px;">
            <a href="index.php?lang=en"><?php echo $lang['english'] ?></a>
            <a href="index.php?lang=de"><?php echo $lang['german'] ?></a>
            </div>
            <a href="logout.php"><div class="nav-link"><?php echo $lang['logout'] ?></div></a></li>
            <a href="userprofile.php"><div class="nav-link"><?php echo $lang['userprofile'] ?></div></a>
            <a href="courses.php"><div class="nav-link"><?php echo $lang['myCourses'] ?></div></a>
            <!--<a href="#"><div class="nav-link"><?php echo $lang['home'] ?></div></a>-->
            
            <img src="view/assets/images/logo_Swissedu2.png" alt="Swissedu logo" style="width:240px;height:60px;">
        </div>
    </body>
</html>
