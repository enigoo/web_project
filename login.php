<!DOCTYPE html>
<html>
<head>
	<title>login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<form action="loginchk.php" method="POST">
		<h1>LOGIN</h1>
		<?php if (isset($_GET['error'])) {?>
				<p class="error"><?php echo $_GET['error']; ?>
				</p>
		<?php } ?>
		<input type="text" name="uname" placeholder="username/email"><br>
		<input type="password" name="password" placeholder="password"><br>
		<button type="submit">sign in</button>
		<a href="register.php">sign up</a>
	</form>
</body>
</html>