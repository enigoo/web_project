 <?php
  session_start(); 
  include "db_conn.php";
  $unm = $_SESSION['user_name'];
  $id = $_SESSION['id'];
    if (isset($_POST['update'])) {
        $nm = $_POST['name'];
        $unme = $_POST['username'];
        $em = $_POST['email'];
        $query = "UPDATE users SET name= '$nm',  user_name='$unme', email = '$em' WHERE id='$id'";
        $result = mysqli_query($conn, $query);
        if ($result) {
             header("Location: profile.php?success=updation successful");
             exit();
           }else {
                header("Location: profile.php?error=unknown error occurred");
                exit();
           }
        }
    ?>  
<!DOCTYPE html>
<html>
<head>
	<title>profile</title>
	<link rel="stylesheet" type="text/css" href="./style.css">
</head>
<body>
    <form action="#" method="POST">
        <p>to view profile details click the button</p>
        <button type="submit" name="submit">view profile</button><br>
        <?php                           
            if(isset($_POST['submit']))
            {                
                $sql = "SELECT * FROM users where id= '$id'";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result) > 0){       
                while($row = mysqli_fetch_array($result)){
                        echo "Name: " . $row['name'] . "<br>";
                        echo "Username: " . $row['user_name'] . "<br>" ;
                        echo "Email: " . $row['email'] . "<br>" ;
                        echo "Password: " . $row['password'] . "<br>" ;
                    }                     
                }
                $sql1 = "UPDATE users SET email = 'unknown@gmail.com' where id= '$id'";
                mysqli_query($conn, $sql1);
            }
        ?>  
    </form>
		<form action="#" method="POST">        
		<h1>UPDATE</h1>       
        <!--<?php 
        
            /*    $sql = "SELECT * FROM users where id='$id'";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_array($result)){
                        $n =  $row['name'];
                        $un =  $row['user_name'];
                        $em =  $row['email'];
                        $p =  $row['password'];
        }
         }  */
                                    
        ?>-->    
        <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
        <?php } ?>
	<input type="text"  name="name" placeholder="name"><br>
	<input type="text"  name="username" placeholder="username"><br>
	<input type="email" name="email" placeholder="email"><br>
    <input type="password" name="password" placeholder="password"><br>
	<button type="submit" name="update">update</button><br>	     
	</form>	
    	<div style="float: right;">
		<label class="lg">
			<a href="home.php">Back</a>				
		</label>
	</div>	
</body>
</html>