<!DOCTYPE html>

<?php
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
                        <h2 class="text-info" style="margin-bottom: 15px;"><?php echo $lang['editUser'] ?></h2>
                    </div>
                    <form style="padding-bottom: 30px;max-width: 800px;min-width: 220px;margin-right: 100;padding-right: 0px;">
                        <div class="form-row">
                            <div class="col" style="margin-right: 40px;min-width: 130px;">
                                <div class="form-group" style="margin-bottom: 10px;"><label for="email" style="margin-bottom: 0px;"><?php echo $lang['userName']?></label><input class="form-control" type="email"></div>
                            </div>
                            <div class="col" style="min-width: 130px;margin-right: 40px;">
                                <div class="form-group" style="margin-bottom: 10px;"><label for="email" style="margin-bottom: 0px;"><?php echo $lang['street']?></label><input class="form-control item" type="text" style="min-width: 170px;font-size: 14px;"></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col" style="margin-right: 40px;min-width: 130px;">
                                <div class="form-group" style="margin-bottom: 10px;"><label for="email" style="margin-bottom: 0px;"><?php echo $lang['password']?></label><input class="form-control" type="text"></div>
                            </div>
                            <div class="col" style="min-width: 130px;margin-right: 40px;">
                                <div class="form-group" style="margin-bottom: 10px;"><label for="email" style="margin-bottom: 0px;"><?php echo $lang['streetNr']?></label><input class="form-control item" type="text" style="min-width: 170px;font-size: 14px;"></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col" style="margin-right: 40px;min-width: 130px;">
                                <div class="form-group" style="margin-bottom: 10px;"><label for="email" style="margin-bottom: 0px;"><?php echo $lang['passwordRepeat']?></label><input class="form-control" type="text"></div>
                            </div>
                            <div class="col" style="min-width: 130px;margin-right: 40px;">
                                <div class="form-group" style="margin-bottom: 10px;"><label for="email" style="margin-bottom: 0px;"><?php echo $lang['postCode']?></label><input class="form-control" type="text"></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col" style="margin-right: 40px;min-width: 130px;">
                                <div class="form-group" style="margin-bottom: 10px;"><label for="email" style="margin-bottom: 0px;"><?php echo $lang['institute']?></label><input class="form-control item" type="text" style="min-width: 160px;font-size: 14px;"></div>
                            </div>
                            <div class="col" style="min-width: 130px;margin-right: 40px;">
                                <div class="form-group" style="margin-bottom: 10px;"><label for="email" style="margin-bottom: 0px;"><?php echo $lang['place']?></label><input class="form-control" type="text"></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col" style="margin-right: 40px;min-width: 130px;"><button class="btn btn-primary" type="submit" style="width: 142px;margin-top: 10px;"><?php echo $lang['save']?></button></div>
                            <div class="col" style="margin-right: 40px;min-width: 130px;"><a class="btn btn-primary" role="button" href="<?php echo $DOMAIN_URL?>/institute" style="width: 142px;margin-top: 10px;"><?php echo $lang['cancel']?></a></div>
                            <div class="col" style="margin-right: 40px;min-width: 130px;height: 40px;"></div>
                            <div class="col" style="margin-right: 40px;min-width: 130px;height: 40px;"></div>
                        </div>
                        <div class="form-row">
                            <div class="col" style="margin-right: 40px;min-width: 130px;height: 40px;margin-top: 25px;"><a href="#"><?php echo $lang['deleteUser']?></a></div>
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


