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
            <section class="clean-block clean-form dark" style="padding-bottom: 10px; padding-top: 100px; min-width: 660px;">
                <div class="container">
                    <div class="block-heading">
                        <h2 class="text-info"><?php echo $lang['offer']?></h2>
                    </div>
                </div>
            </section>
        </main>
        <div id="empresa" style="padding: 20px;margin: 0px;padding-top: 40px;background-color: rgb(246,246,246);">
            <div class="container">
                <div class="row" style="margin-left: -10px;margin-right: -10px;">
                    <div class="col-sm-6 col-md-7 col-lg-7">
                        <h1 style="font-size: 30px;margin-bottom: 15px;"><?php echo $lang['whatOffer']?></h1>
                        <p style="min-height: 330px;">SWISSEDU ist die grösste und bekannteste Bildungsplattform der Schweiz. Wir bringen Sie und Ihre zukünftigen Kunden zusammen.&nbsp;<br><br>Für die Veröffentlichung Ihres Kurses auf unserer Plattform bieten wir Ihnen drei Möglichkeiten:<br><br>-
                            3 &nbsp;Monate für &nbsp; 60 CHF<br>- 6 &nbsp;Monate für 100 CHF<br>- 12 Monate für 160 CHF<br><br><br><br>
                            <a class="btn btn-primary btn-block" role="button" href="<?php echo $GLOBALS['ROOT_URL']?>/search" style="margin-top: 6px;min-width: 160px;max-width: 200px;"><?php echo $lang['close']?></a></p>
                    </div>
                    <div class="col-sm-6 col-md-5 col-lg-5"><img src="assets/img/checklist.jpg"></div>
                </div>
            </div>
        </div>
        <?php
        include 'includes/footer.inc.php';
        ?>
    </body>

</html>