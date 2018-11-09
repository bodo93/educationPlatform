<?php 
include("includes/translator.inc.php");
include("database/DBConnection.php");

if(isset($_POST['search']) and isset($_POST['department']) and isset($_POST['area']) and isset($_POST['coursetype'])){
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
else{
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
    
//controller\CourseController::search($_POST['search'], $_POST['department'], $_POST['area']);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $lang['title']?></title>
        <link rel="stylesheet" type="text/css" href="assets/css/all.css">        
    </head>
    <body>
        <div id="content" style="overflow-y: scroll;">
            <table id="table_content" style="border:1px solid black">
                <tr>
                  <th>Name</th>
                  <th>Place</th>
                  <th>Costs</th>
                  <th>Startdate</th>
                  <th>EndDate</th>
                  <th>Institute</th>
                  <th>Department</th>
                  <th>Area</th>
                  <th>CourseType</th>
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
        <footer>
            <div class="footer lang"><a href="index.php?lang=en"><?php echo $lang['english']?></a></div>
            <div class="footer lang"><a href="index.php?lang=de"><?php echo $lang['german']?></a></div>
        </footer>
        
        
        
    </body>
    
    
    
    
</html>