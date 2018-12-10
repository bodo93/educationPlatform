<!DOCTYPE html>
<?php
/*
 * Author: Bodo Grütter
 */

include 'includes/translator.inc.php';
include 'includes/header.inc.php';
use database\DBConnection;

$db = DBConnection::getConnection();
$mysqli = $db->getConnection();
?>  
<html>
    <head>
        <!--
        * Author: Philipp Lehmann
        *
        * Styling for course table
        -->
        <style>
            td, th {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;
            }
            
            tr:nth-child(even) {
                background-color: #dddddd;
            }
            
            tr:hover {
                background-color:#b5b5b5;
            }
        </style>
    </head>
    <body style="background-color: rgb(34,36,37);">
        <main class="page login-page">
            <section class="clean-block clean-form dark" style="min-height: 660px; padding-top: 100px;">
                <div class="container" style="overflow-x: auto;">
                    <div class="block-heading">
                        <h2 class="text-info" style="margin-bottom: 15px;"><?php echo $lang['myCourses'] ?></h2>
                    </div>

                    <form method="post"style="padding-bottom: 30px;min-width: 1050px; min-height: 400px; padding-right: 20px;">
                        <!--creates tableheaders for the crud-table -->
                        <table id="crudTable" style="width: 100%; padding:20px;">
                            <thead>
                                <tr>
                                    <!--creates tableheaders for the crud-table -->
                                    <th><?php echo $lang['name'] ?></th>
                                    <th><?php echo $lang['department'] ?></th>
                                    <th><?php echo $lang['place'] ?></th>
                                    <th><?php echo $lang['courseType'] ?></th>
                                    <th><?php echo $lang['startDate'] ?></th>    
                                    <th></th> 
                                </tr>
                            </thead>
                            <tbody>
                                <!--Get data from database and show it in table cells-->
                                <?php
                                /*
                                 * Author: Philipp Lehmann
                                 * 
                                 * SQL Statement to get all courses belonging to logged in user
                                 */
                                $userID = $_SESSION['userID'];
                                
                                $query = "select c.ID, c.Name, c.Place, c.Start, c.Link,
                                        depart.Name AS departmentName,
                                        ctype.Name AS courseTypeName
                                        from course c
                                        JOIN department depart ON c.DepartmentID=depart.ID
                                        JOIN coursetype ctype ON c.CourseTypeID=ctype.ID
                                        
                                        WHERE c.InstituteID = $userID ORDER BY c.Name";

                                $result = $mysqli->query($query);

                                // loop through all existing courses
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $id = $row["ID"];
                                    
                                    echo "<tr>"
                                    . "<td><a href='" . $row['Link'] . "' target='_blank'>" . $row['Name'] . "</td>" //open course link in a new tab
                                    . "<td>" . $row['departmentName'] . "</td>"
                                    . "<td>" . $row['Place'] . "</td>"
                                    . "<td>" . $row['courseTypeName'] . "</td>"   
                                    //. "<td>" . $row['Start'] . "</td>"
                                    . "<td>" . date_format($row['Start'], "d/m/Y") . "</td>"

                                    //generates links "edit" and "delete" with image
                                    . "<td><a class='update' href='" . $GLOBALS['ROOT_URL']. "/course/edit?id=" . $id . "'><img border='0' alt='edit' src='view/assets/img/edit.png' height='20' width='20' align='top'></a>&nbsp&nbsp"
                                    . "<a class='delete' href='" . $GLOBALS['ROOT_URL']. "/course/delete?id=" . $id . "'><img border='0' alt='delete' src='view/assets/img/delete.png' height='20' width='20' align='top'></a>&nbsp&nbsp"
                                    . "<a class='delete' href='" . $GLOBALS['ROOT_URL']. "/Invoice?id=" . $id . "'><img border='0' alt='delete' src='view/assets/img/download.png' height='20' width='20' align='top'></a></td>" //download Invoice
                                    . "</tr>";
                                }
 
                                ?>
                            </tbody> 
                        </table>
                        <!--generates link "add new courses" with image-->
                        <div style="margin-top: 10px;"><a href="<?php echo $GLOBALS["ROOT_URL"]; ?>/course/create"><img src="view/assets/img/add.png" height='18' width='18'/>  <?php echo $lang['addCourse'] ?></a></div>
                    </form>
                </div>
            </section>
        </main>
        <?php
        include 'includes/footer.inc.php';
        ?>
    </body>

</html>
