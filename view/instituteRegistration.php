<!--
author: Philipp Lehmann
-->

<?php 
    include 'includes/translator.inc.php';
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
    </head>
    <body style="background-color: rgb(34,36,37);">
        <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
            <div class="container"><a class="navbar-brand logo" href="search.html" style="margin-right: 0px;"><img src="assets/img/Logo2.png" id="logo" style="width: 180px;height: 65px;"></a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div
                    class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item" role="presentation"><a class="nav-link" href="myCourses.html" style="font-size: 14px;font-weight: bold;"><title><?php echo $lang['myCourses']?></title></a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" href="showAccount.html" style="font-size: 14px;font-weight: bold;"><title><?php echo $lang['userProfile']?></title></a></li>
                        <li class="nav-item" role="presentation" style="padding-right: 90px;"><a class="nav-link" href="logout.php" style="font-size: 14px;font-weight: bold;">Abmelden</a></li>
                        <li class="nav-item" role="presentation" style="padding-right: 0px;"><a class="nav-link" href="register?lang=de" style="font-size: 14px;font-weight: bold;"><?php echo $lang['german']?></a></li>
                        <li class="nav-item" role="presentation" style="padding-right: 20px;"><a class="nav-link" href="register?lang=en" style="padding-left: 0px;font-size: 14px;font-weight: bold;"><?php echo $lang['english']?></a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <main class="page login-page">
            <section class="clean-block clean-form dark">
                <div class="container">
                    <div class="block-heading">
                        <h2 class="text-info" style="margin-bottom: 15px;"><?php echo $lang['addUser']?></h2>
                    </div>
                    <form action="/educationPlatform/search" method="post" style="padding-bottom: 30px;max-width: 800px;min-width: 220px;margin-right: 100;padding-right: 0px;">
                        <div class="form-row">
                            <div class="col" style="margin-right: 40px;min-width: 130px;">
                                <div class="form-group" style="margin-bottom: 10px;"><label for="email" style="margin-bottom: 0px;"><?php echo $lang['userName']?></label><input class="form-control" type="email" name="email" placeholder="your@institute.ch" required autofocus></div>
                            </div>
                            <div class="col" style="min-width: 130px;margin-right: 40px;">
                                <div class="form-group" style="margin-bottom: 10px;"><label for="email" style="margin-bottom: 0px;"><?php echo $lang['street']?></label><input class="form-control item" type="text" name="street" style="min-width: 170px;font-size: 14px;" required autofocus></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col" style="margin-right: 40px;min-width: 130px;">
                                <div class="form-group" style="margin-bottom: 10px;"><label for="email" style="margin-bottom: 0px;"><?php echo $lang['password']?></label><input class="form-control" type="password" name="password" required></div>
                            </div>
                            <div class="col" style="min-width: 130px;margin-right: 40px;">
                                <div class="form-group" style="margin-bottom: 10px;"><label for="email" style="margin-bottom: 0px;"><?php echo $lang['streetNr']?></label><input class="form-control item" type="text" name="houseNumber" style="min-width: 170px;font-size: 14px;" required autofocus></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col" style="margin-right: 40px;min-width: 130px;">
                                <div class="form-group" style="margin-bottom: 10px;"><label for="email" style="margin-bottom: 0px;"><?php echo $lang['passwordRepeat']?></label><input class="form-control" type="password" name="password2" required></div>
                            </div>
                            <div class="col" style="min-width: 130px;margin-right: 40px;">
                                <div class="form-group" style="margin-bottom: 10px;"><label for="email" style="margin-bottom: 0px;"><?php echo $lang['postCode']?></label><input class="form-control" type="text" name="postCode" required autofocus></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col" style="margin-right: 40px;min-width: 130px;">
                                <div class="form-group" style="margin-bottom: 10px;"><label for="email" style="margin-bottom: 0px;"><?php echo $lang['institute']?></label><input class="form-control item" type="text" name="name" style="min-width: 160px;font-size: 14px;" required autofocus></div>
                            </div>
                            <div class="col" style="min-width: 130px;margin-right: 40px;">
                                <div class="form-group" style="margin-bottom: 10px;"><label for="email" style="margin-bottom: 0px;"><?php echo $lang['place']?></label><input class="form-control" type="text" name="place" required autofocus></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col" style="margin-right: 40px;min-width: 130px;"><button class="btn btn-primary" type="submit" style="width: 142px;margin-top: 10px;">Speichern</button></div>
                            <div class="col" style="margin-right: 40px;min-width: 130px;"><a class="btn btn-primary" role="button" href="/educationplatform/search" style="width: 142px;margin-top: 10px;">Abbrechen</a></div>
                            <div class="col" style="margin-right: 40px;min-width: 130px;height: 40px;"></div>
                        </div>
                    </form>
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
<!DOCTYPE html>
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
