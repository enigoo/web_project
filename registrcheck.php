<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['uname']) && isset($_POST['name']) && isset($_POST['password'])
    && isset($_POST['email']) && isset($_POST['repassword'])) {

	$uname = $_POST['uname'];
	$name = $_POST['name'];
	$pass = $_POST['password'];
	$email = $_POST['email'];
	$repass = $_POST['repassword'];
	
	$user_data = 'uname='. $uname. '&name='. $name;

	if (empty($name)) {
		header("Location: register.php?error=Name is required & $user_data");
	    exit();
	}else if(empty($uname)){
        header("Location: register.php?error=Username is required & $user_data");
	    exit();
	}else if(empty($pass) or empty($repass)){
        header("Location: register.php?error=Password is required & $user_data");
	    exit();
	}
	else if(empty($email)){
        header("Location: register.php?error=Email is required & $user_data");
	    exit();
	}
	else if($pass !== $repass){
        header("Location: register.php?error= password does not match&$user_data");
	    exit();
	}

	else{
	    $query = "SELECT * FROM users WHERE user_name='$uname' ";
		$result = mysqli_query($conn, $query);

		if (mysqli_num_rows($result) > 0) {
			header("Location: register.php?error=username exits&$user_data");
	        exit();
		}else {
           $query2 = "INSERT INTO users(name, user_name, email, password) VALUES('$name', '$uname', '$email', '$pass')";
           $result2 = mysqli_query($conn, $query2);
           if ($result2) {
           	 header("Location: register.php?success=Your account has been created successfully");
	         exit();
           }else {
	           	header("Location: register.php?error=unknown error occurred&$user_data");
		        exit();
           }
		}
	}	
}else{
	header("Location: register.php");
	exit();
}