<!--
author: Philipp Lehmann
Source: https://www.w3schools.com/howto/howto_js_filter_table.asp
-->
<!DOCTYPE html>
<?php 
    include 'includes/translator.inc.php';
    include 'includes/DBconnection.inc.php';
    include 'search.php';
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title><?php echo $lang['title']?></title>
        <link rel="stylesheet" type="text/css" href="stylesheet/all.css?<?php echo date('l jS \of F Y h:i:s A'); ?>">
        
        <script>
            function searchCourses() {
              var input, filter, table, tr, td, i;
              input = document.getElementById("searchInput");
              filter = input.value.toUpperCase();
              table = document.getElementById("Table_listCourses");
              tr = table.getElementsByTagName("tr");
              for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                  if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                  } else {
                    tr[i].style.display = "none";
                  }
                }       
              }
            }
        </script>
    </head>
    <body>
        <nav>
            <a href="#"><div class="nav-link"><?php echo $lang['home']?></div></a>
            <a href="userprofile.php"><div class="nav-link"><?php echo $lang['profile']?></div></a>
            <a href="registration.php"><div class="nav-link"><?php echo $lang['register']?></div></a>
            <a href="logout.php"><div class="nav-link"><?php echo $lang['logout']?></div></a>
        </nav>
        <div id="searcharea">
            <form action="" method="get">  
                <input type="text" id="searchInput" name="term" onkeyup="searchCourses()" placeholder="Search for names.." title="Type in a name"/> 
            </form>
        </div>
        <div id="content" style="overflow-y: scroll;">
            <table id="Table_listcourses">
                <thead>
                  <tr>
                    <th><?php echo $lang['label']?></th>
                    <th><?php echo $lang['costs']?></th>
                    <th><?php echo $lang['attendance']?></th>
                    <th><?php echo $lang['startingDate']?></th>
                    <th><?php echo $lang['endDate']?></th>
                    <th><?php echo $lang['place']?></th>
                    <th><?php echo $lang['educationalInstitute']?></th>
                    <th><?php echo $lang['areaOfStudies']?></th>
                    <th><?php echo $lang['graduation']?></th>
                  </tr>
                </thead>
                <tbody>          
                    <?php
                    if (!empty($_GET['term'])) {
                        $sql = "SELECT * FROM bildungsangebot WHERE Bezeichnung LIKE '%".$_GET['term']."%'";
    
                        $r_query = mysqli_query($conn, $sql); 
                        while ($row = mysqli_fetch_array($r_query)){  
                            $id = $row["ID"];
                               echo "\n\n<tr>"
                               . "<td>" . $row['Bezeichnung'] . "</td>"
                               . "<td>" . $row['Kosten'] . "</td>"
                               . "<td>" . $row['Max_Teilnehmerzahl'] . "</td>"
                               . "<td>" . $row['Startdatum'] . "</td>"
                               . "<td>" . $row['Enddatum'] . "</td>"
                               . "<td>" . $row['Ort'] . "</td>"
                               . "<td>" . $row['FK_Bildungsinstitut'] . "</td>"
                               . "<td>" . $row['FK_Fachbereich'] . "</td>"
                               . "<td>" . $row['FK_Abschluss'] . "</td>"
                               . "</tr>";
                        } 
                    }else{
                        $sql = "SELECT * FROM bildungsangebot   ";
                        $r_query = mysqli_query($conn, $sql); 

                        while ($row = mysqli_fetch_array($r_query)){  
                         $id = $row["ID"];
                            echo "\n\n<tr>"
                            . "<td>" . $row['Bezeichnung'] . "</td>"
                            . "<td>" . $row['Kosten'] . "</td>"
                            . "<td>" . $row['Max_Teilnehmerzahl'] . "</td>"
                            . "<td>" . $row['Startdatum'] . "</td>"
                            . "<td>" . $row['Enddatum'] . "</td>"
                            . "<td>" . $row['Ort'] . "</td>"
                            . "<td>" . $row['FK_Bildungsinstitut'] . "</td>"
                            . "<td>" . $row['FK_Fachbereich'] . "</td>"
                            . "<td>" . $row['FK_Abschluss'] . "</td>"
                            . "</tr>";
                        }  
                    }
                   ?>
                </tbody>
            </table>

        </div>
        <footer>
            <div class="footer lang"><a href="index.php?lang=en"><?php echo $lang['english']?></a></div>
            <div class="footer lang"><a href="index.php?lang=de"><?php echo $lang['german']?></a></div>
        </footer>
    </body>
</html> 