<html>
	<head>
		<title>Registration</title>
                <link rel="stylesheet" type="text/css" href="stylesheet/all.css">
	</head>
	<body>
		<div id="registration_box">
                    <form action="DBregistration.php" method="post">
				<input type="email" class="textboxes textboxes_left" name="username" placeholder="username" required autofocus>
				<input type="text" class="textboxes textboxes_right" name="institut" placeholder="school name" required autofocus>
                                <input type="password" class="textboxes textboxes_left" name="password" placeholder="password" required>
                                <input type="text" class="textboxes textboxes_right" name="strasse" placeholder="Strasse" required autofocus>
                                <input type="password" class="textboxes textboxes_left" name="password2" placeholder="repeat password" required>				
                                <input type="text" class="textboxes textboxes_right" name="ort" placeholder="Ort" required autofocus>
                                <input type="text" id="textbox_ort" class="textboxes textboxes_right" name="plz" placeholder="plz" required autofocus>
                                <div id="container_buttons">
                                    <button type="submit" class="buttons" id="btn_login" name="Login">Login</button>
                                    <button type="reset" class="buttons" id="btn_reset" name="Register">Reset</button>
                                </div>
			</form>
		</div>
	</body>
</html>