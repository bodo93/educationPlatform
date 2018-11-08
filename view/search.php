<!--
author: Philipp Lehmann
Source: https://www.w3schools.com/howto/howto_js_filter_table.asp
-->
<!DOCTYPE html>
<?php 
include("includes/translator.inc.php");
include("database/DBConnection.php");
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title><?php echo $lang['title']?></title>
        <link rel="stylesheet" type="text/css" href="assets/css/all.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script>
        $(document).ready(function(){
            $("#searchInput").on("keyup", function() {
              var value = $(this).val().toLowerCase();
              $("#table_content tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
              });
            });
        });
        </script>
    </head>
    <body>
        <div id="searcharea">
            <form action="" method="post">  
                <input type="text" id="searchInput" name="term" placeholder="Search for names.. or places.. " title="Type in a name"/> 
                
            </form>
        </div>
        <div id="content" style="overflow-y: scroll;">
            <table>
                <thead>
                  <tr>
                    <th><?php echo $lang['name']?></th>
                    <th><?php echo $lang['postCode']?></th>
                    <th><?php echo $lang['place']?></th>
                    <th><?php echo $lang['costs']?></th>
                    <th><?php echo $lang['startDate']?></th>
                    <th><?php echo $lang['endDate']?></th>
                    <th><?php echo $lang['link']?></th>
                    <th><?php echo $lang['institute']?></th>
                    <th><?php echo $lang['department']?></th>
                    <th><?php echo $lang['area']?></th>
                    <th><?php echo $lang['courseType']?></th>
                  </tr>
                </thead>
                <tbody id="table_content">          
                    <?php
                    $db = dbConnection::getConnection();
                    $mysqli = $db->getConnection();    

                        $sql_query = "SELECT * FROM course";
                        $result = $mysqli->query($sql_query);
 
                        while ($row = mysqli_fetch_array($result)){  
                            $id = $row["ID"];
                               echo "\n\n<tr>"
                               . "<td>" . $row['Name'] . "</td>"
                               . "<td>" . $row['PostCode'] . "</td>"
                               . "<td>" . $row['Place'] . "</td>"
                               . "<td>" . $row['Costs'] . "</td>"
                               . "<td>" . $row['Start'] . "</td>"
                               . "<td>" . $row['End'] . "</td>"
                               . "<td>" . $row['Link'] . "</td>"
                               . "<td>" . $row['InstituteID'] . "</td>"
                               . "<td>" . $row['DepartmentID'] . "</td>"
                               . "<td>" . $row['AreaID'] . "</td>"
                               . "<td>" . $row['CourseTypeID'] . "</td>"
                               . "</tr>";
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
