<!DOCTYPE html>

<?php 
    include 'includes/translator.inc.php';
    include 'includes/header.inc.php';
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    </head>
    <body style="color: rgb(34,36,37);background-color: rgb(34,36,37);">
        <main class="page login-page">
            <section class="clean-block clean-form dark" style="padding-bottom: 10px; padding-top: 100px;min-width: 660px;">
                <div class="container">
                    <div class="block-heading">
                        <h2 class="text-info"><?php echo $lang['terms']?></h2>
                    </div>
                </div>
            </section>
        </main>
        <div id="empresa" style="padding: 40px;margin: 0px;margin-top: 0px;padding-top: 0;background-color: rgb(246,246,246);">
            <div class="container">
                <div class="row" style="margin-left: -10px;margin-right: -10px;">
                    <div class="col-sm-6 col-md-7 col-lg-7">
                        <h1 style="font-size: 30px;margin-bottom: 15px;">Lorem ipsum<br></h1>
                        <p style="min-height: 370px;">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren,
                            no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et
                            accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.<br><br><br><br><br><br>
                            <a class="btn btn-primary btn-block" role="button" href="<?php echo $GLOBALS['ROOT_URL']?>/search" style="margin-top: 6px;min-width: 160px;max-width: 200px;"><?php echo $lang['close']?></a></p>
                    </div>
                    <div class="col-sm-6 col-md-5 col-lg-5"><img src="assets/img/law-document.jpeg"></div>
                </div>
            </div>
        </div>
        <?php
        include 'includes/footer.inc.php';
        ?>
    </body>

</html>