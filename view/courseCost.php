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
        <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
            <div class="container"><a class="navbar-brand logo" href="search.html" style="margin-right: 0px;"><img src="assets/img/Logo2.png" id="logo" style="width: 180px;height: 65px;"></a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div
                    class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item" role="presentation"><a class="nav-link" href="myCourses.html" style="font-size: 14px;font-weight: bold;">Meine Kurse</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" href="showAccount.html" style="font-size: 14px;font-weight: bold;">Benutzerprofil</a></li>
                        <li class="nav-item" role="presentation" style="padding-right: 90px;"><a class="nav-link" href="logout.php" style="font-size: 14px;font-weight: bold;">Abmelden</a></li>
                        <li class="nav-item" role="presentation" style="padding-right: 0px;"><a class="nav-link" href="about-us.html" style="font-size: 14px;font-weight: bold;">de</a></li>
                        <li class="nav-item" role="presentation" style="padding-right: 20px;"><a class="nav-link" href="about-us.html" style="padding-left: 0px;font-size: 14px;font-weight: bold;">EN</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <main class="page login-page">
            <section class="clean-block clean-form dark" style="min-height: 660px;">
                <div class="container">
                    <div class="block-heading">
                        <h2 class="text-info">Kurs erfassen</h2>
                    </div>
                    <form style="padding-bottom: 30px;">
                        <div class="form-group"><label>Veröffentlichungsdauer:&nbsp;</label></div>
                        <div class="form-group"><input type="radio" name="duration" value="1" checked="checked">  3   Monate für -  60 CHF<br>
                            <input type="radio" name="duration" value="2">  6   Monate für - 100 CHF<br>
                            <input type="radio" name="duration" value="3">  12 Monate für - 160 CHF
                        </div>
                        <div class="form-group" style="margin-top: 40px;margin-bottom: 0px;">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="terms" />
                                <label class="form-check-label" for="checkbox"><em>AGB gelesen und akzeptiert</em><br /></label>
                            </div>

                            <div class="form-group" style="margin-top: 6px;">
                                <div class="form-row">
                                    <div class="col"><button class="btn btn-primary btn-block" type="button" id="registerBtn" style="  margin-top: 6px;
                              width: 142px;
                            ">Erfassen</button></div>
                                    <div class="col"><button class="btn btn-primary btn-block" type="button"  style="  margin-top: 6px;
                              width: 142px;
                            ">Zurück</button></div>
                                </div>
                                <script src="https://code.jquery.com/jquery-latest.js"></script>
                            <script>
                            $(function(){ 
                                    var button = $('#registerBtn');
                                    button.attr('disabled', 'disabled');
                                    $('#terms').change(function(e){
                                    if (this.checked){
                                            button.removeAttr('disabled');
                                    } else {
                                    button.attr('disabled', 'disabled');
                                    }
                                 });
                                });
                            </script>

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