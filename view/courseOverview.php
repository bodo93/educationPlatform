<!DOCTYPE html>
<?php
    include 'includes/translator.inc.php';
    include("includes/DBconnection.inc.php");
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
                      <!--Get data from database and show it in table cells-->
                      <?php
                       mysqli_query($conn, "SET NAMES 'utf8'"); // ä, ö, ü richtig darstellen
                       $result = mysqli_query($conn, "select * from bildungsangebot");
                       while ($row = mysqli_fetch_assoc($result)) {
                                $id = $row["ID"];
                                echo "\n\n<tr>"
                                . "<td><input class='text' name='id[$id]' value='" . $row['ID'] . "' size='8' disabled/></td>"
                                . "<td><input class='text' name='bezeichnung[$id]' value='" . $row['Bezeichnung'] . "' size='6' disabled/></td>"
                                . "<td><input class='text' name='kosten[$id]' value='" . $row['Kosten'] . "' size='6' disabled/></td>"
                                . "<td><input class='text' name='max_teilnehmerzahl[$id]' value='" . $row['Max_Teilnehmerzahl'] . "' size='6' disabled/></td>"
                                . "<td><input class='text' name='startdatum[$id]' value='" . $row['Startdatum'] . "' size='10' disabled/></td>"
                                . "<td><input class='text' name='enddatum[$id]' value='" . $row['Enddatum'] . "' size='10' disabled/></td>"
                                . "<td><input class='text' name='ort[$id]' value='" . $row['Ort'] . "' size='10' disabled/></td>"
                                . "<td><input class='text' name='bildungsinstitut[$id]' value='" . $row['FK_Bildungsinstitut'] . "' size='10' disabled/></td>"
                                . "<td><input class='text' name='fachbereich[$id]' value='" . $row['FK_Fachbereich'] . "' size='10' disabled/></td>"
                                . "<td><input class='text' name='abschluss[$id]' value='" . $row['FK_Abschluss'] . "' size='10' disabled/></td>"
                                //generates links "update" and "delete" with image
                                . "<td><a class='update' href='coursesUpdate.php?id=".$id."'><img border='0' alt='edit' src='images/edit.png' height='20' width='20' align='top'></a>"
                                . "<a class='delete' href='coursesDelete.php?id=".$id."'><img border='0' alt='delete' src='images/delete.png' height='20' width='20' align='top'></a></td>"
                                . "</tr>";
                       }
                       //generates link "add new courses" with image
                       echo "<tr><td valign='middle' colspan='3'><a id='addLink' href='coursesInsert.php'><img class='add' border='0' alt='edit' src='images/add.png' height='20' width='20' align='top'>".$lang['addCourse']."</a></td></tr>";
                      ?>
                      </tbody>
                </table>
                </form>
</body>
</html>
