<?php             
session_start(); 
include "db_conn.php";
if (isset($_POST['uname']) && isset($_POST['name']) && isset($_POST['password'])
    && isset($_POST['email']) && isset($_POST['repassword'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}
    $unm = $_SESSION['user_name'];

	$uname = clean($_POST['uname']);
	$name = clean($_POST['name']);
	$pass = clean($_POST['password']);
	$email = clean($_POST['email']);
	$repass = clean($_POST['repassword']);
	
		
	    $query = "UPDATE users SET name= '$name',  user_name='$uname', email = '$email', password = '$pass' WHERE user_name= '$unm'";
		$result = mysqli_query($conn, $query);

		if ($result) {

           	 header("Location: profile.php?success=Your account has been created successfully");
	         exit();
           }else {
	           	header("Location: profile.php?error=unknown error occurred&$user_data");
		        exit();
           }
		}		
else{
	header("Location: profile.php");
	exit();
}
        ?> 	