<!--
author: Philipp Lehmann
Source: https://www.w3schools.com/howto/howto_js_filter_table.asp
-->
        
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>Home - Brand</title>
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
        <link rel="stylesheet" href="assets/css/Data-Table.css">
        <link rel="stylesheet" href="assets/css/dh-row-titile-text-image-right-1.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
        <link rel="stylesheet" href="assets/css/smoothproducts.css">
        <link rel="stylesheet" href="assets/css/Table-With-Search.css">
    </head>

    <body>
        <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
            <div class="container">
                <a class="navbar-brand logo" href="index.html" style="margin-right: 0px;"><img src="assets/img/Logo2.png" id="logo" style="width: 180px;height: 65px;"></a>
                <button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div
                    class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item" role="presentation"><a class="nav-link" href="myCourses.html" style="font-size: 14px;font-weight: bold;">Meine Kurse</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" href="editAccount.html" style="font-size: 14px;font-weight: bold;">Benutzerprofil</a></li>
                        <li class="nav-item" role="presentation" style="padding-right: 90px;"><a class="nav-link" href="logout.php" style="font-size: 14px;font-weight: bold;">Abmelden</a></li>
                        <li class="nav-item" role="presentation" style="padding-right: 0px;"><a class="nav-link" href="about-us.html" style="font-size: 14px;font-weight: bold;">de</a></li>
                        <li class="nav-item" role="presentation" style="padding-right: 20px;"><a class="nav-link" href="about-us.html" style="padding-left: 0px;font-size: 14px;font-weight: bold;">EN</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <main class="page landing-page">
            <section class="portfolio-block hire-me" style="background-image: url(&quot;assets/img/classroom3.jpg&quot;);background-size: cover;background-repeat: no-repeat;background-color: transparent;color: #000000;padding-top: 80px;height: 660px;">
                <div class="container" style="max-width: 420px;margin-top: 50px;">
                    <div class="heading">
                        <h2 style="margin-bottom: 20px;font-weight: bold;color: rgb(255,255,255);">Kurs Suche&nbsp;</h2>
                    </div>
                    <form action="searchResult" style="margin-right: 200;" method="post">
                        <div class="form-group"><label for="subject" style="font-weight: bold;color: rgb(255,255,255);margin-bottom: 2px;">Fachbereich</label>
                            <select name="department" class="form-control" id="subject">
                                <option></option>
                                <option value="Wirtschaft">Wirtschaft</option>
                                <option value="IT / Technik">IT / Technik</option>
                                <option value="Recht">Recht</option>
                                <option value="Psychologie">Psychologie </option>
                                <option value="Sprachen">Sprachen</option>
                                <option value="Sonstiges">Sonstiges</option>
                            </select>
                        </div>
                        <div
                            class="form-group"><label for="subject" style="font-weight: bold;color: rgb(255,255,255);margin-bottom: 2;">Raum</label>
                            <select name="area" class="form-control" id="subject">
                                <option></option>
                                <option value="Westschweiz">Westschweiz</option>
                                <option value="Mittelland">Mittelland</option>
                                <option value="Nordwestschweiz">Nordwestschweiz / Zürich</option>
                                <option value="Ostschweiz">Ostschweiz</option>
                                <option value="Tessin / Wallis">Tessin / Wallis</option>
                            </select>
                        </div>
                        <div
                            class="form-group"><label for="subject" style="font-weight: bold;color: rgb(255,255,255);margin-bottom: 2px;">Kurs Typ</label>
                            <select name="coursetype" class="form-control" id="subject">
                                <option></option>
                                <option value="1">Bachelor</option>
                                <option value="2">Master</option>
                                <option value="3">Sonstiges</option>
                            </select>
                        </div>
                        <div
                            class="form-group">
                            <div class="form-row">
                                <div class="col-md-6"><label for="hire-date" style="font-weight: bold;color: rgb(255,255,255);margin-bottom: 2px;">Suchbegriff</label>
                                    <input name="valueToSearch" class="form-control" type="text"></div>
                                <!--<div class="col-md-6 button"><a class="btn btn-primary btn-block" role="button" style="margin-top: 26px;font-weight: bold;background-color: rgb(43,47,49);">Suchen</a></div>!-->
                                <button type="submit" name="search" class="btn btn-primary btn-block" role="button" style="width:100px; margin-top: 26px;font-weight: bold;background-color: rgb(43,47,49);">Submit</button>
                            </div>
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