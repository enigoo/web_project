<!DOCTYPE html>
<html>
<head>
	<title>registration</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<form action="registrcheck.php" method="POST">
		<h1>REGITRATION</h1>
		<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
        <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
        <?php } ?>
        <!-- name -->
        <?php if (isset($_GET['name'])) { ?>
               <input type="text" name="name" placeholder="Name" value="<?php echo $_GET['name']; ?>"><br>
        <?php }else{ ?>
               <input type="text" name="name" placeholder="Name"><br>
        <?php }?>
        <!-- uname -->
		<?php if (isset($_GET['uname'])) { ?>
               <input type="text" name="uname" placeholder="User Name" value="<?php echo $_GET['uname']; ?>"><br>
        <?php }else{ ?>
               <input type="text" name="uname" placeholder="User Name"><br>
        <?php }?>
          <!-- email -->
		<?php if (isset($_GET['email'])) { ?>
               <input type="text" name="email" placeholder="email" value="<?php echo $_GET['email']; ?>"><br>
         <?php }else{ ?>
               <input type="text" name="email" placeholder="email"><br>
        <?php }?>
         <!-- password -->		
     	<input type="password" name="password" placeholder="Password"><br>
		<input type="password" name="repassword" placeholder="confirm password">
		<button type="submit">register</button>
		<a href="login.php">Already have an account?</a>
	</form>

</body>
</html>