<!-- 
Author: Philipp Lehmann
-->
<?php
include 'includes/header.inc.php';
?>
<html>
	<head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
            <title>Login</title>
    </head>
    <body style="background-color: rgb(34,36,37);">
        <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
            <div class="container"><a class="navbar-brand logo" href="" style="margin-right: 0px;"><img src="assets/img/Logo2.png" id="logo" style="width: 180px;height: 65px;"></a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div
                    class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item" role="presentation"><a class="nav-link" href="myCourses.html" style="font-size: 14px;font-weight: bold;">Meine Kurse</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" href="showAccount.html" style="font-size: 14px;font-weight: bold;">Benutzerprofil</a></li>
                        <li class="nav-item" role="presentation" style="padding-right: 90px;"><a class="nav-link" href="logout.php" style="font-size: 14px;font-weight: bold;">Abmelden</a></li>
                        <li class="nav-item" role="presentation" style="padding-right: 0px;"><a class="nav-link" href="" style="font-size: 14px;font-weight: bold;">de</a></li>
                        <li class="nav-item" role="presentation" style="padding-right: 20px;"><a class="nav-link" href="" style="padding-left: 0px;font-size: 14px;font-weight: bold;">EN</a></li>
                    </ul>
                </div>
            </div>
        
        <main class="page login-page">
            <section class="clean-block clean-form dark" style="min-height: 660px;">
                <div class="container">
                    <div class="block-heading">
                        <h2 class="text-info">Login</h2>
                    </div>
                    <form method="post" action="" style="padding-bottom: 30px;">
                        <div class="form-group"><label for="email">Email</label><input class="form-control" type="email" name="email" placeholder="email" required autofocus></div>
                        <div class="form-group"><label for="password">Password</label><input class="form-control" type="password" id="password" name="password" placeholder="password" required></div>
                        <div class="form-group">
                            <div class="form-check" style="margin-top: 25px;"><input class="form-check-input" type="checkbox" id="checkbox"><label class="form-check-label" for="checkbox">angemeldet bleiben</label></div>
                            <div class="form-row">
                                <div class="col" style="margin-right: 40px;"><button class="btn btn-primary btn-block" type="submit" style="margin-top: 6px;min-width: 160px;" name="login">Login</button></div>
                                <div class="col" style="margin-right: 40px;"><a class="btn btn-primary btn-block" role="button" href="/educationplatform/search" style="margin-top: 6px;min-width: 160px;">Abbrechen</a></div>
                            </div>
                            <div style="margin-top: 35px;"><a href="/educationplatform/register">Benutzerkonto erstellen</a></div>
                            <div style="margin-top: 10px;"><a href="forgetPassword.html">Passwort vergessen?</a></div>
                        </div>
                    </form>
                </div>
            </section>
        </main>
        <?php
        include 'includes/footer.inc.php';
        ?>
    </body>
</html>
