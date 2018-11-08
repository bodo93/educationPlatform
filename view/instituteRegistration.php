<html>
	<head>
		<title>Registration</title>
                <link rel="stylesheet" type="text/css" href="stylesheet/all.css">
	</head>
	<body>
		<div id="registration_box">
                    <form action="/educationPlatform/dbregister" method="post">
                                <input type="text" class="textboxes textboxes_right" name="name" placeholder="name" required autofocus>
                                <input type="text" class="textboxes textboxes_right" name="street" placeholder="street" required autofocus>                       
                                <input type="text" id="textbox_ort" class="textboxes textboxes_right" name="houseNumber" placeholder="houseNumber" required autofocus>
                                <input type="text" id="textbox_ort" class="textboxes textboxes_right" name="postCode" placeholder="postCode" required autofocus>
                                <input type="text" class="textboxes textboxes_right" name="place" placeholder="place" required autofocus>
                                <input type="email" class="textboxes textboxes_left" name="email" placeholder="email" required autofocus>
                                <input type="text" class="textboxes textboxes_right" name="invStreet" placeholder="Invoice Street" required autofocus>                       
                                <input type="text" id="textbox_ort" class="textboxes textboxes_right" name="invHouseNumber" placeholder="Invoice HouseNumber" required autofocus>
                                <input type="text" class="textboxes textboxes_right" name="invPostCode" placeholder="Invoice PostCode" required autofocus>                       
                                <input type="text" id="textbox_ort" class="textboxes textboxes_right" name="invPlace" placeholder="invoice Place" required autofocus>
                                <input type="password" class="textboxes textboxes_left" name="password" placeholder="password" required>
                                <input type="password" class="textboxes textboxes_left" name="password2" placeholder="repeat password" required>				
                                <div id="container_buttons">
                                    <button type="submit" class="buttons" id="btn_login" name="Login" onclick="">Login</button>
                                    <button type="reset" class="buttons" id="btn_reset" name="Register">Reset</button>
                                </div>
			</form>
		</div>
	</body>
</html>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        ?>
    </body>
</html>
