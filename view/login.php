<!-- 
Author: Philipp Lehmann
-->

<html>
	<head>
		<title>Login</title>
                <link rel="stylesheet" type="text/css" href="stylesheet/all.css">
	</head>
	<body>
		<div id="login_box">
			<form action="dbAccess.php" method="post">
				<input type="email" class="textboxes textboxes_login" name="email" placeholder="email" required autofocus></br>
				<input type = "password" class="textboxes textboxes_login" name="password" placeholder="password" required><br>
				<a id="link_pwvergessen" href="#" onclick="forgotPassword.php;">Forgot password?</a>
                                
                                <div id="container_buttons">
                                    <button type="submit" class="buttons" id="btn_login" name="login">Login</button>
                                    <button type="reset" class="buttons" id="btn_reset" name="reset">Reset</button>
                                </div>
			</form>
		</div>
	</body>
</html>