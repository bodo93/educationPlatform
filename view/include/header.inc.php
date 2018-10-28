<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
        ul#menu li {
        display:inline;
        }
        </style>
        
    </head>
    
    <body>
        <ul id="menu">
            <li><a href="#"><div class="nav-link"><?php echo $lang['home']?></div></a></li>
            <li><a href="courses.php"><div class="nav-link"><?php echo $lang['profile']?></div></a></li>
            <li><a href="userprofile.php"><div class="nav-link"><?php echo $lang['profile']?></div></a></li>
            <li><a href="logout.php"><div class="nav-link"><?php echo $lang['logout']?></div></a></li>
            <li><a href="index.php?lang=en"><?php echo $lang['english']?></a></li>
            <li><a href="index.php?lang=de"><?php echo $lang['german']?></a></li>
        </ul>    
    </body>
</html>
