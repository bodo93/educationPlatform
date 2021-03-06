<!DOCTYPE html>
<?php 

/**
 * $Author: René Schwab
 *
 * view to reset the password 
 * parameter: -
 * return: -
 */

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
                        <h2 class="text-info"><?php echo $lang['resetPassword'] ?></h2>
                    </div>
                    <form action="<?php echo $GLOBALS["ROOT_URL"]; ?>/login/forgotPassword" method="post" style="padding-bottom: 30px;">
                        <div class="form-group" style="margin-right: 40px;"><label for="email"><?php echo $lang['userName'] ?></label><input class="form-control" type="email" name="email"></div>                       
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col" style="margin-right: 40px;"><button class="btn btn-primary btn-block" type="submit" style="margin-top: 6px;min-width: 160px;"><?php echo $lang['passwordReset'] ?></button></div>
                                <div class="col" style="margin-right: 40px;"><a class="btn btn-primary btn-block" role="button" href="<?php echo $GLOBALS['ROOT_URL']?>/login" style="margin-top: 6px;min-width: 160px;" ><?php echo $lang['cancel'] ?></a></div>
                            </div>
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