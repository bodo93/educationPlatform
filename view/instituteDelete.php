<?php
/*
 * Author: René Schwab
 */
    include 'includes/header.inc.php';
?>
<body style="background-color: rgb(34,36,37);">
    <main class="page login-page">
        <section class="clean-block clean-form dark" style="min-height: 660px; padding-top: 100px;">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info"><?php echo $lang['delete'] ?></h2>
                </div>
                <form method="post" action="" style="padding-bottom: 30px;">
                    <input type="hidden" name="id" value="<?php echo $_GET['id'];?>"/>
                    <p class="alert alert-error"><?php echo $lang['deleteInstituteInfo']?></p>    
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col" style="margin-right: 40px;"><button class="btn btn-primary btn-block" type="submit" style="margin-top: 6px;min-width: 160px;"><?php echo $lang['yes'] ?></button></div>
                            <div class="col" style="margin-right: 40px;"><a class="btn btn-primary btn-block" role="button" href="<?php echo $GLOBALS['ROOT_URL']?>/institute" style="margin-top: 6px;min-width: 160px;"><?php echo $lang['no'] ?></a></div>
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
