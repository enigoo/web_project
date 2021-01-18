<?php
session_start(); 
include "db_conn.php";

if (isset($_POST['uname']) && isset($_POST['password'])) 
{
	$uname = $_POST['uname'];
	$pass = $_POST['password'];
	
	if (empty($uname))
	{
		header("Location: login.php?error=Username/email is required");
	    exit();
	}
	else if(empty($pass))
	{
        header("Location: login.php?error=Password is required");
	    exit();
	}
	else{
		$query = "SELECT * FROM users WHERE user_name='$uname' or email='$uname'";
		$result = mysqli_query($conn, $query);
		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if (($row['user_name'] === $uname || $row['email'] === $uname) && $row['password'] === $pass) {
            	$_SESSION['user_name'] = $row['user_name'];            	
            	$_SESSION['name'] = $row['name'];
            	$_SESSION['id'] = $row['id'];
            	setcookie("name",$row['user_name'],time()+60*60+4);
	setcookie("password",$row['password'],time()+60*60+4);
	  setcookie("email",$row['email'],time()+60*60+4);
            	header("Location: home.php");      	
		        exit();
            }else{
				header("Location: login.php?error=Incorect Username/email or password");
		        exit();
			}
		}else{
			header("Location: login.php?error=Incorect Username/email or password");
	        exit();
		}
	}
}
else
{
	header("Location: login.php");
	exit();
}