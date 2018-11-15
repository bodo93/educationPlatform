<?php 
include("includes/translator.inc.php");
include("database/DBConnection.php");

if(empty($_POST['valueToSearch']) and empty($_POST['department']) and empty($_POST['area']) and empty($_POST['coursetype'])){

    $query = "SELECT
            c.ID,c.Name,c.Place,c.Costs,c.Start,c.End,c.InstituteID,c.DepartmentID,c.AreaID,c.CourseTypeID,
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
}
else{
    $department = $_POST['department'];
    $valueToSearch = $_POST['valueToSearch'];
    $area = $_POST['area'];
    $coursetype = $_POST['coursetype'];
    $query = "SELECT
                c.ID,c.Name,c.Place,c.Costs,c.Start,c.End,c.InstituteID,c.DepartmentID,c.AreaID,c.CourseTypeID,
                inst.Name AS instituteName,
                depart.Name AS departmentName,
                area.Name AS areaName,
                ctype.Name AS courseTypeName
            FROM course c
            JOIN institute inst ON c.InstituteID=inst.ID
            JOIN department depart ON c.DepartmentID=depart.ID
            JOIN area area ON c.AreaID=area.ID
            JOIN coursetype ctype ON c.CourseTypeID=ctype.ID
            WHERE c.Name LIKE '%".$valueToSearch."%'
                AND depart.Name LIKE '%".$department."%'
                AND area.Name LIKE '%".$area."%'
                AND ctype.Name LIKE '%".$coursetype."%'
            ORDER BY c.Name,c.Place";

    $search_Result = filterTable($query);
}
    
function filterTable($query){
    $db = dbConnection::getConnection();
    $mysqli = $db->getConnection();   
    
    $filter_Result = mysqli_query($mysqli, $query);
    return $filter_Result;
    
    
    $dbHost = "127.0.0.1";		//Location Of Database
    $dbUser = "root";			//Database User Name 
    $dbPass = "";				//Database Password 
    $dbDatabase = "db_educationplatform";		//Database Name
    $conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbDatabase);
}
?>
<?php
include 'includes/header.inc.php';
?>
<html>
    <body style="background-color: rgb(34,36,37);">
        <main class="page login-page">
            <section class="clean-block clean-form dark" style="background-image: url(&quot;assets/img/road_sun.jpg&quot;);min-height: 660px; padding-top: 100px; min-width: 660px;">
                <div class="container" style="background-color: rgba(198,189,189,0.85);">
                    <div class="block-heading">
                        <h2 class="text-center text-info"><?php echo $lang['searchResults']?></h2>
                    </div>                    
                    <table id="table-searchResult" style="border:1px solid black">
                        <tr>
                          <th><?php echo $lang['name']?></th>
                          <th><?php echo $lang['place']?></th>
                          <th><?php echo $lang['costs']?></th>
                          <th><?php echo $lang['startDate']?></th>
                          <th><?php echo $lang['endDate']?></th>
                          <th><?php echo $lang['institute']?></th>
                          <th><?php echo $lang['department']?></th>
                          <th><?php echo $lang['area']?></th>
                          <th><?php echo $lang['courseType']?></th>
                        </tr>
                        <?php 
                            while ($row = mysqli_fetch_array($search_Result)){  
                                //$id = $row["ID"];
                                   echo "\n\n<tr>"
                                   . "<td>" . $row['Name'] . "</td>"
                                   . "<td>" . $row['Place'] . "</td>"
                                   . "<td>" . $row['Costs'] . "</td>"
                                   . "<td>" . $row['Start'] . "</td>"
                                   . "<td>" . $row['End'] . "</td>"
                                   . "<td>" . $row['instituteName'] . "</td>"
                                   . "<td>" . $row['departmentName'] . "</td>"
                                   . "<td>" . $row['areaName'] . "</td>"
                                   . "<td>" . $row['courseTypeName'] . "</td>"
                                   . "</tr>";
                            }
                        ?>
                    </table>
                </div>
            </section>
        </main>
        <?php
        include 'includes/footer.inc.php';
        ?>
    </body>
</html>