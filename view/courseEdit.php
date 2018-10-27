<!DOCTYPE html>
<!--
author: Bodo Grütter
-->
<?php
include 'includes/translator.inc.php';
include("includes/DBconnection.inc.php");
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="userprofile.css">
        <link rel="stylesheet" type="text/css" href="all.css">
        <title><?php echo $lang['editCourse']?></title>
    </head>
    <body>
        <h3><?php echo $lang['editCourse']?></h3>
        <form action="coursesUpdate.php" method="post">
            <table>
                <?php
                $id = 0;
                if ($_GET) {
                    // keep track post values
                    $id = $_GET['id'];
                } else if ($_POST) {
                    $id = $_POST['id'];
                    $update = "Update bildungsangebot set `Bezeichnung` = '" . $_POST['bezeichnung'] . "', `Kosten` = '" . $_POST['kosten'] . "', `Max_Teilnehmerzahl` = '" . $_POST['max_teilnehmerzahl'] . "', `Startdatum` = '" . $_POST['startdatum'] . "', `Enddatum` = '" . $_POST['enddatum'] . "', `Ort` = '" . $_POST['ort'] . "', `FK_Bildungsinstitut` = '" . $_POST['bildungsinstitut'] . "', `FK_Fachbereich`= '" . $_POST['fachbereich'] . "', `FK_Abschluss` = '" . $_POST['abschluss'] . "' where `ID` = '" . $_POST['id'] . "'"; //Just 4 Tests
                    if (mysqli_query($conn, $update)) {
                        header("Location:courses.php");
                    } else {
                        echo "Error: " . $update . "<br>" . mysqli_error($conn);
                    }
                    mysqli_close($conn);
                }
                //Query
                $select = "Select ID, Bezeichnung, Kosten, Max_Teilnehmerzahl, Startdatum, Enddatum, Ort, FK_Bildungsinstitut, FK_Fachbereich, FK_Abschluss from bildungsangebot where ID = '$id'"; //Just 4 Tests
               
                //Ausführen
                $result = mysqli_query($conn, $select);
                $row = mysqli_fetch_array($result);
                $id = $row['ID'];
                $bezeichnung = $row['Bezeichnung'];
                $kosten = $row['Kosten'];
                $teilnehmerzahl = $row['Max_Teilnehmerzahl'];
                $startdatum = $row['Startdatum'];
                $enddatum = $row['Enddatum'];
                $ort = $row['Ort'];
                $bildungsinstitut = $row['FK_Bildungsinstitut'];
                $fachbereich = $row['FK_Fachbereich'];
                $abschluss = $row['FK_Abschluss'];

                //Formular anzeigen und mit Daten füllen
                echo "<tr><td>ID</td><td><input type='text' name='id' value='" . $id . "' /></td></tr>"
                . "<tr><td>"; echo $lang['label'] . "</td><td><input type='text' name='bezeichnung' value='" . $bezeichnung . "' /></td></tr>"
                . "<tr><td>"; echo $lang['costs'] . "</td><td><input type='text' name='kosten' value='" . $kosten . "' /></td></tr>"
                . "<tr><td>"; echo $lang['attendance'] . "</td><td><input type='text' name='max_teilnehmerzahl' value='" . $teilnehmerzahl . "' /></td></tr>"
                . "<tr><td>"; echo $lang['startingDate'] . "</td><td><input type='date' name='startdatum' value='" . $startdatum . "' /></td></tr>"
                . "<tr><td>"; echo $lang['endDate'] . "</td><td><input type='date' name='enddatum' value='" . $enddatum . "' /></td></tr>"
                . "<tr><td>"; echo $lang['place'] . "</td><td><input type='text' name='ort' value='" . $ort . "' /></td></tr>"
                . "<tr><td>"; echo $lang['educationalInstitute'] . "</td><td><select name='bildungsinstitut' maxlength='40'>"
                            ."<option selected value='".$bildungsinstitut."'>".$bildungsinstitut."</option>";
                            $select = "Select DISTINCT ID, Name from bildungsinstitut";
                            if(mysqli_query($conn, $select)){
                                $result = mysqli_query($conn, $select);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $id = $row["ID"];
                                    $name = $row["Name"];
                                    echo '<option value="'.$id.'">'.$name.'</option>';
                                }
                            }
                echo "</select></td></tr>"
                . "<tr><td>"; echo $lang['areaOfStudies'] . "</td><td><select name='fachbereich' maxlength='40'>"
                        ."<option selected value='".$fachbereich."'>".$fachbereich."</option>";
                            $select = "Select DISTINCT ID, Bezeichnung from Fachbereich";
                            if(mysqli_query($conn, $select)){
                                $result = mysqli_query($conn, $select);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $id = $row["ID"];
                                    $name = $row["Bezeichnung"];
                                    echo '<option value="'.$id.'">'.$name.'</option>';
                                }
                            }
                echo "</select></td></tr>"
                . "<tr><td>"; echo $lang['graduation'] . "</td><td><select name='abschluss' maxlength='40'>"
                            ."<option selected value='".$abschluss."'>".$abschluss."</option>";
                            $select = "Select DISTINCT ID, Bezeichnung from abschluss";
                            if(mysqli_query($conn, $select)){
                                $result = mysqli_query($conn, $select);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $id = $row["ID"];
                                    $name = $row["Bezeichnung"];
                                    echo '<option value="'.$id.'">'.$name.'</option>';
                                }
                            }
                echo "</select></td></tr>"
                . "<tr><td><input type='submit' name'save' value='"; echo $lang['save'] . "'></td><td><input type='button' name'cancel' value='"; echo $lang['cancel'] . "' onclick='location.href='courses.php''></td></tr>";
                ?>
            </table>
        </form>
    </body>
</html>