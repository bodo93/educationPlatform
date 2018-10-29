<?php  
    include 'includes/translator.inc.php';
    include("includes/DBconnection.inc.php");
    
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( !empty($_POST)) {
        // keep track post values
        $id = $_POST['id'];
         
        // delete data
        mysqli_query($conn, "SET NAMES 'utf8'"); // ä, ö, ü richtig darstellen
        $delete = "DELETE FROM course WHERE ID = ".$id;
        mysqli_query($conn, $delete);
        $host  = $_SERVER['HTTP_HOST'];
        $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        $extra = 'educationPlatform/course/overview/';
        header("Location: http://$host$uri/$extra");
    }
    
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
     <link rel="stylesheet" type="text/css" href="stylesheet/courses.css">
</head>
 
<body>
    <div class="container">
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3><?php echo $lang['deleteCourse']?></h3>
                    </div>
                     
                    <form class="form-horizontal" action="educationPlatform/view/courseDelete.php" method="post">
                      <input type="hidden" name="id" value="<?php echo $id;?>"/>
                      <p class="alert alert-error"><?php echo $lang['sureDelete']?></p>
                      <div class="form-actions">
                          <button type="submit" class="button"><?php echo $lang['yes']?></button>
                          <a class="button" href="/educationPlatform/course/overview"><?php echo $lang['no']?></a>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>