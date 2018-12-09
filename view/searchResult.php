<!DOCTYPE html>
<?php
/*
 * Author: Philipp Lehmann
 */

use database\DBConnection;

if (empty($_POST['valueToSearch']) and empty($_POST['department']) and empty($_POST['area']) and empty($_POST['coursetype'])) {
    $query = "SELECT
            c.ID,c.Name,c.Place,c.Costs,c.Start,c.End,c.Link,c.InstituteID,c.DepartmentID,c.AreaID,c.CourseTypeID,
            inst.Name AS instituteName,
            depart.Name AS departmentName,
            area.Name AS areaName,
            ctype.Name AS courseTypeName
        FROM course c
        JOIN institute inst ON c.InstituteID=inst.ID
        JOIN department depart ON c.DepartmentID=depart.ID
        JOIN area area ON c.AreaID=area.ID
        JOIN coursetype ctype ON c.CourseTypeID=ctype.ID
        ORDER BY c.Name,c.Place";

    $search_Result = filterTable($query);
} else {
    $department = $_POST['department'];
    $valueToSearch = $_POST['valueToSearch'];
    $area = $_POST['area'];
    $coursetype = $_POST['coursetype'];
    $query = "SELECT
                c.ID,c.Name,c.Place,c.Costs,c.Start,c.End,c.Link,c.InstituteID,c.DepartmentID,c.AreaID,c.CourseTypeID,
                inst.Name AS instituteName,
                depart.Name AS departmentName,
                area.Name AS areaName,
                ctype.Name AS courseTypeName
            FROM course c
            JOIN institute inst ON c.InstituteID=inst.ID
            JOIN department depart ON c.DepartmentID=depart.ID
            JOIN area area ON c.AreaID=area.ID
            JOIN coursetype ctype ON c.CourseTypeID=ctype.ID
            WHERE c.Name LIKE '%" . $valueToSearch . "%'
                AND depart.Name LIKE '%" . $department . "%'
                AND area.Name LIKE '%" . $area . "%'
                AND ctype.Name LIKE '%" . $coursetype . "%'
            ORDER BY c.Name,c.Place";

    $search_Result = filterTable($query);
}

function filterTable($query) {
    $db = DBConnection::getConnection();
    $mysqli = $db->getConnection();

    $filter_Result = mysqli_query($mysqli, $query);

    return $filter_Result;
}
?>
<?php
include 'includes/header.inc.php';
?>
<body style="background-color: rgb(34,36,37);">
<head>
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
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $(".clickable-row").click(function () {
                window.open ($(this).data("href"),'_blank');
            });
        });
    </script>
</head>
<main class="page login-page">
    <section class="clean-block clean-form dark" style="background-image: url(&quot;assets/img/road_sun.jpg&quot;); background-size: cover;background-repeat: no-repeat; min-height: 600px; padding-top: 100px;">
        <div class="container" style="background-color: rgba(198,189,189,0.85); overflow-x: auto; padding:20px;">
            <div class="block-heading">
                <h2 class="text-center text-info"><?php echo $lang['searchResults'] ?></h2>
            </div>
            <div style="height:400px; overflow-y: scroll">
            <table id="table-searchResult" style="width: 100%;">
                <tr>
                    <th><?php echo $lang['name'] ?></th>
                    <th><?php echo $lang['department'] ?></th>
                    <th><?php echo $lang['institute'] ?></th>
                    <th><?php echo $lang['area'] ?></th>
                    <th><?php echo $lang['place'] ?></th>
                    <th><?php echo $lang['courseType'] ?></th>
                    <th><?php echo $lang['startDate'] ?></th>
                </tr>
                <?php
                
                if(mysqli_num_rows($search_Result) == 0){
                    echo "<tr>"
                    . "<td colspan='7'>" . $lang['noData'] . "</td>"
                    . "</tr>";
                }else{
                    while ($row = mysqli_fetch_array($search_Result)) {
                            //$id = $row["ID"];
                            echo "<tr class='clickable-row' data-href='" . $row['Link'] . "'>"
                            . "<td>" . $row['Name'] . "</td>"
                            . "<td>" . $row['departmentName'] . "</td>"
                            . "<td>" . $row['instituteName'] . "</td>"
                            . "<td>" . $row['areaName'] . "</td>"
                            . "<td>" . $row['Place'] . "</td>"
                            . "<td>" . $row['courseTypeName'] . "</td>"
                            . "<td>" . $row['Start'] . "</td>"
                            . "</tr>";
                    }
                }
                
                ?>
            </table>
            </div>
        </div>
    </section>
</main>
<?php
include 'includes/footer.inc.php';
?>
</body>
</html>