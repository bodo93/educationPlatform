<!-- 
Author: Philipp Lehmann
-->
<!DOCTYPE html>

<?php 
    include 'includes/translator.inc.php';
    include 'includes/header.inc.php';
?>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login - Brand</title>
</head>
<body style="background-color: rgb(34,36,37);">
    <main class="page login-page">
        <section class="clean-block clean-form dark" style="min-height: 660px; padding-top: 100px;">
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
