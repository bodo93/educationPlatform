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
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title><?php echo $lang['title']?></title>
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
        <link rel="stylesheet" href="assets/css/Data-Table.css">
        <link rel="stylesheet" href="assets/css/dh-row-titile-text-image-right-1.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
        <link rel="stylesheet" href="assets/css/smoothproducts.css">
        <link rel="stylesheet" href="assets/css/Table-With-Search.css">
        <link rel="stylesheet" href="assets/css/searchResult.css"> 
    </head>
    <body>
        <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
            <div class="container"><a class="navbar-brand logo" href="search.html" style="margin-right: 0px;"><img src="assets/img/Logo2.png" id="logo" style="width: 180px;height: 65px;"></a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div
                    class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item" role="presentation"><a class="nav-link" href="myCourses.html" style="font-size: 14px;font-weight: bold;">Meine Kurse</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" href="showAccount.html" style="font-size: 14px;font-weight: bold;">Benutzerprofil</a></li>
                        <li class="nav-item" role="presentation" style="padding-right: 90px;"><a class="nav-link" href="logout.php" style="font-size: 14px;font-weight: bold;">Abmelden</a></li>
                        <li class="nav-item" role="presentation" style="padding-right: 0px;"><a class="nav-link" href="search?lang=de" style="font-size: 14px;font-weight: bold;"><?php echo $lang['german']?></a></li>
                        <li class="nav-item" role="presentation" style="padding-right: 20px;"><a class="nav-link" href="search?lang=en" style="padding-left: 0px;font-size: 14px;font-weight: bold;"><?php echo $lang['english']?></a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <main class="page login-page">
            <section class="clean-block clean-form dark" style="background-image: url(&quot;assets/img/road_sun.jpg&quot;);min-height: 660px;min-width: 660px;">
                <div class="container" style="background-color: rgba(198,189,189,0.85);">
                    <div class="block-heading">
                        <h2 class="text-center text-info">Suchresultate</h2>
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
        <footer class="page-footer dark">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3" style="min-width: 240px;">
                        <h5>Kontakt</h5>
                        <p style="color: rgb(251,251,251);">Swissedu AG<br>Wängirain 53<br>8704 Herrliberg<br>info@swissedu.ch</p>
                    </div>
                    <div class="col-sm-3">
                        <h5>Leistungen&nbsp;</h5>
                        <ul>
                            <li><a href="#"></a></li>
                            <li><a href="ourOffer.html">Angebot</a></li>
                            <li><a href="login.html">Login</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-3" style="min-width: 240px;">
                        <h5>Preise</h5>
                        <p style="color: rgb(251,251,251);">3 &nbsp;Monate &nbsp; &nbsp;60 CHF<br>6 &nbsp;Monate &nbsp;100 CHF<br>12 Monate &nbsp;160 CHF</p>
                    </div>
                    <div class="col-sm-3" style="min-width: 240px;">
                        <h5>Legal</h5>
                        <ul>
                            <li><a href="terms.html" style="min-width: 160px;">Terms</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer-copyright" style="margin-top: 0px;">
                <p>© 2018 Copyright SWISSEDU</p>
            </div>
        </footer>
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
        <script src="assets/js/smoothproducts.min.js"></script>
        <script src="assets/js/theme.js"></script>
        <script src="assets/js/createMyCoursesTable.js"></script>
        <script src="assets/js/Table-With-Search.js"></script>
    </body>
</html>