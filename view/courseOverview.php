<!DOCTYPE html>
<?php
include ("includes/translator.inc.php");
include("database/DBConnection.php");
?>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <title><?php echo $lang['myCourses']?></title>
  <link rel="stylesheet" type="text/css" href="stylesheet/courses.css">

<script type="text/javascript">
</script>
</head>

<body>
    <h3><?php echo $lang['myCourses']?></h3>
    <form method="post">
    <!--creates tableheaders for the crud-table -->
    <table id="crudTable">
          <thead>
            <tr>
              <th>ID</th>
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
          <tbody>
          <!--Get data from database and show it in table cells-->
          <?php
          $db = dbConnection::getConnection();
          $mysqli = $db->getConnection();


           //mysqli_query($conn, "SET NAMES 'utf8'"); // ä, ö, ü richtig darstellen

           $updatequery = "select * from course ORDER BY Name";

           $result = $mysqli->query($updatequery);

           while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row["ID"];
                    echo "\n\n<tr>"
                    . "<td><input class='text' name='id[$id]' value='" . $row['ID'] . "' size='8' disabled/></td>"
                    . "<td><input class='text' name='name[$id]' value='" . $row['Name'] . "' size='6' disabled/></td>"
                    . "<td><input class='text' name='postCode[$id]' value='" . $row['PostCode'] . "' size='6' disabled/></td>"
                    . "<td><input class='text' name='place[$id]' value='" . $row['Place'] . "' size='6' disabled/></td>"
                    . "<td><input class='text' name='costs[$id]' value='" . $row['Costs'] . "' size='10' disabled/></td>"
                    . "<td><input class='text' name='start[$id]' value='" . $row['Start'] . "' size='10' disabled/></td>"
                    . "<td><input class='text' name='end[$id]' value='" . $row['End'] . "' size='10' disabled/></td>"
                    . "<td><input class='text' name='link[$id]' value='" . $row['Link'] . "' size='10' disabled/></td>"
                    . "<td><input class='text' name='institute[$id]' value='" . $row['InstituteID'] . "' size='10' disabled/></td>"
                    . "<td><input class='text' name='department[$id]' value='" . $row['DepartmentID'] . "' size='10' disabled/></td>"
                    . "<td><input class='text' name='area[$id]' value='" . $row['AreaID'] . "' size='10' disabled/></td>"
                    . "<td><input class='text' name='courseType[$id]' value='" . $row['CourseTypeID'] . "' size='10' disabled/></td>"
                    //generates links "update" and "delete" with image
                    . "<td><a class='update' href='/educationPlatform/course/edit?id=".$id."'><img border='0' alt='edit' src='view/assets/images/edit.png' height='20' width='20' align='top'></a>"
                    . "<a class='delete' href='/educationPlatform/course/delete?id=".$id."'><img border='0' alt='delete' src='view/assets/images/delete.png' height='20' width='20' align='top'></a></td>"
                    . "</tr>";
           }
           //generates link "add new courses" with image
           echo "<tr><td valign='middle' colspan='3'><a id='addLink' href='/educationPlatform/course/create'><img class='add' border='0' alt='edit' src='view/assets/images/add.png' height='20' width='20' align='top'>".$lang['addCourse']."</a></td></tr>";
          ?>
          </tbody>
    </table>
    </form>
</body>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        ?>
    </body>
</html>
