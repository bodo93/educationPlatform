<!-- 
Author: Philipp Lehmann
-->
<!DOCTYPE html>

<?php 
    include 'includes/translator.inc.php';
    include 'includes/header.inc.php';
?>

<html>

<body style="background-color: rgb(34,36,37);">
    <main class="page login-page">
        <section class="clean-block clean-form dark" style="min-height: 660px; padding-top: 100px;">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info"><?php echo $lang['login'] ?></h2>
                </div>
                <form method="post" action="" style="padding-bottom: 30px;">
                    <div class="form-group"><label for="email">Email</label><input class="form-control" type="email" name="email" placeholder="<?php echo $lang['email'] ?>" required autofocus></div>
                        <div class="form-group"><label for="password"><?php echo $lang['password'] ?></label><input class="form-control" type="password" id="password" name="password" placeholder="<?php echo $lang['password'] ?>" required></div>
                        <div class="form-group">
                            <div class="form-check" style="margin-top: 25px;"><input class="form-check-input" type="checkbox" id="checkbox"><label class="form-check-label" for="checkbox"><?php echo $lang['stayLoggedIn'] ?></label></div>
                            <div class="form-row">
                                <div class="col" style="margin-right: 40px;"><button class="btn btn-primary btn-block" type="submit" style="margin-top: 6px;min-width: 160px;" name="login"><?php echo $lang['login'] ?></button></div>
                                <div class="col" style="margin-right: 40px;"><a class="btn btn-primary btn-block" role="button" href="search" style="margin-top: 6px;min-width: 160px;"><?php echo $lang['cancel'] ?></a></div>
                            </div>
                            <div style="margin-top: 35px;"><a href="register"><?php echo $lang['register'] ?></a></div>
                            <div style="margin-top: 10px;"><a href="login/forgotPassword"><?php echo $lang['passwordForgot'] ?></a></div>
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
