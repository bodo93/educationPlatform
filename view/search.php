<!--
author: Philipp Lehmann
Source: https://www.w3schools.com/howto/howto_js_filter_table.asp
-->
<!DOCTYPE html>
<?php 
include("includes/translator.inc.php");
?>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title><?php echo $lang['title']?></title>
        <link rel="stylesheet" type="text/css" href="assets/css/all.css">

       
    </head>
    <body>
        <div id="searcharea">
            <form action="searchResult" method="post">
                <input name="valueToSearch" type="text" placeholder="Type here"><br />

                <input name="department" list="departments" placeholder="Department">
                <datalist id="departments">
                    <option value="Wirtschaftsinformatik">Wirtschaftsinformatik</option>
                    <option value="Grundlagen">Grundlagen</option>
                    <option value="Mathematik">Mathematik</option>
                </datalist>
                <input name="area" list="areas" placeholder="Area">
                <datalist id="areas">
                    <option value="Nordwestschweiz">Nordwestschweiz</option>
                    <option value="Westschweiz">Westschweiz</option>
                    <option value="Ostschweiz">Ostschweiz</option>
                    <option value="Tessin">Tessin</option>
                </datalist>
                <input name="coursetype" list="coursetype" placeholder="Course Type">
                <datalist id="coursetype">
                    <option value="Vollzeit">Vollzeit</option>
                    <option value="Teilzeit">Teilzeit</option>
                </datalist>
                <button type="submit" name="search">Submit</button>
            </form>
        </div>
        <footer>
            <div class="footer lang"><a href="index.php?lang=en"><?php echo $lang['english']?></a></div>
            <div class="footer lang"><a href="index.php?lang=de"><?php echo $lang['german']?></a></div>
        </footer>
    </body>
</html> 
